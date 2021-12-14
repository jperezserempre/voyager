<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function update_name(Request $request)
    {
        $request->validate(['name' => 'required']);

        $user = Auth::user();

        $user->update(['name' => $request->input('name')]);
    }
}
