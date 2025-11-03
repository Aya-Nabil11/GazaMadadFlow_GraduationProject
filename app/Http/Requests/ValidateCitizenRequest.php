<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateCitizenRequest extends FormRequest
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
        //    dd($this->all());

     return [
        // Personal data
        'first_name'      => ['required', 'string', 'max:255'],
        'second_name'     => ['required', 'string', 'max:255'],
        'third_name'      => ['required', 'string', 'max:255'],
        'family_name'     => ['required', 'string', 'max:255'],
        'document'        => ['required', 'string', 'max:255'],
        'identity_type'   => ['required', 'string', 'max:100'],
        'identity_number' => ['required','digits:9',
                Rule::unique('citizens', 'identity_number'),
                function ($attribute, $value, $fail) {
                    $exists = \DB::table('citizens')
                        ->where('spouse_identity_number', $value)
                        ->exists();
                    if ($exists) {
                        $fail('رقم هوية المعيل مستخدم بالفعل كهوية الزوج/ة.');
                    }
                },],
        'date_of_birth'   => ['required', 'date'],
        'gender'          => ['required', 'in:male,female'],
        'marital_status'  => ['required', 'string', 'max:100'],

        // Spouse info only required if married
        'spouse_first_name'       => ['nullable', 'string', 'max:255'],
        'spouse_second_name'      => ['nullable', 'string', 'max:255'],
        'spouse_third_name'       => ['nullable', 'string', 'max:255'],
        'spouse_family_name'      => ['nullable', 'string', 'max:255'],
        'spouse_identity_type'    => ['nullable', 'string', 'max:100'],
        'spouse_identity_number' => ['nullable','digits:9',
                Rule::unique('citizens', 'spouse_identity_number'),
                function ($attribute, $value, $fail) {
                    $exists = \DB::table('citizens')
                        ->where('identity_number', $value)
                        ->exists();
                    if ($exists) {
                        $fail('رقم هوية الزوجة مستخدم بالفعل كرقم هوية');
                    }
                },],
        'is_war_victim'           => ['boolean'],
        'is_disabled'             => ['boolean'],
        'disability_type'         => ['string', 'max:255'],
        'has_chronic_disease'     => ['boolean'],
        // Contact information
        'phone_1'           => ['required', 'regex:/^(059|056)[0-9]{7}$/'],
        'phone_2'           => ['nullable', 'regex:/^(059|056)[0-9]{7}$/'],
        'governorate'       => ['required', 'string', 'max:100'], // Current governorate
        'city'              => ['required', 'string', 'max:100'], // Current city
        'housing_complex'   => ['required', 'string', 'max:255'], // Housing complex
        'neighborhood'      => ['required', 'string', 'max:255'], // Neighborhood
        'street'            => ['required', 'string', 'max:255'], // Street
        'address'           => ['required', 'string', 'max:500'], // Full address
        'nearest_landmark'  => ['required', 'string', 'max:255'], // Nearest landmark
        //Family Formation
        'family_members_count'                           => ['required', 'integer', 'min:0'],
        'male_count'                                     => ['required', 'integer', 'min:0'],
        'female_count'                                   => ['required', 'integer', 'min:0'],
        'children_under_2'                               => ['required', 'integer', 'min:0'],
        'children_under_3'                               => ['required', 'integer', 'min:0'],
        'children_under_5'                               => ['required', 'integer', 'min:0'],
        'children_aged_5_16_count'                       => ['required', 'integer', 'min:0'],
        'children_aged_6_18_count'                       => ['required', 'integer', 'min:0'],
        'number_of_school_students'                      => ['required', 'integer', 'min:0'],
        'number_of_university_students'                  => ['required', 'integer', 'min:0'],
        'number_of_infants'                              => ['required', 'integer', 'min:0'],
        'number_of_people_with_disabilities'            => ['required', 'integer', 'min:0'],
        'number_of_people_with_chronic_diseases'        => ['required', 'integer', 'min:0'],
        'number_of_elderly_over_60'                     => ['required', 'integer', 'min:0'],
        'number_of_pregnant_women'                       => ['required', 'integer', 'min:0'],
        'number_of_breastfeeding_women'                 => ['required', 'integer', 'min:0'],
        'number_of_injured_due_to_war'                  => ['required', 'integer', 'min:0'],
        'is_caring_for_non_family_members'              => ['required', 'boolean'],
        'number_of_children_cared_for_not_in_family_under_18' => ['nullable', 'integer', 'min:0'],
        'reason_for_caring_for_children'                => ['nullable', 'string', 'max:255'],
        'is_family_member_lost_during_war'              => ['required', 'boolean'],
        'relationship_to_family_members_lost_during_war' => ['nullable'],
        
    // Housing & displacement
        'housing_ownership'                              => ['required', 'string', 'max:100'],
        'type_of_housing'                                => ['required', 'string', 'max:100'],
        'is_war_damage'                                  => ['boolean'],
        'extent_of_housing_damage_due_to_war'           => ['required', 'string', 'max:255'],
        'is_displaced_due_to_war_and_changed_housing_location' => ['boolean'],
        'displaced_governorate'                          => ['nullable', 'string', 'max:100'],
        'displaced_housing_complex'                      => ['nullable', 'string', 'max:100'],
        'displaced_street'                               => ['nullable', 'string', 'max:100'],
        'displaced_address'                              => ['nullable', 'string', 'max:255'],
        'displaced_place_of_displacement'               => ['nullable', 'string', 'max:100'],
    // Family needs & income
        'urgent_basic_needs_for_family'                  => ['required'],
        'secondary_needs_for_family'                     => ['nullable'],
        'sources_of_family_income'                       => ['nullable'],
        'monthly_income_shekels'                         => ['required', 'numeric', 'min:0'],
        'is_unable_to_use_land_or_properties_due_to_war'=> ['boolean'],
        'has_bank_account'                               => ['boolean'],
    // Bank details
        'account_holder_name'             => ['nullable', 'string', 'max:150'],
        'bank_name_branch'                => ['nullable', 'string', 'max:150'],
        'account_holder_id_number'        => ['nullable', 'digits:9'],
        'account_number'                  => ['nullable', 'string', 'max:50'],

    // Consent
        'agree_to_share_data_for_assistance' => ['required', 'boolean'],
        ];
    }
 


    public function prepareForValidation(){
        if ($this->has('relationship_to_family_members_lost_during_war')) {
            $this->merge([
                'relationship_to_family_members_lost_during_war' => json_encode($this->input('relationship_to_family_members_lost_during_war'))
            ]);
        }

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



public function messages()
{
    return [
        'first_name.max'      => 'الاسم الأول لا يمكن أن يزيد عن 255 حرفًا',
        //-------------------------------
        'second_name.max'      => 'الاسم الثاني لا يمكن أن يزيد عن 255 حرفًا',
        //-------------------------------
        'third_name.max'      => 'الاسم الثالث لا يمكن أن يزيد عن 255 حرفًا',
        //-------------------------------
        'family_name.max'      => 'اسم العائلة لا يمكن أن يزيد عن 255 حرفًا',
        //-------------------------------
        'identity_number.digits'   => 'رقم الهوية يجب أن يتكون من 9 أرقام',
        'identity_number.unique'   => 'رقم هوية المعيل مستخدم مسبقًا',
        //-------------------------------
        'spouse_first_name.string' => 'الاسم الأول للزوج/ة يجب أن يكون نصًا',
        'spouse_first_name.max'    => 'الاسم الأول للزوج/ة لا يمكن أن يزيد عن 255 حرفًا',
        //-------------------------------
        'spouse_second_name.max'    => 'الاسم الثاني للزوج/ة لا يمكن أن يزيد عن 255 حرفًا',
        //-------------------------------
        'spouse_third_name.max'    => 'الاسم الثالث للزوج/ة لا يمكن أن يزيد عن 255 حرفًا',
        //-------------------------------
        'spouse_family_name.max'    => 'اسم العائلة للزوج/ة لا يمكن أن يزيد عن 255 حرفًا',
        //-------------------------------
        'spouse_identity_number.digits' => 'رقم الهوية للزوج/ة يجب أن يتكون من 9 أرقام',
        'spouse_identity_number.unique' => 'رقم هوية الزوج/ة مستخدم مسبقًا',
        // Contact information
        'phone_1.regex' => 'رقم الهاتف الأول غير صالح، يجب أن يبدأ بـ 059 أو 056 ويتكون من 9 أرقام',
        'phone_2.regex' => 'رقم الهاتف الثاني غير صالح، يجب أن يبدأ بـ 059 أو 056 ويتكون من 9 أرقام',
        'neighborhood.max'          => 'اسم الحي طويل جدًا',
        'street.max'                => 'اسم الشارع طويل جدًا',
        'address.max'               => 'العنوان طويل جدًا',
        // Family Formation
        'family_members_count.min'                           => 'عدد أفراد الأسرة يجب أن يكون صفر أو أكثر',
        'male_count.min'                                     => 'عدد الذكور يجب أن يكون صفر أو أكثر',
        'female_count.min'                                   => 'عدد الإناث يجب أن يكون صفر أو أكثر',
        'children_under_2.min'                               => 'عدد الأطفال أقل من سنتين يجب أن يكون 0 أو أكثر.',
        'children_under_3.min'                               => 'عدد الاطفال اقل من ثلاث سنوات يجب أن يكون صفر أو أكثر',
        'children_under_5.min'                               => 'عدد الاطفال اقل من خمسة سنوات يجب أن يكون صفر أو أكثر',
        'children_aged_5_16_count.min'                      => 'عدد الاطفال ما بين ال 5 الى 16 سنة يجب أن يكون صفر أو أكثر',
        'children_aged_6_18_count.min'                      => 'عدد الاطفال ما بين 6 الى 18 يجب أن يكون صفر أو أكثر',
        'number_of_school_students.min'                     => 'عدد طلاب المدارس يجب أن يكون صفر أو أكثر',
        'number_of_university_students.min'                 => 'عدد طلاب الجامعات يجب أن يكون صفر أو أكثر',
        'number_of_infants.min'                             => 'عدد الاطفال الرضع يجب أن يكون صفر أو أكثر',
        'number_of_people_with_disabilities.min'           => 'عدد الاشخاص ذوي الاعاقة يجب أن يكون صفر أو أكثر',
        'number_of_people_with_chronic_diseases.min'       => 'عددالمصابين بالأمراض المزمنة يجب أن يكون صفر أو أكثر',
        'number_of_elderly_over_60.min'                    => 'عدد المسنين فوق 60 سنة يجب أن يكون صفر أو أكثر',
        'number_of_pregnant_women.min'                     => 'عدد النساء الحوامل يجب أن يكون صفر أو أكثر',
        'number_of_breastfeeding_women.min'                => 'عدد النساء المرضعات يجب أن يكون صفر أو أكثر',
        'number_of_injured_due_to_war.min'                 => 'عدد الجرحى بسبب الحرب يجب أن يكون صفر أو أكثر',
        'number_of_children_cared_for_not_in_family_under_18.min'     => 'عدد الاطفال الذين يتم رعايتهم تحت سن 18 سنة يجب أن يكون صفر أو أكثر',
        // Housing & displacement
        'displaced_housing_complex.max'                    => 'طول القيمة أكبر من 100 حرف',
        'displaced_street.max'                             => 'طول القيمة أكبر من 100 حرف',
        'displaced_address.max'                            => 'طول القيمة أكبر من 255 حرف',
        // Family needs & income
        'monthly_income_shekels.min'                      => 'الدخل الشهري (شيكل) يجب أن يكون صفر أو أكثر',
        // Bank details
        'account_holder_name.max'        => 'اسم صاحب الحساب البنكي طويل جدًا',
        'bank_name_branch.max'           => 'اسم البنك/الفرع طويل جدًا',
        'account_holder_id_number.digits' => 'رقم هوية صاحب الحساب البنكي يجب أن يكون 9 أرقام',
    ];
}




}
