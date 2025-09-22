<?php

namespace App\Jobs;

use App\Models\Citizen;
use App\Services\GoogleSheet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncCitizenToGoogleSheet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        \Log::error("Google Sheet export failed: " );
        $googleSheet = new GoogleSheet();

        $citizens = Citizen::whereNull('exported_at')->get();

        if ($citizens->isEmpty()) return;

        $data = $citizens->map(function ($c) {
            return [
                    $c->id,                         // Primary ID
                    $c->identity_type,              // Identity type
                    $c->identity_number,            // Identity number
                    $c->first_name,                 // First name
                    $c->second_name,                // Second name
                    $c->third_name,                 // Third name
                    $c->family_name,                // Family name
                    $c->gender,                     // Gender
                    $c->birth_of_date,              // Birth date
                    $c->marital_status,             // Marital status
                    $c->spouse_id_number,           // Spouse ID number
                    $c->spouse_id_type,             // Spouse ID type
                    $c->spouse_first_name,          // Spouse first name
                    $c->spouse_second_name,         // Spouse second name
                    $c->spouse_third_name,          // Spouse third name
                    $c->spouse_family_name,         // Spouse family name
                    $c->is_war_victim,              // War victim status
                    $c->is_disabled,                // Disabled status
                    $c->disability_type,            // Disability type
                    $c->has_chronic_diseases,       // Chronic diseases status
                    $c->displaced_or_resident,      // Displaced or resident status
                    $c->mobile_number1,             // Mobile number 1
                    $c->mobile_number2,             // Mobile number 2
                    $c->original_governorate,      // Original governorate
                    $c->current_governorate,       // Current governorate
                    $c->population_cluster,        // Population cluster
                    $c->neighborhood,               // Neighborhood
                    $c->street,                     // Street
                    $c->nearest_landmark,           // Nearest landmark
                    $c->city,                       // City
                    $c->address      ,               // Address
                    //Family Formation Data
                    $c->family_members_count,// عدد أفراد الأسرة
                    $c->number_of_male,// عدد الذكور
                    $c->number_of_female, // عدد الإناث
                    $c->children_Under_5, // تحت 5 سنوات
                    $c->children_Under_2, // تحت 2 سنوات
                    $c->children_Under_3, // تحت 3 سنوات
                    $c->children_6_18, // 6-18 سنوات
                    $c->children_5_16, // 5-16 سنوات
                    $c->number_of_school_students, // عدد طلاب المدارس
                    $c->number_of_university_students, // عدد طلاب الجامعات
                    $c->number_of_infants, // عدد الأطفال الرضع
                    $c->number_of_people_with_disabilities, // عدد الأشخاص ذوي الإعاقة
                    $c->number_of_people_with_chronic_diseases, // عدد المصابين بالأمراض المزمنة
                    $c->number_of_elderly_people_over_60, // عدد المسنين فوق 60
                    $c->number_of_pregnant_women, // عدد النساء الحوامل
                    $c->number_of_breastfeeding_women, // عدد النساء المرضعات
                    $c->number_of_injured_due_to_war, // عدد الجرحى بسبب الحرب
                    $c->care_for_non_family_members, // رعاية أفراد غير الأسرة
                    $c->number_of_children_cared_for_not_in_family_under_18, // عدد الأطفال الذين يعتنى بهم ولكن ليسوا في الأسرة
                    $c->reason_of_care, // السبب
                    $c->lost_family_member_during_war, // فقدان أحد أفراد العائلة أثناء الحرب
                      //Urgent Needs
                    $c->urgent_basic_needs_for_family,
                    $c->secondary_needs_for_family,
                    $c->sources_of_family_income ,
                    $c->monthly_income_shekels,
                    $c->unable_to_use_land_or_properties_due_to_war,
                    $c->housing_ownership ,
                    $c->type_of_housing ,
                    $c->extent_of_housing_damage_due_to_war,
                    $c->displaced_due_to_war_and_changed_housing_location ,
                    $c->displaced_governorate,
                    $c->displaced_population_cluster ,
                    $c->displaced_street ,
                    $c->displaced_address,
                    $c->displaced_place_of_displacement ,
                    $c->housing_type ,
                    //Bank Data
                    $c->account_holder_name,
                    $c->bank_name_branch,
                    $c->account_holder_id_number,
                    $c->account_number,
                    $c->has_war_damage,
                    $c->damage_type ,
                    $c->agree_to_share_data_for_assistance,


                ];
        })->toArray();
       //dd($data);
        try {
            $googleSheet->saveDataToSheet($data);
           // dd("hi");
            // Mark exported
            \Log::info('before Updating exported_at for citizens: ');
            Citizen::whereIn('id', $citizens->pluck('id'))->update(['exported_at' => now()]);
            \Log::info('After Updating exported_at for citizens: ');

        } catch (\Throwable $e) {
            \Log::error("Google Sheet export failed: " . $e->getMessage());
        }
    }
}