<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Route;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View
    {
        return view('dashboard');
    }
    public function login()
    {
        return view('welcome');
    }
}
