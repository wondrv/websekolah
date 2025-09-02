@extends('layouts.app')
@section('title', $post->title)
@section('content')
<article class="prose max-w-none">
  <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
  <div class="text-sm text-gray-500 mb-4">{{ optional($post->published_at)->format('d M Y H:i') }} · {{ strtoupper($post->type) }}</div>
  @if($post->cover_path)
    <img src="/{{ $post->cover_path }}" alt="{{ $post->title }}" class="w-full max-h-96 object-cover rounded mb-6" loading="lazy" decoding="async" width="1200" height="400">
  @endif
  <div class="space-y-4">{!! nl2br(e($post->body)) !!}</div>
</article>
@endsection
