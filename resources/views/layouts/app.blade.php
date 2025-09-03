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


  <header class="border-b bg-white/80 backdrop-blur relative z-[9999]">
    <div class="hidden md:block bg-sky-700 text-white">
      <div class="container mx-auto px-4 py-4 text-sm flex items-center justify-between">
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
        <li class="relative">
          <button id="btn-profil" type="button" class="inline-flex items-center gap-1" aria-haspopup="true" aria-expanded="false">
            <span>Profil</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" /></svg>
          </button>
          <ul id="dropdown-profil" class="hidden mt-2 md:mt-2 md:absolute md:left-0 md:top-full md:w-56 bg-white shadow md:border md:rounded z-[10000] pointer-events-auto">
            <li><a class="block px-4 py-2 hover:bg-gray-50" href="{{ route('pages.show','sejarah') }}">Sejarah</a></li>
            <li><a class="block px-4 py-2 hover:bg-gray-50" href="{{ route('pages.show','visi-misi') }}">Visi & Misi</a></li>
            <li><a class="block px-4 py-2 hover:bg-gray-50" href="{{ route('pages.show','struktur-organisasi') }}">Struktur Organisasi</a></li>
            <li><a class="block px-4 py-2 hover:bg-gray-50" href="{{ route('events.index') }}">Informasi Akademik</a></li>
            <li><a class="block px-4 py-2 hover:bg-gray-50" href="{{ route('pages.show','prestasi') }}">Prestasi</a></li>
          </ul>
        </li>
        <li><a href="{{ route('pages.show','fasilitas') }}">Fasilitas</a></li>
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
            <p>{{ config('school.name') }} adalah sekolah berbasis islami unggul prestasi. Terletak di Provinsi Jawa Timur, Kabupaten Sidoarjo, Kecamatan Taman. Berbekal Keahlian Kompetensi dengan menerapkan berbudaya Islam.</p>
            <p>Motto: The Excellent School bagian dari Visi.</p>
            <p>Visi Misi: Sholeh Dalam Perilaku, Unggul Dalam Mutu dan Berdaya Saing Global.</p>
        </div>

        <div>
            <!-- Kosong atau tambahkan info lain di sini -->
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
    // dropdown Profil
    (function(){
      const btn = document.getElementById('btn-profil');
      const dd  = document.getElementById('dropdown-profil');
      if(!btn || !dd) return;
      function hide(){ dd.classList.add('hidden'); btn.setAttribute('aria-expanded','false'); }
      function show(){ dd.classList.remove('hidden'); btn.setAttribute('aria-expanded','true'); }
      // click toggle (mobile + desktop)
      btn.addEventListener('click', (e)=>{
        e.stopPropagation();
        if(dd.classList.contains('hidden')) show(); else hide();
      });
      // close on outside click
      document.addEventListener('click', (e)=>{
        if(!dd.contains(e.target) && e.target !== btn) hide();
      });
    })();
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
