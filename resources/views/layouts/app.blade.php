<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Website Sekolah')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-white text-gray-900">


  <header class="border-b bg-white/80 backdrop-blur">
    <div class="hidden md:block bg-sky-700 text-white">
      <div class="container mx-auto px-4 py-1 text-sm flex items-center justify-between">
        <div>
          <span class="opacity-90 mr-3">{{ config('school.address') }}</span>
        </div>
        <div class="space-x-4">
          <a href="tel:{{ preg_replace('/[^+0-9]/','', config('school.phone')) }}" class="hover:underline">{{ config('school.phone') }}</a>
          <a href="mailto:{{ config('school.email') }}" class="hover:underline">{{ config('school.email') }}</a>
        </div>
      </div>
    </div>
    <nav class="container mx-auto p-4 flex items-center justify-between">
      <a href="{{ route('home') }}" class="font-bold text-sky-700">{{ config('school.name') }}</a>
      <button id="menuBtn" class="md:hidden border rounded px-3 py-2" aria-controls="mainNav" aria-expanded="false">Menu</button>
      <ul id="mainNav" class="hidden md:flex md:items-center md:gap-6">
        <li><a href="{{ route('home') }}">Beranda</a></li>
        <li><a href="{{ route('pages.show','sejarah') }}">Profil</a></li>
        <li><a href="{{ route('events.index') }}">Informasi Akademik</a></li>
        <li><a href="{{ route('posts.index') }}">Berita</a></li>
        <li><a href="{{ route('contact.create') }}">Kontak</a></li>
        <li>
          <a href="{{ route('pages.show','ppdb') }}" class="inline-block bg-sky-600 text-white px-3 py-2 rounded hover:bg-sky-700">PPDB</a>
        </li>
        @auth
          <li><a class="font-semibold" href="{{ route('admin.dashboard') }}">Admin</a></li>
          <li>
            <form method="post" action="{{ route('logout') }}">@csrf
              <button class="text-red-600">Logout</button>
            </form>
          </li>
        @endauth
      </ul>
    </nav>
  </header>

  <main class="flex-1 container mx-auto p-4">@yield('content')</main>

  <footer class="border-t text-sm text-gray-700 p-6">
    <div class="container mx-auto grid gap-6 md:grid-cols-3">
      <div>
        <div class="font-semibold mb-2">{{ config('school.name') }}</div>
        <p>{{ config('school.address') }}</p>
        <p>Tel: {{ config('school.phone') }} · Email: {{ config('school.email') }}</p>
      </div>
      <div>
        <div class="font-semibold mb-2">Tautan</div>
        <ul class="space-y-1">
          <li><a class="hover:underline" href="{{ route('home') }}">Beranda</a></li>
          <li><a class="hover:underline" href="{{ route('posts.index') }}">Berita</a></li>
          <li><a class="hover:underline" href="{{ route('events.index') }}">Agenda</a></li>
          <li><a class="hover:underline" href="{{ route('pages.show','sejarah') }}">Profil</a></li>
          <li><a class="hover:underline" href="{{ route('contact.create') }}">Kontak</a></li>
        </ul>
      </div>
      <div>
        <div class="font-semibold mb-2">Layanan</div>
        <ul class="space-y-1">
          <li><a class="hover:underline" href="{{ route('pages.show','ppdb') }}">PPDB</a></li>
          <li><a class="hover:underline" href="#">Rapor</a></li>
          <li><a class="hover:underline" href="#">Unduh</a></li>
        </ul>
      </div>
    </div>
  <div class="container mx-auto text-center mt-6 text-gray-500">&copy; {{ date('Y') }} {{ config('school.name') }}</div>
  </footer>

  <script>
    // mobile nav toggle (vanilla)
    const btn = document.getElementById('menuBtn');
    const nav = document.getElementById('mainNav');
    if (btn && nav) {
      btn.addEventListener('click', () => {
        const isHidden = nav.classList.toggle('hidden');
        btn.setAttribute('aria-expanded', String(!isHidden));
      });
    }
    // helper preview gambar (dipakai di form admin)
    function previewImage(inputId, imgId){
      const i = document.getElementById(inputId);
      const img = document.getElementById(imgId);
      if(!i || !img) return;
      i.addEventListener('change', e=>{
        const file = e.target.files?.[0];
        if(file) img.src = URL.createObjectURL(file);
        img.classList.remove('hidden');
      });
    }
  </script>
</body>
</html>
