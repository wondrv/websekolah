<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('is_public', true)->orderBy('starts_at', 'asc')->paginate(12);
        return view('events.index', compact('events'));
    }

    public function adminIndex()
    {
        $events = Event::orderBy('starts_at', 'desc')->paginate(12);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('admin.events.form', ['event' => new Event]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
            'location' => 'nullable|string|max:255',
            'is_public' => 'nullable|boolean',
        ]);
        $data['is_public'] = (bool)($request->input('is_public'));
        Event::create($data);
        return redirect()->route('admin.dashboard')->with('ok', 'Event dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
    return view('admin.events.form', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'starts_at' => 'required|date',
            'ends_at' => 'nullable|date|after_or_equal:starts_at',
            'location' => 'nullable|string|max:255',
            'is_public' => 'nullable|boolean',
        ]);
        $data['is_public'] = (bool)($request->input('is_public'));
        $event->update($data);
        return redirect()->route('admin.dashboard')->with('ok', 'Event diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
    $event->delete();
    return back()->with('ok', 'Event dihapus');
    }
}
