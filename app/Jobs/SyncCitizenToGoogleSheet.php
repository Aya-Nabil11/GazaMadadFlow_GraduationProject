<?php

namespace App\Jobs;

use App\Models\Citizen;
use App\Services\GoogleSheet;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncCitizenToGoogleSheet
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $googleSheet = new GoogleSheet();

        // Fetch citizens that haven't been exported yet
        $citizens = Citizen::whereNull('exported_at')->get();

        if ($citizens->isEmpty()) {
            \Log::info('No citizens to sync.');
            return;
        }

        // Map all fields
        $data = $citizens->map(function ($c) {
            return [
                // Personal Data
                $c->id,
                $c->first_name,
                $c->second_name,
                $c->third_name,
                $c->family_name,
                $c->document,
                $c->identity_type,
                $c->identity_number,
                $c->date_of_birth,
                $c->gender,
                $c->marital_status,
                $c->spouse_first_name,
                $c->spouse_second_name,
                $c->spouse_third_name,
                $c->spouse_family_name,
                $c->spouse_identity_type,
                $c->spouse_identity_number,
                $c->is_war_victim,
                $c->is_disabled,
                $c->disability_type,
                $c->has_chronic_disease,

                // Contact Data
                $c->phone_1,
                $c->phone_2,
                $c->governorate,
                $c->city,
                $c->housing_complex,
                $c->neighborhood,
                $c->street,
                $c->address,
                $c->nearest_landmark,

                // Family Formation Data
                $c->family_members_count,
                $c->male_count,
                $c->female_count,
                $c->children_under_2,
                $c->children_under_3,
                $c->children_under_5,
                $c->children_aged_5_16_count,
                $c->children_aged_6_18_count,
                $c->number_of_school_students,
                $c->number_of_university_students,
                $c->number_of_infants,
                $c->number_of_people_with_disabilities,
                $c->number_of_people_with_chronic_diseases,
                $c->number_of_elderly_over_60,
                $c->number_of_pregnant_women,
                $c->number_of_breastfeeding_women,
                $c->number_of_injured_due_to_war,
                $c->is_caring_for_non_family_members,
                $c->number_of_children_cared_for_not_in_family_under_18,
                $c->reason_for_caring_for_children,
                $c->is_family_member_lost_during_war,
                $c->relationship_to_family_members_lost_during_war,

                // Housing Data
                $c->housing_ownership,
                $c->type_of_housing,
                $c->is_war_damage,
                $c->extent_of_housing_damage_due_to_war,
                $c->is_displaced_due_to_war_and_changed_housing_location,
                $c->displaced_governorate,
                $c->displaced_housing_complex,
                $c->displaced_street,
                $c->displaced_address,
                $c->displaced_place_of_displacement,

                // Needs
                $c->urgent_basic_needs_for_family,
                $c->secondary_needs_for_family,
                $c->sources_of_family_income,
                $c->monthly_income_shekels,
                $c->is_unable_to_use_land_or_properties_due_to_war,
                $c->has_bank_account,

                // Bank Information
                $c->account_holder_name,
                $c->bank_name_branch,
                $c->account_holder_id_number,
                $c->account_number,

                // Export & Timestamps
                $c->agree_to_share_data_for_assistance,
                $c->exported_at,
                $c->created_at,
                $c->updated_at,
            ];
        })->values()->toArray();

        $cleanData = array_map(function ($row) {
            $row = array_values($row); // numeric keys
            foreach ($row as $i => $value) {
                if (is_array($value)) {
                    $row[$i] = implode(',', $value); // flatten arrays
                }
            }
            return $row;
        }, $data);

        try {
            \Log::info('Syncing data: ', $cleanData);
            $googleSheet->saveDataToSheet($cleanData);

            // Mark exported
            $citizens->each(fn($c) => $c->update(['exported_at' => now()]));

            \Log::info(count($citizens) . ' citizens synced to Google Sheet.');

        } catch (\Throwable $e) {
            \Log::error("Google Sheet export failed: " . $e->getMessage());
        }
    }
}