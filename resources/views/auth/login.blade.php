@extends('layouts.app')
@section('title','Login')
@section('content')
<form method="post" action="{{ route('login') }}" class="grid gap-3 max-w-sm mx-auto">
  @csrf
  <input name="email" type="email" class="border p-2 rounded" placeholder="Email" required>
  <input name="password" type="password" class="border p-2 rounded" placeholder="Password" required>
  @error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
  <button class="bg-blue-600 text-white px-4 py-2 rounded">Masuk</button>
</form>
@endsection
    