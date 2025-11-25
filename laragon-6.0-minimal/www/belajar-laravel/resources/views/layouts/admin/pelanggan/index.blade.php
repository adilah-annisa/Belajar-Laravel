@include('layouts.admin.css')  {{-- AKTIFKAN FILE PERTAMA --}}
@include('layouts.admin.header')
@include('layouts.admin.sidebar')

<main class="content">
    @yield('content')
</main>

@include('layouts.admin.footer')
@include('layouts.admin.js')
