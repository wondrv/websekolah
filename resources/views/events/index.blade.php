@extends('layouts.app')
@section('title','Informasi Akademik')
@section('content')
<h1 class="text-2xl font-bold mb-4">Kalender / Agenda</h1>
@if($events->count() === 0)
  <div class="p-4 border rounded bg-gray-50">Belum ada agenda.</div>
@else
  <div class="space-y-3">
    @foreach($events as $ev)
      <div class="border rounded p-3">
        <div class="font-semibold">{{ $ev->title }}</div>
        <div class="text-sm text-gray-600">
          {{ optional($ev->starts_at)->format('d M Y H:i') }}
          @if($ev->ends_at)
            — {{ $ev->ends_at->format('d M Y H:i') }}
          @endif
          @if($ev->location)
            · {{ $ev->location }}
          @endif
        </div>
        @if($ev->description)
          <div class="text-gray-800 mt-1">{{ $ev->description }}</div>
        @endif
      </div>
    @endforeach
  </div>
  <div class="mt-6">{{ $events->links() }}</div>
@endif
@endsection
