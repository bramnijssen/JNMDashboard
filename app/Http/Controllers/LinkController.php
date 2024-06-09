<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Links/Index', [
            'links' => Link::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $dashboard)
    {
        return Inertia::render('Links/Create', [
            'dashboard' => $dashboard,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dashboard = $request->input('dashboard');
        $links = Link::query()->where('dashboard', $dashboard)->get();

        $link = new Link();
        $link->title = $request->input('title');
        $link->url = $request->input('url');
        $link->hex = $request->input('hex');
        $link->position = $links->max('position') ?? 0;
        $link->dashboard = $dashboard;
        $link->save();

        return redirect()->route('links.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $link->fill($request->all());
        $link->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
    }
}
