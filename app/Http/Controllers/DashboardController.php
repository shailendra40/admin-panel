<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve the current user's roles
        $userRoles = auth()->user()->roles;

        // Pass the userRoles variable to the view
        return view('dashboard', compact('userRoles'));
    }
}
