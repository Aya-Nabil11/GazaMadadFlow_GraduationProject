<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'identity_type' => 'required|string|max:255',
            'identity_number' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'third_name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'birth_of_date' => 'required|date',
            'marital_status' => 'required|string|max:255',
            'spouse_id_number' => 'nullable|string|max:255',//Null
            'spouse_id_type' => 'nullable|string|max:255',//Null
            'spouse_first_name' => 'nullable|string|max:255',//Null
            'spouse_second_name' => 'nullable|string|max:255',//Null
            'spouse_third_name' => 'nullable|string|max:255',//Null
            'spouse_family_name' => 'nullable|string|max:255',//Null
            'is_war_victim' => 'required|boolean',
            'is_disabled' => 'required|boolean',
            'disability_type' => 'nullable|string|max:255',//Null
            'has_chronic_diseases' => 'required|boolean',
            'displaced_or_resident' => 'required|string|max:255',
            //Contact Information
            'mobile_number1' => 'required|string|max:255', // Required mobile number
            'mobile_number2' => 'nullable|string|max:255', // Optional mobile number
            'original_governorate' => 'required|string|max:255', // Required original governorate
            'current_governorate' => 'required|string|max:255', // Required current governorate
            'population_cluster' => 'required|string|max:255', // Required population cluster
            'neighborhood' => 'required|string|max:255', // Required neighborhood
            'street' => 'required|string|max:255', // Required street
            'nearest_landmark' => 'required|string|max:255', // Required nearest landmark
            'city' => 'required|string|max:255', // Required city
            'address' => 'required|string|max:255', // Required address
        //Family Formation Data
            'family_members_count' => 'required|integer|min:0',                        // Number of family members
            'number_of_male' => 'required|integer|min:0',                               // Number of males
            'number_of_female' => 'required|integer|min:0',                             // Number of females
            'children_under_5' => 'required|integer|min:0',                             // Number of children under 5
            'children_under_2' => 'required|integer|min:0',                             // Number of children under 2
            'children_under_3' => 'required|integer|min:0',                             // Number of children under 3
            'children_6_18' => 'required|integer|min:0',                                // Number of children 6-18
            'children_5_16' => 'required|integer|min:0',                                // Number of children 5-16
            'number_of_school_students' => 'required|integer|min:0',                   // Number of school students
            'number_of_university_students' => 'required|integer|min:0',               // Number of university students
            'number_of_infants' => 'required|integer|min:0',                           // Number of infants
            'number_of_people_with_disabilities' => 'required|integer|min:0',           // Number of people with disabilities
            'number_of_people_with_chronic_diseases' => 'required|integer|min:0',      // Number of people with chronic diseases
            'number_of_elderly_people_over_60' => 'required|integer|min:0',            // Number of elderly over 60
            'number_of_pregnant_women' => 'required|integer|min:0',                     // Number of pregnant women
            'number_of_breastfeeding_women' => 'required|integer|min:0',                // Number of breastfeeding women
            'number_of_injured_due_to_war' => 'required|integer|min:0',                 // Number of injured due to war
            'care_for_non_family_members' => 'required|boolean',                        // Care for non-family members
            'number_of_children_cared_for_not_in_family_under_18' => 'required|integer|min:0', // Children cared for, not in family
            'reason_of_care' => 'nullable|string|max:255',                          // Reason for care (optional)
            'lost_family_member_during_war' => 'required|boolean',                      // Lost family member during war
         // Needs
            'urgent_basic_needs_for_family' => 'required', // 
            'secondary_needs_for_family' => 'nullable', //   
            'sources_of_family_income' => 'nullable', //   
            'monthly_income_shekels' => 'nullable|numeric|min:0', // Ensure it's a positive decimal
            'unable_to_use_land_or_properties_due_to_war' => 'nullable|boolean', // Ensure it's a boolean
            'housing_ownership' => 'required|string', // Ensure it's a string
            'type_of_housing' => 'required|string', // Ensure it's a string
            'extent_of_housing_damage_due_to_war' => 'required|string', // Ensure it's a string
            'displaced_due_to_war_and_changed_housing_location' => 'required|boolean', // Ensure it's a boolean
            'displaced_governorate' => 'nullable|string', // Nullable string
            'displaced_population_cluster' => 'nullable|string', // Nullable string
            'displaced_street' => 'nullable|string', // Nullable string
            'displaced_address' => 'nullable|string', // Nullable string
            'displaced_place_of_displacement' => 'nullable|string', // Nullable string
            'housing_type' => 'nullable|string', // Nullable string
    // Bank Information
            'account_holder_name' => 'nullable|string',
            'bank_name_branch' => 'nullable|string',
            'account_holder_id_number' => 'nullable|string',
            'account_number' => 'nullable|string',
            'has_war_damage' => 'required|boolean',
            'damage_type' => 'nullable|string',
            'agree_to_share_data_for_assistance' => 'required|boolean',

        ];
    }



    public function prepareForValidation(){

        if ($this->has('urgent_basic_needs_for_family')) {
            $this->merge([
                'urgent_basic_needs_for_family' => json_encode($this->input('urgent_basic_needs_for_family'))
            ]);
        }

        if ($this->has('secondary_needs_for_family')) {
            $this->merge([
                'secondary_needs_for_family' => json_encode($this->input('secondary_needs_for_family'))
            ]);
        }

        if ($this->has('sources_of_family_income') && is_array($this->input('sources_of_family_income'))) {
            $this->merge([
                'sources_of_family_income' => json_encode($this->input('sources_of_family_income'))
            ]);
        }
}

}
