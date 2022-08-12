<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function index()
    {
            // return Inertia::render('Dashboard', [
            //     'auth' => auth()->user()->hasRole('admin'),
            // ]);
    }
}
