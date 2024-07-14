<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index() : View
    {
        $user = auth()->user();

        return view('dashboard.index', ['user' => $user]);
    }
}
