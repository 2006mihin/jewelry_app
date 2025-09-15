<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller // ← Must extend Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // ✅ Now this works
    }

    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized.');
        }

        return view('admin.dashboard');
    }
}
