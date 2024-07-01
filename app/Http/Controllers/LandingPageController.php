<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function index()
    {
        $routeData = $this->checkRoutes();
        return view('welcome', $routeData);
    }

    protected function checkRoutes()
    {
        $hasLoginRoute = Route::has('login');
        $hasRegisterRoute = Route::has('register');

        return compact('hasLoginRoute', 'hasRegisterRoute');
    }
}
