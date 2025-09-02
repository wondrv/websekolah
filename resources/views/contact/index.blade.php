@extends('layouts.app')
@section('title','Kontak')
@section('content')
<h1 class="text-2xl font-bold mb-4">Kontak</h1>
@if(session('ok'))
  <div class="p-3 mb-4 border bg-green-50 text-green-700 rounded">{{ session('ok') }}</div>
@endif
@if ($errors->any())
  <div class="p-3 mb-4 border bg-red-50 text-red-700 rounded">
    <div class="font-semibold">Periksa kembali isian Anda:</div>
    <ul class="list-disc list-inside">
      @foreach ($errors->all() as $err) <li>{{ $err }}</li> @endforeach
    </ul>
  </div>
@endif
<form method="post" action="{{ route('contact.store') }}" class="grid gap-3 max-w-lg">
  @csrf
  <input name="name" class="border p-2 rounded" placeholder="Nama" value="{{ old('name') }}" required>
  <input type="email" name="email" class="border p-2 rounded" placeholder="Email" value="{{ old('email') }}" required>
  <input name="subject" class="border p-2 rounded" placeholder="Subjek (opsional)" value="{{ old('subject') }}">
  <textarea name="message" rows="6" class="border p-2 rounded" placeholder="Pesan" required>{{ old('message') }}</textarea>
  <button class="bg-blue-600 text-white px-4 py-2 rounded">Kirim</button>
</form>

<div class="mt-8">
  <h2 class="font-semibold text-lg mb-2">Peta Lokasi</h2>
  <div class="aspect-[16/9] w-full border rounded overflow-hidden">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.977938227148!2d112.631!3d-7.130!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMDcnNDguMCJTIDExMsKwMzcnNTEuNiJF!5e0!3m2!1sid!2sid!4v{{ time() }}"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>
@endsection
