<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{ 

    public function up()
    {
       Schema::create('citizens', function (Blueprint $table) {
      //Personal Data
       $table->id();
       $table->string('first_name')->default(''); // الاسم الأول#
       $table->string('second_name')->default(''); // الاسم الثاني#
       $table->string('third_name')->default(''); // الاسم الثالث#
       $table->string('family_name')->default(''); // اسم العائلة#
       $table->string('document')->default(''); //  الوثيقة#
       $table->string('identity_type')->default(''); // نوع الهوية     #
       $table->string('identity_number')->default(''); // رقم الهوية#
       $table->date('date_of_birth')->default('1970-01-01'); // تاريخ الميلاد#
       $table->enum('gender', ['male', 'female'])->default('male'); // الجنس#
       $table->string('marital_status')->default(''); // الحالة الاجتماعية#
       $table->string('spouse_first_name')->nullable(); // اسم الزوج الأول#
       $table->string('spouse_second_name')->nullable(); // اسم الزوج الثاني#
       $table->string('spouse_third_name')->nullable(); // اسم الزوج الثالث#
       $table->string('spouse_family_name')->nullable(); // اسم عائلة الزوج#
       $table->string('spouse_identity_type')->nullable(); // نوع هوية الزوج#
       $table->string('spouse_identity_number')->nullable(); // رقم هوية الزوج#
       $table->boolean('is_war_victim')->default(false); // هل المعيل مصاب حرب#
       $table->boolean('is_disabled')->default(false); // هل المعيل ذو إعاقة#
       $table->string('disability_type')->default(''); // نوع الإعاقة#
       $table->boolean('has_chronic_disease')->default(false); // هل لديه أمراض مزمنة#
       // end of personal data
        
        //Contact Data
        $table->string('phone_1')->default(''); // رقم الجوال1#
        $table->string('phone_2')->nullable(); // رقم الجوال2#
        $table->string('governorate')->default(''); // المحافظة الحالية#
        $table->string('city')->default(''); // المدينة#
        $table->string('housing_complex')->default(''); // التجمع السكاني#
        $table->string('neighborhood')->default(''); // الحي#
        $table->string('street')->default(''); // الشارع#
        $table->string('address')->default(''); // العنوان#
        $table->string('nearest_landmark')->default(''); // أقرب معلم#
        //End of Contact Data

        //Family Formation data
        $table->integer('family_members_count')->default(0); // عدد أفراد الأسرة#
        $table->integer('male_count')->default(0);//عدد الذكور
        $table->integer('female_count')->default(0);//عدد ألاناث
        $table->integer('children_under_2')->default(0); //under 2#
        $table->integer('children_under_3')->default(0); //under 3#
        $table->integer('children_under_5')->default(0); //under 5#
        $table->integer('children_aged_5_16_count')->default(0); //5-16#
        $table->integer('children_aged_6_18_count')->default(0); //6-18#
        $table->integer('number_of_school_students')->default(0); // عدد طلاب المدارس#
        $table->integer('number_of_university_students')->default(0); // عدد طلاب الجامعات#
        $table->integer('number_of_infants')->default(0); // عدد الأطفال الرضع#
        $table->integer('number_of_people_with_disabilities')->default(0); // عدد الأشخاص ذوي الإعاقة#
        $table->integer('number_of_people_with_chronic_diseases')->default(0); // عدد المصابين بالأمراض المزمنة#
        $table->integer('number_of_elderly_over_60')->default(0); //  عدد المسنين فوق 60  #
        $table->integer('number_of_pregnant_women')->default(0); // عدد النساء الحوامل#
        $table->integer('number_of_breastfeeding_women')->default(0); // عدد النساء المرضعات#
        $table->integer('number_of_injured_due_to_war')->default(0); // عدد الجرحى بسبب الحرب#
        $table->boolean('is_caring_for_non_family_members')->default(false); // رعاية أفراد غير الأسرة#
        $table->integer('number_of_children_cared_for_not_in_family_under_18')->nullable(); //# عدد الأطفال الذين يعتنى بهم ولكن ليسوا في الأسرة
        $table->string('reason_for_caring_for_children')->nullable()->default(null); // Allow null or set default value
        $table->boolean('is_family_member_lost_during_war')->default(false); //# فقدان أحد أفراد العائلة أثناء الحرب
        $table->json('relationship_to_family_members_lost_during_war')->nullable();
        // End of family formation data   
        //Housing data
        $table->string('housing_ownership')->default(''); // #ملكية السكن
        $table->string('type_of_housing')->default(''); // #نوع السكن
        $table->boolean('is_war_damage')->default(false); // هل يوجد أضرار حرب 2023
        $table->string('extent_of_housing_damage_due_to_war')->default(''); //# مدى الضرر الذي لحق بالسكن بسبب الحرب
        $table->boolean('is_displaced_due_to_war_and_changed_housing_location')->default(false); //# نزوح الأسرة بسبب الحرب وتغيير موقع السكن
        $table->string('displaced_governorate')->nullable(); //# المحافظة التي تم النزوح إليها
        $table->string('displaced_housing_complex')->nullable(); // #التجمع السكاني للنزوح
        $table->string('displaced_street')->nullable(); // #الشارع الذي تم النزوح إليه
        $table->string('displaced_address')->nullable(); // #عنوان النزوح
        $table->string('displaced_place_of_displacement')->nullable(); //# مكان النزوح
            //End of Housing
        // Needs
        $table->json('urgent_basic_needs_for_family')->default(''); // #الاحتياجات الأساسية العاجلة للأسرة
        $table->json('secondary_needs_for_family')->nullable(); // #الاحتياجات الثانوية للأسرة
        $table->json('sources_of_family_income')->nullable(); // #مصادر دخل الأسرة
        $table->integer('monthly_income_shekels', 10, 2)->default(0); //# الدخل الشهري بالشيكل
        $table->boolean('is_unable_to_use_land_or_properties_due_to_war')->default(false); //# عدم القدرة على استخدام الأراضي أو الممتلكات بسبب الحرب
        $table->boolean('has_bank_account')->default(false); //# هل يوجد حساب بنكي
        //End of Needs
        //Bank Information
        $table->string('account_holder_name')->nullable(); //# اسم صاحب الحساب
        $table->string('bank_name_branch')->nullable(); // #اسم الفرع البنكي
        $table->string('account_holder_id_number')->nullable(); // #رقم هوية صاحب الحساب
        $table->string('account_number')->nullable(); //# رقم الحساب البنكي
        
        $table->boolean('agree_to_share_data_for_assistance')->default(true); // #الموافقة على مشاركة البيانات للمساعدة
        $table->date('exported_at')->nullable()->default(null);
        $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('citizens');
    }
};
