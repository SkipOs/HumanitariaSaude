<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        dd('todo!');    
    }

}
