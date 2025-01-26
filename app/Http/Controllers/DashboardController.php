<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Exige autenticação para todas as ações
    }

    public function index()
    {
       // return view('dashboard');
    }
}
