<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __construct() {}

    public function dashboard()
    {
        return view('dashboard/dashboard', []);
    }
}
