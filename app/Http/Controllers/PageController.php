<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.form', ['page' => new Page]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $data = $r->validate(['slug' => 'required|unique:pages,slug', 'title' => 'required', 'content' => 'required', 'published_at' => 'nullable|date']);
        Page::create($data);
        return redirect()->route('admin.dashboard')->with('ok', 'Halaman dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Page $page)
    {
        $data = $r->validate(['slug' => "required|unique:pages,slug,{$page->id}", 'title' => 'required', 'content' => 'required', 'published_at' => 'nullable|date']);
        $page->update($data);
        return redirect()->route('admin.dashboard')->with('ok', 'Halaman diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('ok', 'Halaman dihapus');
    }
}
