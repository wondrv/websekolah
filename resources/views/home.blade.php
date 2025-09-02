@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
    <section class="relative overflow-hidden rounded-lg border bg-gradient-to-r from-sky-50 to-white">
        <div class="p-8 md:p-12 grid md:grid-cols-2 gap-6 items-center">
            <div>
                <div class="text-sm text-sky-700 font-semibold mb-2">Selamat Datang</div>
                <h1 class="text-3xl md:text-4xl font-extrabold leading-tight mb-3">{{ config('school.name') }}</h1>
                <p class="text-gray-700 mb-5">Sekolah unggul dengan lingkungan belajar yang religius, disiplin, dan
                    berprestasi.</p>
                <div class="flex gap-3">
                    <a href="{{ route('pages.show', 'ppdb') }}" class="bg-sky-600 text-white px-4 py-2 rounded">PPDB</a>
                    <a href="{{ route('posts.index') }}" class="border px-4 py-2 rounded">Berita</a>
                </div>
            </div>
            <div class="hidden md:block">
                <div
                    class="aspect-[4/3] w-full rounded-lg bg-gradient-to-br from-sky-100 via-white to-sky-50 flex items-center justify-center relative">
                    <img src="{{ asset('images/sekolah.png') }}" alt="Foto Sekolah"
                        class="absolute inset-0 w-full h-full object-cover rounded-lg" />
                </div>
            </div>
        </div>
        <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-sky-100 rounded-full blur-2xl opacity-70"></div>
    </section>

    <section class="grid md:grid-cols-1 gap-6 mt-8">
        <div class="border rounded-lg p-6 bg-white shadow-sm flex flex-col md:flex-row items-center">
            <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6 flex items-center justify-center">
                <img src="{{ asset('images/kepsek.png') }}" alt="Foto Kepala Sekolah"
                    class="w-60 h-60 object-cover rounded-full border shadow" />
            </div>
            <div>
                <div class="text-sky-700 font-semibold mb-2">Sambutan Kepala Sekolah</div>
                <p class="text-gray-700 mb-2">
                    Assalamu'alaikum warahmatullahi wabarakatuh. Selamat datang di website resmi
                    {{ config('school.name') }}. Kami berkomitmen menciptakan lingkungan belajar yang inspiratif, religius,
                    dan berprestasi. Semoga informasi di sini bermanfaat bagi seluruh warga sekolah dan masyarakat.
                </p>
                <div class="mt-3 font-semibold text-sky-600">Kepala Sekolah</div>
            </div>
        </div>
    </section>

    <section class="mt-10 grid grid-cols-1 gap-6">
        <div class="border rounded p-5">
            <div class="text-sky-700 text-sm font-semibold mb-1">Program Unggulan</div>
            <div class="font-bold mb-1">Tahfidz & Literasi</div>
            <div class="flex items-center justify-center">
            </div>
            <p class="text-gray-700">Mendukung pembentukan karakter dan kompetensi siswa melalui pembiasaan harian.</p>
        </div>
        <div class="border rounded p-5">
            <div class="text-sky-700 text-sm font-semibold mb-1">Galeri</div>
            <div class="font-bold mb-1">Kegiatan Siswa</div>
            <p class="text-gray-700">Dokumentasi event, ekstrakurikuler, dan karya siswa.</p>
        </div>
        <div class="border rounded p-5">
            <div class="text-sky-700 text-sm font-semibold mb-1">Testimoni</div>
            <div class="font-bold mb-1">Suara Orang Tua</div>
            <p class="text-gray-700">Pengalaman belajar yang menyenangkan dan bermakna.</p>
        </div>
    </section>

@endsection
