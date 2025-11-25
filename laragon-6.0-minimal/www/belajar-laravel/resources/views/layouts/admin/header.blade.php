{{-- resources/views/admin/layouts/header.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm fixed-top" style="margin-left:250px;">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h5">Admin Dashboard</span>
        <div class="d-flex align-items-center">
            <span class="me-3">{{ Auth::user()->name ?? 'Admin' }}</span>
            <a href="#" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>

{{-- Tambahkan sedikit margin agar konten tidak ketimpa navbar --}}
<div style="margin-top:70px;"></div>
