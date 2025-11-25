{{-- app.blade.php (Tahap Isolasi Sidebar) --}}
@include('layouts.admin.css')
@include('layouts.admin.header')
@include('layouts.admin.sidebar')

<main class="content">
    @yield('content')
</main>

{{-- @include('layouts.admin.footer') --}}
{{-- @include('layouts.admin.js') --}}
