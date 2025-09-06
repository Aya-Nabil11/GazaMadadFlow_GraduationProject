<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidateCitizenRequest;
use App\Models\Citizen;

use Illuminate\Http\Request;

class CitizenController extends Controller
{
      public function store(ValidateCitizenRequest $request)
    {
        // dd($request);
         $validated = $request->validated();
        
         $citizen = Citizen::create($validated);
        // dd($citizen);
       

        $status=false;
        if($citizen) $status=true;
        return response()->json(['status' => $status]);

    }

}
