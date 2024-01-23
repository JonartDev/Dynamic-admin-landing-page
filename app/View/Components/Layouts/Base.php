<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use App\Models\Admin;

class Base extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Fetch a single record from the Admin model and assign it to $admin
        $this->admin = Admin::where(["id" => 1])->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public $admin;
    public function render()
    {
        // $this->admin= Admin::where(["id" => 1])->first();
        return view('layouts.base', ['admin' => $this->admin]);
    }
}
