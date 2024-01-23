<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sidebar;

class SidebarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $sidebar = Sidebar::all();
        return $sidebar;
    }
    public function sidebarData()
    {
        $sidebar = Sidebar::all();
        return $sidebar;
        // return view('layouts.navbars.auth.sidebar', ['sidebarItems' => $sidebar]);
    }
    public function changeStatus(Request $request)

    {

        $sidebar = Sidebar::find($request->sidebar_id);

        $sidebar->status = $request->status;

        $sidebar->save();
        // Redirect back to the view or any other page
        return response()->json(['success' => 'Status changed successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
