<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ActivitiesController extends Controller
{
    public function show(User $user)
    {
        return $user->activity()->with(['user', 'subject'])->get();
    }
}
