<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
     protected $table = 'citizens';
      protected $fillable = [
        // Identity
        'first_name',
        'second_name',
        'third_name',
        'family_name',
        'document',
        'identity_type',
        'identity_number',
        'date_of_birth',
        'gender',
        'marital_status',
        'spouse_first_name',
        'spouse_second_name',
        'spouse_third_name',
        'spouse_family_name',
        'spouse_identity_type',
        'spouse_identity_number',
        'is_war_victim',
        'is_disabled',
        'disability_type',
        'has_chronic_disease',
        //contact
        'phone_1',
        'phone_2',
        'governorate',
        'city',
        'housing_complex',
        'neighborhood',
        'street',
        'address',
        'nearest_landmark',
        // Family formation
        'family_members_count', 
        'male_count', 
        'female_count',
        'children_under_2',
        'children_under_3',
        'children_under_5',
        'children_aged_5_16_count', 
        'children_aged_6_18_count',
        'number_of_school_students', 
        'number_of_university_students',
        'number_of_infants', 
        'number_of_people_with_disabilities',
        'number_of_people_with_chronic_diseases', 
        'number_of_elderly_over_60',
        'number_of_pregnant_women',
        'number_of_breastfeeding_women',
        'number_of_injured_due_to_war', 
        'is_caring_for_non_family_members',
        'number_of_children_cared_for_not_in_family_under_18',
        'reason_for_caring_for_children', 
        'is_family_member_lost_during_war',
        'relationship_to_family_members_lost_during_war',
        // Housing & displacement
        'housing_ownership',
        'type_of_housing', 
        'is_war_damage',
        'extent_of_housing_damage_due_to_war',
        'is_displaced_due_to_war_and_changed_housing_location',
        'displaced_governorate',
        'displaced_housing_complex',
        'displaced_street', 
        'displaced_address',
        'displaced_place_of_displacement',
        // Family needs & income
        'urgent_basic_needs_for_family',
        'secondary_needs_for_family',
        'sources_of_family_income',
        'monthly_income_shekels',
        'is_unable_to_use_land_or_properties_due_to_war',
        'has_bank_account',
        // Bank details
        'account_holder_name', 
        'bank_name_branch',
        'account_holder_id_number',
        'account_number',
        'agree_to_share_data_for_assistance',

        'exported_at',

    ];
   
}
