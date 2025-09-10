<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidateCitizenRequest;
use App\Models\Citizen;

use Illuminate\Http\Request;

class CitizenController extends Controller
{
   public function store(ValidateCitizenRequest $request)
{
    $validated = $request->validated();

    try {
        $citizen = Citizen::create($validated);

        if ($citizen) {
            return response()->json([
                'status' => true,
                'message' => 'Citizen successfully created!'
            ], 200); // HTTP 200 OK
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create citizen.'
            ], 500); // HTTP 500 Internal Server Error
        }

    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'An error occurred: ' . $e->getMessage()
        ], 500);
    }
}

}
