@extends('layouts.app')
@section('title','Inbox Pesan')
@section('content')
<h1 class="text-2xl font-bold mb-4">Inbox Pesan</h1>
@if(session('ok'))
  <div class="p-3 mb-4 border bg-green-50 text-green-700 rounded">{{ session('ok') }}</div>
@endif
<div class="overflow-x-auto border rounded">
  <table class="min-w-full text-sm">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-3 py-2 text-left">Waktu</th>
        <th class="px-3 py-2 text-left">Nama</th>
        <th class="px-3 py-2 text-left">Email</th>
        <th class="px-3 py-2 text-left">Subjek</th>
        <th class="px-3 py-2 text-left">Pesan</th>
        <th class="px-3 py-2 text-right">Aksi</th>
      </tr>
    </thead>
    <tbody class="divide-y">
      @forelse($messages as $m)
      <tr>
        <td class="px-3 py-2 text-gray-600">{{ $m->created_at->format('d M Y H:i') }}</td>
        <td class="px-3 py-2">{{ $m->name }}</td>
        <td class="px-3 py-2"><a class="text-blue-600 hover:underline" href="mailto:{{ $m->email }}">{{ $m->email }}</a></td>
        <td class="px-3 py-2">{{ $m->subject ?: '—' }}</td>
        <td class="px-3 py-2 max-w-lg">
          <div style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">{{ $m->message }}</div>
        </td>
        <td class="px-3 py-2 text-right">
          <button type="button" class="px-3 py-1 border rounded hover:bg-gray-50" onclick="alert(@json($m->message))">Lihat</button>
          <form action="{{ route('admin.messages.destroy',$m) }}" method="post" class="inline">
            @csrf @method('DELETE')
            <button type="submit" class="px-3 py-1 border rounded text-red-600 hover:bg-red-50 js-delete">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
      <tr><td class="px-3 py-6 text-center text-gray-500" colspan="6">Belum ada pesan.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="mt-4">{{ $messages->links() }}</div>
<script>
  document.querySelectorAll('.js-delete').forEach(btn=>{
    btn.addEventListener('click', (e)=>{
      if(!confirm('Yakin hapus pesan ini?')) e.preventDefault();
    });
  });
</script>
@endsection
