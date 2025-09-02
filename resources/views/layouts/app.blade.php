<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Website Sekolah')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex flex-col bg-white text-gray-900">
  <!-- Top contact bar -->
  <div class="bg-sky-700 text-white text-sm">
    <div class="container mx-auto px-4 py-2 flex flex-wrap items-center justify-between gap-2">
      <div class="flex items-center gap-4">
        <span>Tel: <a href="tel:+6281319457080" class="underline decoration-white/30 hover:decoration-white">+62 813-1945-7080</a></span>
        <span>Email: <a href="mailto:info@sekolah.test" class="underline decoration-white/30 hover:decoration-white">info@sekolah.test</a></span>
      </div>
      <div class="flex items-center gap-3 opacity-90">
        <a href="#" aria-label="Facebook" class="hover:opacity-100">Facebook</a>
        <a href="#" aria-label="Twitter" class="hover:opacity-100">Twitter</a>
        <a href="#" aria-label="YouTube" class="hover:opacity-100">YouTube</a>
      </div>
    </div>
  </div>
  <header class="border-b bg-white/80 backdrop-blur">
    <nav class="container mx-auto p-4 flex items-center justify-between">
      <a href="{{ route('home') }}" class="font-bold text-sky-700">Nama Sekolah</a>
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
        <div class="font-semibold mb-2">Nama Sekolah</div>
        <p>Jl. Contoh Alamat No. 123, Kota, Provinsi</p>
        <p>Tel: +62 813-1945-7080 · Email: info@sekolah.test</p>
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
    <div class="container mx-auto text-center mt-6 text-gray-500">&copy; {{ date('Y') }} Nama Sekolah</div>
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
