<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers($role = null) {
        if (!empty($role)) {
            $users = User::where('role', $role)
                ->with('companyData')
                ->with('roleData')
                ->where('status', 1)
                ->get();
        } else {
            $users = User::where('status', 1)
                ->with('companyData')
                ->with('roleData')
                ->get();
        }
        return response()->json($users);
    }

    public function newUser(Request $request) {

        $user = [];
        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        $user['phone'] = $request['phone'];
        $user['role'] = $request['role'];
        $user['status'] = 1;
        $user['password'] = Hash::make('qwerty');
        $user['company'] = rand(1, 100);
        $user['created_at'] = Carbon::now();
        $user['updated_at'] = Carbon::now();

        User::create($user);

        return response()->json([
            'message' => 'New user created successfully'
        ]);
    }

    public function getUser($id) {
        $user = User::find($id);
        return response()->json($user);
    }

    public function updateUser(Request $request) {
        $userId = $request['id'];
        $user = User::findOrFail($userId);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->save();
        return response()->json([
            'message' => 'User has been updated successfully'
        ]);
    }

    public function deleteUser(Request $request) {
        $userId = $request['id'];
        $user = User::findOrFail($userId);
        $user->status = 0;
        $user->save();

        return response()->json([
            'message' => 'User has been deleted successfully'
        ]);
    }

}
