@extends('layout.user')
 
@section('title', 'Akses Ditolak - Sistem Perpustakaan Terpadu')
 
@section('content')
    <section class="section-padding">
        <div class="container text-center">
            <h1 class="display-1 fw-bold text-danger">403</h1>
            <h3 class="mb-3">Akses Ditolak</h3>
            <p class="mb-4">
                {{ $exception->getMessage() ?: 'Anda tidak memiliki izin.' }}
            </p>
            <a href="{{ route('user.beranda') }}" class="btn_one">Kembali ke Beranda</a>
        </div>
    </section>
@endsection
