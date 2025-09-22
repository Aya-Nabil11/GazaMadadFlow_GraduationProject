<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Http\Request;
use App\Jobs\SyncCitizenToGoogleSheet;
use App\Http\Requests\ValidateUserRequest;

class CitizenController extends Controller
{

    public function index()
    {
        $citizens = Citizen::latest()->get();
        return view('citizens.index', compact('citizens'));
    }

    public function create()
    {
        return view('citizens.create');
    }
// Immediatly
    // public function store(ValidateUserRequest $request)
    // {
          
    //     $data = $request->validated();
    //     $data = array_merge(['id' => 1], $data);
    //     //dd($validated);
    //     $data = array_map(function($value) {
    //         return $value === null ? '' : $value;
    //     }, $data);
    //     $values = [
    //     [
    //         $data['id'],
    //         $data['identity_type'],
    //         $data['identity_number'],
    //         $data['first_name'],
    //         $data['second_name'],
    //         $data['third_name'],
    //         $data['family_name'],
    //         $data['gender'],
    //         $data['birth_of_date'],
    //         $data['marital_status'],
    //         $data['spouse_id_number'],
    //         $data['spouse_id_type'],
    //         $data['spouse_first_name'],
    //         $data['spouse_second_name'],
    //         $data['spouse_third_name'],
    //         $data['spouse_family_name'],
    //         $data['is_war_victim'],
    //         $data['is_disabled'],
    //         $data['disability_type'],
    //         $data['has_chronic_diseases'],
    //         $data['displaced_or_resident'],
    //         //Contact Data
    //         $data['mobile_number1'],
    //         $data['mobile_number2'],
    //         $data['original_governorate'],
    //         $data['current_governorate'],
    //         $data['population_cluster'],
    //         $data['neighborhood'],
    //         $data['street'],
    //         $data['nearest_landmark'],
    //         $data['city'],
    //         $data['address'],
    //         //Family Formation
    //         $data['family_members_count'],
    //         $data['number_of_male'],
    //         $data['number_of_female'],
    //         $data['children_under_5'],
    //         $data['children_under_2'],
    //         $data['children_under_3'],
    //         $data['children_6_18'],
    //         $data['children_5_16'],
    //         $data['number_of_school_students'],
    //         $data['number_of_university_students'],
    //         $data['number_of_infants'],
    //         $data['number_of_people_with_disabilities'],
    //         $data['number_of_people_with_chronic_diseases'],
    //         $data['number_of_elderly_people_over_60'],
    //         $data['number_of_pregnant_women'],
    //         $data['number_of_breastfeeding_women'],
    //         $data['number_of_injured_due_to_war'],
    //         $data['care_for_non_family_members'],
    //         $data['number_of_children_cared_for_not_in_family_under_18'],
    //         $data['reason_of_care'],
    //         $data['lost_family_member_during_war'],
    //         //Needs
    //         $data['urgent_basic_needs_for_family'],
    //         $data['secondary_needs_for_family'],
    //         $data['sources_of_family_income'],
    //         $data['monthly_income_shekels'],
    //         $data['unable_to_use_land_or_properties_due_to_war'],
    //         $data['housing_ownership'],
    //         $data['type_of_housing'],
    //         $data['extent_of_housing_damage_due_to_war'],
    //         $data['displaced_due_to_war_and_changed_housing_location'],
    //         $data['displaced_governorate'],
    //         $data['displaced_population_cluster'],
    //         $data['displaced_street'],
    //         $data['displaced_address'],
    //         $data['displaced_place_of_displacement'],
    //         $data['housing_type'],
    //         //Bank Data
    //         $data['account_holder_name'],
    //         $data['bank_name_branch'],
    //         $data['account_holder_id_number'],
    //         $data['account_number'],
    //         $data['has_war_damage'],
    //         $data['damage_type'],
    //         $data['agree_to_share_data_for_assistance'],
    //     ]
    // ];
    //     // Send to Google Sheet immediately
    //     app(\App\Services\GoogleSheet::class)->saveDataToSheet($values);

    //     $status=false;
    //     if($values) $status=true;
    //     return redirect()->back()->with('status' , $status);    }


// Using Jobs
    public function store(ValidateUserRequest $request)
    {
        
         $validated = $request->validated();
        // Assign default empty string for nullable fields if they are null
        $validated = array_map(function($value) {
            return $value === null ? '' : $value;
        }, $validated);
        // Create the Citizen record
         $citizen = Citizen::create($validated);
        // dd($citizen);
        //  dispatch the job for Google Sheets export
        if (is_null($citizen->exported_at)) {
            SyncCitizenToGoogleSheet::dispatch();
        }

        $status=false;
        if($citizen) $status=true;
        return redirect()->back()->with('status' , $status);

    }
}
