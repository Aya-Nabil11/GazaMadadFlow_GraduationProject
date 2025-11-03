<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            // Personal Data
            $table->id();
            $table->string('first_name')->default('');
            $table->string('second_name')->default('');
            $table->string('third_name')->default('');
            $table->string('family_name')->default('');
            $table->string('document')->default('');
            $table->string('identity_type')->default('');
            $table->string('identity_number')->default('');
            $table->date('date_of_birth')->default('1970-01-01');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('marital_status')->default('');
            $table->string('spouse_first_name')->nullable();
            $table->string('spouse_second_name')->nullable();
            $table->string('spouse_third_name')->nullable();
            $table->string('spouse_family_name')->nullable();
            $table->string('spouse_identity_type')->nullable();
            $table->string('spouse_identity_number')->nullable();
            $table->boolean('is_war_victim')->default(false);
            $table->boolean('is_disabled')->default(false);
            $table->string('disability_type')->default('');
            $table->boolean('has_chronic_disease')->default(false);

            // Contact Data
            $table->string('phone_1')->default('');
            $table->string('phone_2')->nullable();
            $table->string('governorate')->default('');
            $table->string('city')->default('');
            $table->string('housing_complex')->default('');
            $table->string('neighborhood')->default('');
            $table->string('street')->default('');
            $table->string('address')->default('');
            $table->string('nearest_landmark')->default('');

            // Family Formation Data
            $table->integer('family_members_count')->default(0);
            $table->integer('male_count')->default(0);
            $table->integer('female_count')->default(0);
            $table->integer('children_under_2')->default(0);
            $table->integer('children_under_3')->default(0);
            $table->integer('children_under_5')->default(0);
            $table->integer('children_aged_5_16_count')->default(0);
            $table->integer('children_aged_6_18_count')->default(0);
            $table->integer('number_of_school_students')->default(0);
            $table->integer('number_of_university_students')->default(0);
            $table->integer('number_of_infants')->default(0);
            $table->integer('number_of_people_with_disabilities')->default(0);
            $table->integer('number_of_people_with_chronic_diseases')->default(0);
            $table->integer('number_of_elderly_over_60')->default(0);
            $table->integer('number_of_pregnant_women')->default(0);
            $table->integer('number_of_breastfeeding_women')->default(0);
            $table->integer('number_of_injured_due_to_war')->default(0);
            $table->boolean('is_caring_for_non_family_members')->default(false);
            $table->integer('number_of_children_cared_for_not_in_family_under_18')->nullable();
            $table->string('reason_for_caring_for_children')->nullable();
            $table->boolean('is_family_member_lost_during_war')->default(false);
            $table->json('relationship_to_family_members_lost_during_war')->nullable();

            // Housing Data
            $table->string('housing_ownership')->default('');
            $table->string('type_of_housing')->default('');
            $table->boolean('is_war_damage')->default(false);
            $table->string('extent_of_housing_damage_due_to_war')->default('');
            $table->boolean('is_displaced_due_to_war_and_changed_housing_location')->default(false);
            $table->string('displaced_governorate')->nullable();
            $table->string('displaced_housing_complex')->nullable();
            $table->string('displaced_street')->nullable();
            $table->string('displaced_address')->nullable();
            $table->string('displaced_place_of_displacement')->nullable();

            // Needs
            $table->json('urgent_basic_needs_for_family')->nullable(); // JSON cannot have default
            $table->json('secondary_needs_for_family')->nullable();
            $table->json('sources_of_family_income')->nullable();
            $table->double('monthly_income_shekels', 10, 2)->default(0);
            $table->boolean('is_unable_to_use_land_or_properties_due_to_war')->default(false);
            $table->boolean('has_bank_account')->default(false);

            // Bank Information
            $table->string('account_holder_name')->nullable();
            $table->string('bank_name_branch')->nullable();
            $table->string('account_holder_id_number')->nullable();
            $table->string('account_number')->nullable();

            $table->boolean('agree_to_share_data_for_assistance')->default(true);
            $table->date('exported_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citizens');
    }
};
