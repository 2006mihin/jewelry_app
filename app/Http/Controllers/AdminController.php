<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized.');
        }

        // ✅ Count totals inside method
        $totalOrders     = Order::count();
        $totalProducts   = Product::count();
        $totalUsers      = User::count();
        $totalCustomers  = User::where('role', 'customer')->count();
        $totalAdmins     = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalUsers',
            'totalCustomers',
            'totalAdmins'
        ));
    }
}
