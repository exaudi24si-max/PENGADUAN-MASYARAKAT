<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.guest.head')
</head>
<body>
    @include('layouts.guest.navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.guest.footer')
    @include('layouts.guest.scripts')
</body>
</html>
