@extends('layouts.app')
@section('title','Dashboard Admin')
@section('content')
<h1 class="text-2xl font-bold mb-4">Dashboard</h1>

<div class="grid md:grid-cols-4 gap-4 mb-6">
  <div class="border p-4 rounded bg-white">
    <div class="text-sm text-gray-600">Posts</div>
    <div class="text-3xl font-bold">{{ \App\Models\Post::count() }}</div>
    <div class="mt-3 flex gap-2">
      <a class="px-3 py-1 border rounded hover:bg-gray-50" href="{{ route('admin.posts.index') }}">Kelola</a>
      <a class="px-3 py-1 border rounded hover:bg-gray-50" href="{{ route('posts.create') }}">Tambah</a>
    </div>
  </div>
  <div class="border p-4 rounded bg-white">
    <div class="text-sm text-gray-600">Pages</div>
    <div class="text-3xl font-bold">{{ \App\Models\Page::count() }}</div>
    <div class="mt-3 flex gap-2">
      <a class="px-3 py-1 border rounded hover:bg-gray-50" href="{{ route('admin.pages.index') }}">Kelola</a>
      <a class="px-3 py-1 border rounded hover:bg-gray-50" href="{{ route('pages.create') }}">Tambah</a>
    </div>
  </div>
  <div class="border p-4 rounded bg-white">
    <div class="text-sm text-gray-600">Events</div>
    <div class="text-3xl font-bold">{{ \App\Models\Event::count() }}</div>
    <div class="mt-3 flex gap-2">
      <a class="px-3 py-1 border rounded hover:bg-gray-50" href="{{ route('admin.events.index') }}">Kelola</a>
      <a class="px-3 py-1 border rounded hover:bg-gray-50" href="{{ route('events.create') }}">Tambah</a>
    </div>
  </div>
  <div class="border p-4 rounded bg-white">
    <div class="text-sm text-gray-600">Inbox Pesan</div>
    <div class="text-3xl font-bold">{{ \App\Models\ContactMessage::count() }}</div>
    <div class="mt-3 flex gap-2">
      <a class="px-3 py-1 border rounded hover:bg-gray-50" href="{{ route('admin.messages') }}">Buka Inbox</a>
    </div>
  </div>
</div>

<div class="grid md:grid-cols-3 gap-4">
  <a class="border p-4 rounded hover:bg-gray-50" href="{{ route('admin.posts.index') }}">Kelola Posts</a>
  <a class="border p-4 rounded hover:bg-gray-50" href="{{ route('admin.events.index') }}">Kelola Events</a>
  <a class="border p-4 rounded hover:bg-gray-50" href="{{ route('admin.pages.index') }}">Kelola Pages</a>
  <a class="border p-4 rounded hover:bg-gray-50" href="{{ route('admin.messages') }}">Inbox Pesan</a>
</div>
@endsection
