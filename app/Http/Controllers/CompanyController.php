<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function newCompany(Request $request) {
        $company = [];
        $company['name'] = $request['name'];
        $company['country'] = $request['country'];
        $company['street'] = $request['street'];
        $company['postal_code'] = $request['postal'];
        $company['city'] = $request['city'];
        $company['phone'] = $request['phone'];
        $company['email'] = $request['email'];
        $company['tax_number'] = $request['tax'];
        Company::create($company);

        return response()->json([
            'alert' => true,
            'message' => 'New company created successfully'
        ]);
    }
}
