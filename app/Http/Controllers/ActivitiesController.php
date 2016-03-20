<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;

class ActivitiesController extends Controller
{
    public function show(User $user)
    {
        $activity = $user->activity()->with(['user', 'subject'])->get();

        return view('activity.show', compact('activity'));
    }
}
