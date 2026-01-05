<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // PAGINATION, SEARCH & FILTER DI SINI
        $query = User::query();
        // SEARCH - Pencarian berdasarkan name, email
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }
        // FILTER Role
        if ($request->has('role') && !empty($request->role)) {
            $query->where('role', $request->role);
        }
        // Sorting default by created_at desc
        $query->orderBy('created_at', 'desc');
        // PAGINATION - 12 data per halaman untuk tampilan grid
        $users = $query->paginate(12);
        // Data untuk dropdown filter role
        $roleList = User::select('role')->distinct()->pluck('role');
        // END PAGINATION & FILTER
        return view('pages.user.index', compact('users', 'roleList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,staff,user',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120' // 5MB max, support webp
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ];
        // Handle profile picture upload WITH COMPRESSION
        if ($request->hasFile('profile_picture')) {
            $path = User::compressAndSaveProfilePicture($request->file('profile_picture'));
            if ($path) {
                $data['profile_picture'] = $path;
            } else {
                return redirect()->back()
                    ->withErrors(['profile_picture' => 'Gagal mengunggah foto profil. Pastikan file berupa gambar yang valid.'])
                    ->withInput();
            }
        }
        User::create($data);
        return redirect()->route('users.index')
            ->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'role' => 'required|in:admin,staff,user',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'remove_picture' => 'nullable|boolean'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];
        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        // Handle remove existing picture
        if ($request->has('remove_picture') && $user->profile_picture) {
            $user->deleteProfilePictureFiles();
            $data['profile_picture'] = null;
        }
        // Handle new profile picture upload WITH COMPRESSION
        if ($request->hasFile('profile_picture')) {
            // Delete old picture files if exists
            $user->deleteProfilePictureFiles();
            // Compress and save new picture
            $path = User::compressAndSaveProfilePicture($request->file('profile_picture'));
            if ($path) {
                $data['profile_picture'] = $path;
            } else {
                return redirect()->back()
                    ->withErrors(['profile_picture' => 'Gagal mengunggah foto profil. Pastikan file berupa gambar yang valid.'])
                    ->withInput();
            }
        }
        $user->update($data);
        return redirect()->route('users.index')
            ->with('success', 'User berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Cegah menghapus diri sendiri
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')
                ->with('error', 'Tidak dapat menghapus akun sendiri');
        }

        // Delete all profile picture files
        $user->deleteProfilePictureFiles();

        // Delete user
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus');
    }

    /**
     * Reset password untuk user (opsional)
     */
    public function resetPassword(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Password berhasil direset');
    }

    /**
     * Bulk delete users (opsional)
     */
    public function bulkDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $deletedCount = 0;
        $currentUserId = auth()->id();

        foreach ($request->user_ids as $userId) {
            // Skip jika mencoba menghapus diri sendiri
            if ($userId == $currentUserId) {
                continue;
            }

            $user = User::find($userId);
            if ($user) {
                // Delete profile picture files
                $user->deleteProfilePictureFiles();

                // Delete user
                $user->delete();
                $deletedCount++;
            }
        }

        $message = $deletedCount > 0
            ? "{$deletedCount} user berhasil dihapus."
            : "Tidak ada user yang dihapus.";

        return redirect()->route('users.index')
            ->with('success', $message);
    }
}
