@extends('layouts.app')
@section('title', $page->title)
@section('content')
<article class="prose max-w-none">
  <h1 class="text-3xl font-bold mb-4">{{ $page->title }}</h1>
  <div class="text-sm text-gray-500 mb-4">{{ optional($page->published_at)->format('d M Y H:i') }}</div>
  <div class="space-y-4">{!! nl2br(e($page->content)) !!}</div>
</article>
@endsection
