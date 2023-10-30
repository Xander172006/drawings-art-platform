<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\User;

class SearchController extends Controller
{
    public function index()
    {
        $users = User::all();

        return Inertia::render('Search', [
            'users' => $users
        ]);
    }
}
