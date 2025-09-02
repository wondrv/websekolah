<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(20);
        return view('admin.messages', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $data = $r->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'nullable',
            'message' => 'required|min:10'
        ]);
        ContactMessage::create($data);
        return back()->with('ok', 'Pesan terkirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        //
    }
}
