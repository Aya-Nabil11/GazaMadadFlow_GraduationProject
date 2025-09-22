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
        $table->string('identity_type'); // نوع الهوية     #
        $table->string('identity_number'); // رقم الهوية#
        $table->string('first_name'); // الاسم الأول#
        $table->string('second_name'); // الاسم الثاني#
        $table->string('third_name'); // الاسم الثالث#
        $table->string('family_name'); // اسم العائلة#
        $table->enum('gender', ['male', 'female']); // الجنس#
        $table->date('birth_of_date'); // تاريخ الميلاد#
        $table->enum('marital_status', ['single', 'married', 'divorced', 'widowed']); // الحالة الاجتماعية#
        $table->string('spouse_id_number')->nullable(); // رقم هوية الزوج#
        $table->string('spouse_id_type')->nullable(); // نوع هوية الزوج#
        $table->string('spouse_first_name')->nullable(); // اسم الزوج الأول#
        $table->string('spouse_second_name')->nullable(); // اسم الزوج الثاني#
        $table->string('spouse_third_name')->nullable(); // اسم الزوج الثالث#
        $table->string('spouse_family_name')->nullable(); // اسم عائلة الزوج#
         $table->boolean('is_war_victim')->default(false); // هل المعيل مصاب حرب#
         $table->boolean('is_disabled')->default(false); // هل المعيل ذو إعاقة#
        $table->string('disability_type')->default('none'); // نوع الإعاقة#
        $table->boolean('has_chronic_diseases')->default(false); // هل لديه أمراض مزمنة#
        $table->enum('displaced_or_resident', ['displaced', 'resident'])->default('resident'); // نازح / مقيم
        // end of personal data
        

        //      //Contact Data
            $table->string('mobile_number1'); // رقم الجوال1#
            $table->string('mobile_number2')->nullable(); // رقم الجوال2#
            $table->string('original_governorate'); // المحافظة الأصلية#
            $table->string('current_governorate'); // المحافظة الحالية#
            $table->string('population_cluster'); // التجمع السكاني#
            $table->string('neighborhood'); // الحي#
            $table->string('street'); // الشارع#
            $table->string('nearest_landmark'); // أقرب معلم#
            $table->string('city'); // المدينة#
        $table->string('address'); // العنوان#
            
        //Family Formation data
        $table->integer('family_members_count'); // عدد أفراد الأسرة#
        $table->integer('number_of_male');//عدد الذكور
        $table->integer('number_of_female');//عدد ألاناث
        $table->integer('children_Under_5')->default(0); //under 5#
        $table->integer('children_Under_2')->default(0); //under 2#
        $table->integer('children_Under_3')->default(0); //under 3#
        $table->integer('children_6_18')->default(0); //6-18#
        $table->integer('children_5_16')->default(0); //5-16#
        $table->integer('number_of_school_students'); // عدد طلاب المدارس#
        $table->integer('number_of_university_students'); // عدد طلاب الجامعات#
        $table->integer('number_of_infants'); // عدد الأطفال الرضع#
        $table->integer('number_of_people_with_disabilities'); // عدد الأشخاص ذوي الإعاقة#
        $table->integer('number_of_people_with_chronic_diseases'); // عدد المصابين بالأمراض المزمنة#
         $table->integer('number_of_elderly_people_over_60'); //  عدد المسنين فوق 60  #
        $table->integer('number_of_pregnant_women'); // عدد النساء الحوامل#
        $table->integer('number_of_breastfeeding_women'); // عدد النساء المرضعات#
        $table->integer('number_of_injured_due_to_war'); // عدد الجرحى بسبب الحرب#
        $table->boolean('care_for_non_family_members'); // رعاية أفراد غير الأسرة#
        $table->integer('number_of_children_cared_for_not_in_family_under_18'); //# عدد الأطفال الذين يعتنى بهم ولكن ليسوا في الأسرة
    $table->string('reason_of_care')->nullable()->default(null); // Allow null or set default value
        $table->boolean('lost_family_member_during_war'); //# فقدان أحد أفراد العائلة أثناء الحرب

        // Needs
        $table->json('urgent_basic_needs_for_family'); // #الاحتياجات الأساسية العاجلة للأسرة
        $table->json('secondary_needs_for_family'); // #الاحتياجات الثانوية للأسرة
        $table->json('sources_of_family_income'); // #مصادر دخل الأسرة
        $table->decimal('monthly_income_shekels', 10, 2); //# الدخل الشهري بالشيكل
        $table->boolean('unable_to_use_land_or_properties_due_to_war'); //# عدم القدرة على استخدام الأراضي أو الممتلكات بسبب الحرب
        $table->string('housing_ownership'); // #ملكية السكن
        $table->string('type_of_housing'); // #نوع السكن
        $table->string('extent_of_housing_damage_due_to_war'); //# مدى الضرر الذي لحق بالسكن بسبب الحرب
        $table->boolean('displaced_due_to_war_and_changed_housing_location'); //# نزوح الأسرة بسبب الحرب وتغيير موقع السكن
        $table->string('displaced_governorate')->nullable(); //# المحافظة التي تم النزوح إليها
        $table->string('displaced_population_cluster')->nullable(); // #التجمع السكاني للنزوح
        $table->string('displaced_street')->nullable(); // #الشارع الذي تم النزوح إليه
        $table->string('displaced_address')->nullable(); // #عنوان النزوح
        $table->string('displaced_place_of_displacement')->nullable(); //# مكان النزوح
         $table->string('housing_type')->nullable(); // نوع السكن
//        //Bank Information
        $table->string('account_holder_name')->nullable(); //# اسم صاحب الحساب
        $table->string('bank_name_branch')->nullable(); // #اسم الفرع البنكي
        $table->string('account_holder_id_number')->nullable(); // #رقم هوية صاحب الحساب
        $table->string('account_number')->nullable(); //# رقم الحساب البنكي
        
        $table->boolean('has_war_damage')->default(false); // هل يوجد أضرار حرب 2023
        $table->string('damage_type')->nullable(); // نوع الضرر
        $table->boolean('agree_to_share_data_for_assistance'); // #الموافقة على مشاركة البيانات للمساعدة


$table->date('exported_at')->nullable()->default(null);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('citizens');
    }
};
