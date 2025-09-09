<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // শুধু 'user' role-এর ইউজার এবং তাদের clients লোড করছ
        $users = User::where('role', 'user')->with('clients')->get();

        // Blade view-এ পাঠানো
        return view('onborad.adminDashboard', compact('users'));
    }
}