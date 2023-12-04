<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MembershipController extends Controller
{
    public function acquire($membershipName)
    {
        return Inertia::render('Membership/acquire', [
            'membershipName' => $membershipName,
        ]);
    }
}
