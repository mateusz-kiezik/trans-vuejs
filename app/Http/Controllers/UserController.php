<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUsers($role = null)
    {
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

    public function newUser(Request $request)
    {

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

    public function getUser($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function updateUser(Request $request)
    {
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

    public function deleteUser(Request $request)
    {
        $userId = $request['id'];
        $user = User::findOrFail($userId);
        $user->status = 0;
        $user->save();

        return response()->json([
            'message' => 'User has been deleted successfully'
        ]);
    }

    public function createUser(Request $request)
    {
        if ($request['company.id']) {
            $user = [];
            $user['name'] = $request['user.firstName'] . ' ' . $request['user.lastName'];
            $user['email'] = $request['user.email'];
            $user['phone'] = $request['user.phone'];
            $user['role'] = 1;
            $user['status'] = 1;
            $user['password'] = Hash::make('qwerty');
            $user['company'] = $request['company.id'];
            $user['created_at'] = Carbon::now();
            $user['updated_at'] = Carbon::now();
            User::create($user);
        } else {
            $company = [];
            $company['name'] = $request['company.name'];
            $company['tax_number'] = $request['company.tax'];
            $company['country'] = $request['company.country'];
            $company['street'] = $request['company.street'];
            $company['postal_code'] = $request['company.postal'];
            $company['city'] = $request['company.city'];
            $company['phone'] = $request['company.phone'];
            $company['email'] = $request['company.email'];
            $company['created_at'] = Carbon::now();
            $company['updated_at'] = Carbon::now();
            $companyId = Company::create($company);

            $user = [];
            $user['name'] = $request['user.firstName'] . ' ' . $request['user.lastName'];
            $user['email'] = $request['user.email'];
            $user['phone'] = $request['user.phone'];
            $user['role'] = 1;
            $user['status'] = 1;
            $user['password'] = Hash::make('qwerty');
            $user['company'] = $companyId->id;
            $user['created_at'] = Carbon::now();
            $user['updated_at'] = Carbon::now();
            User::create($user);
        }

        return response()->json([
            'message' => 'New user created successfully',
            'alert' => true
        ]);
    }
}
