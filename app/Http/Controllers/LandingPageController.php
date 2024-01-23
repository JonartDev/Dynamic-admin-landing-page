<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Links;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::all();
        $buttons = Links::where("category", 'button')->where('status', 1)->orderBy('order_number')->orderBy('_group')->get();
        $links = Links::where("category", 'link')->where('status', 1)->orderBy('order_number')->orderBy('_group')->get();;
        $banner = Links::where("category", 'banner')->where('status', 1)->orderBy('order_number')->orderBy('_group')->get();;
        return view('index', compact('admin', 'buttons', 'links', 'banner'));
    }
    public function banner()
    {
        $banner = Links::where("category", 'banner')->where('status', 1)->orderBy('order_number')->orderBy('_group')->get();
        return response()->json($banner);
    }
    public function link()
    {
        $link = Links::where("category", 'link')->where('status', 1)->orderBy('order_number')->orderBy('_group')->get();
        return response()->json($link);
    }
    public function button()
    {
        $button = Links::where("category", 'button')->where('status', 1)->orderBy('order_number')->orderBy('_group')->get();
        return response()->json($button);
    }

    public function tutorial()
    {
        $admin = Admin::all();
        return view('tutorial.index', compact('admin'));
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
