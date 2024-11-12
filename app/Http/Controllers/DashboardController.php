<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a dashboard with latest 5 records for each status
     */
    public function index(Request $request)
    {

        $completed = auth()->user()->tasks()->where('status', 1)->latest()->limit(5)->get();
        $in_progress = auth()->user()->tasks()->where('status', 0)->latest()->limit(5)->get();

        return view('dashboard', compact(['completed', 'in_progress'] ));
    }
}
