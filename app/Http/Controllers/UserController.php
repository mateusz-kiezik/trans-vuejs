<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers($role = null) {
        if (!empty($role)) {
            $users = User::where('role', $role)->get();
        } else {
            $users = User::all();
        }
        return response()->json($users);
    }
}
