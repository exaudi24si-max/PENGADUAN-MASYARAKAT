<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getRoleAttribute($value)
    {
        return $value ?? 'user';
    }

    /**
     * Get the URL for the user's profile picture (ORIGINAL SIZE)
     */
    public function getProfilePictureUrlAttribute()
    {
        if ($this->profile_picture && Storage::exists('public/' . $this->profile_picture)) {
            return Storage::url($this->profile_picture);
        }

        // Generate default avatar from name initials (COMPRESSED - small size)
        return $this->getDefaultAvatarUrl(400); // 400px for profile page
    }

    /**
     * Get profile picture thumbnail URL (COMPRESSED - 150px)
     */
    public function getProfilePictureThumbUrlAttribute()
    {
        if ($this->profile_picture && Storage::exists('public/' . $this->profile_picture)) {
            // Coba cari versi thumbnail jika ada
            $thumbPath = $this->getThumbnailPath($this->profile_picture);
            if (Storage::exists('public/' . $thumbPath)) {
                return Storage::url($thumbPath);
            }
            return Storage::url($this->profile_picture);
        }

        // For thumb, use smaller size (COMPRESSED - 150px)
        return $this->getDefaultAvatarUrl(150);
    }

    /**
     * Get small profile picture URL (COMPRESSED - 50px)
     * Untuk icon kecil di navbar, comments, dll
     */
    public function getProfilePictureSmallUrlAttribute()
    {
        if ($this->profile_picture && Storage::exists('public/' . $this->profile_picture)) {
            // Coba cari versi small jika ada
            $smallPath = $this->getSmallPath($this->profile_picture);
            if (Storage::exists('public/' . $smallPath)) {
                return Storage::url($smallPath);
            }
            return Storage::url($this->profile_picture);
        }

        // For small icon, use very small size (COMPRESSED - 50px)
        return $this->getDefaultAvatarUrl(50);
    }

    /**
     * Get default avatar URL dengan size tertentu
     */
    public function getDefaultAvatarUrl($size = 200)
    {
        // Generate initials dari nama (maksimal 2 huruf)
        $initials = strtoupper(substr(preg_replace('/[^a-zA-Z]/', '', $this->name), 0, 2));
        if (empty($initials)) {
            $initials = 'U'; // Default jika nama tidak ada huruf
        }

        // Warna berdasarkan role
        $color = match($this->role) {
            'admin' => 'DC2626', // red
            'staff' => 'F59E0B', // yellow/orange
            'user'  => '3B82F6', // blue
            default => '6B7280', // gray
        };

        // URL dengan parameter untuk compression
        // d=404: Return 404 jika tidak ada (lebih cepat)
        // r=g: Rating general
        // s={size}: Size yang diminta
        return "https://ui-avatars.com/api/?name={$initials}&background={$color}&color=fff&size={$size}&bold=true&format=webp";
    }

    /**
     * Helper: Get thumbnail path dari original path
     */
    private function getThumbnailPath($originalPath)
    {
        $pathInfo = pathinfo($originalPath);
        return $pathInfo['dirname'] . '/thumbs/' . $pathInfo['filename'] . '_thumb.' . $pathInfo['extension'];
    }

    /**
     * Helper: Get small path dari original path
     */
    private function getSmallPath($originalPath)
    {
        $pathInfo = pathinfo($originalPath);
        return $pathInfo['dirname'] . '/small/' . $pathInfo['filename'] . '_small.' . $pathInfo['extension'];
    }

    /**
     * Compress and save profile picture (untuk digunakan di Controller)
     * @param \Illuminate\Http\UploadedFile $file
     * @return string|null Path yang disimpan
     */
    public static function compressAndSaveProfilePicture($file)
    {
        try {
            // Validasi file
            if (!$file || !$file->isValid()) {
                return null;
            }

            // Generate unique filename dengan timestamp
            $originalExtension = $file->getClientOriginalExtension();
            $filename = 'profile_' . time() . '_' . uniqid() . '.jpg'; // Selalu simpan sebagai JPG untuk compression

            // Path untuk berbagai ukuran
            $originalPath = 'profile_pictures/' . $filename;
            $thumbPath = 'profile_pictures/thumbs/' . $filename;
            $smallPath = 'profile_pictures/small/' . $filename;

            // Buat direktori jika belum ada
            Storage::disk('public')->makeDirectory('profile_pictures/thumbs');
            Storage::disk('public')->makeDirectory('profile_pictures/small');

            // 1. Simpan original (resize ke max 800px, quality 80%)
            self::resizeAndSaveImage($file, $originalPath, 800, 80);

            // 2. Buat thumbnail (200px, quality 70%)
            self::resizeAndSaveImage($file, $thumbPath, 200, 70);

            // 3. Buat small version (50px, quality 60%)
            self::resizeAndSaveImage($file, $smallPath, 50, 60);

            return $originalPath;

        } catch (\Exception $e) {
            \Log::error('Error compressing profile picture: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Resize and save image menggunakan PHP GD (native)
     */
    private static function resizeAndSaveImage($file, $path, $maxSize, $quality)
    {
        // Get file path
        $tempPath = $file->getRealPath();

        // Get image info
        $imageInfo = @getimagesize($tempPath);
        if (!$imageInfo) {
            return false;
        }

        $mime = $imageInfo['mime'];

        // Create image from file
        switch ($mime) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($tempPath);
                break;
            case 'image/png':
                $image = imagecreatefrompng($tempPath);
                // Preserve transparency
                imagesavealpha($image, true);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($tempPath);
                break;
            case 'image/webp':
                if (function_exists('imagecreatefromwebp')) {
                    $image = imagecreatefromwebp($tempPath);
                } else {
                    // Fallback ke JPEG jika WebP tidak support
                    $image = imagecreatefromjpeg($tempPath);
                }
                break;
            default:
                return false;
        }

        if (!$image) {
            return false;
        }

        // Get original dimensions
        $originalWidth = imagesx($image);
        $originalHeight = imagesy($image);

        // Calculate new dimensions (maintain aspect ratio)
        if ($originalWidth > $originalHeight) {
            // Landscape
            $newWidth = $maxSize;
            $newHeight = $originalHeight * ($maxSize / $originalWidth);
        } else {
            // Portrait or square
            $newHeight = $maxSize;
            $newWidth = $originalWidth * ($maxSize / $originalHeight);
        }

        // Ensure minimum dimensions
        $newWidth = max(10, (int) $newWidth);
        $newHeight = max(10, (int) $newHeight);

        // Create new image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG/GIF
        if ($mime == 'image/png' || $mime == 'image/gif') {
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
            $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
            imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
        } else {
            // Untuk JPEG, beri background putih
            $white = imagecolorallocate($newImage, 255, 255, 255);
            imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $white);
        }

        // Resize image dengan kualitas baik
        imagecopyresampled($newImage, $image, 0, 0, 0, 0,
            $newWidth, $newHeight, $originalWidth, $originalHeight);

        // Save image ke storage
        $fullPath = storage_path('app/public/' . $path);

        // Create directory if not exists
        $directory = dirname($fullPath);
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Save as JPEG untuk compression terbaik
        imagejpeg($newImage, $fullPath, $quality);

        // Free memory
        imagedestroy($image);
        imagedestroy($newImage);

        return true;
    }

    /**
     * Delete all profile picture files (original, thumb, small)
     */
    public function deleteProfilePictureFiles()
    {
        if (!$this->profile_picture) {
            return;
        }

        try {
            // Delete original
            if (Storage::exists('public/' . $this->profile_picture)) {
                Storage::delete('public/' . $this->profile_picture);
            }

            // Delete thumbnail if exists
            $thumbPath = $this->getThumbnailPath($this->profile_picture);
            if (Storage::exists('public/' . $thumbPath)) {
                Storage::delete('public/' . $thumbPath);
            }

            // Delete small version if exists
            $smallPath = $this->getSmallPath($this->profile_picture);
            if (Storage::exists('public/' . $smallPath)) {
                Storage::delete('public/' . $smallPath);
            }
        } catch (\Exception $e) {
            \Log::error('Error deleting profile picture files: ' . $e->getMessage());
        }
    }

    /**
     * Delete profile picture when user is deleted
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->deleteProfilePictureFiles();
        });
    }
}
