<!-- resources/views/user_data.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Data</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create User Data</h1>
        
        <!-- Form for displaying the user data -->
        <form action="{{ route('citizens.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="identity_type" class="form-label">Identity Type:</label>
                <input type="text" class="form-control" name="identity_type" id="identity_type" value="فلسطينية" required>
            </div>

            <div class="mb-3">
                <label for="identity_number" class="form-label">Identity Number:</label>
                <input type="text" class="form-control" name="identity_number" id="identity_number" value="123456789" required>
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name:</label>
                <input type="text" class="form-control" name="first_name" id="first_name" value="Aya" required>
            </div>

            <div class="mb-3">
                <label for="second_name" class="form-label">Second Name:</label>
                <input type="text" class="form-control" name="second_name" id="second_name" value="nabil" required>
            </div>

            <div class="mb-3">
                <label for="third_name" class="form-label">Third Name:</label>
                <input type="text" class="form-control" name="third_name" id="third_name" value="saleem" required>
            </div>

            <div class="mb-3">
                <label for="family_name" class="form-label">Family Name:</label>
                <input type="text" class="form-control" name="family_name" id="family_name" value="Alharazin" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="male" >Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="birth_of_date" class="form-label">Birth Date:</label>
                <input type="date" name="birth_of_date" id="birth_of_date" class="form-control" value="{{ old('birth_of_date') }}" required>
            </div>
   <div class="mb-3">
    <label for="marital_status" class="form-label">Marital Status:</label>
    <input type="text" name="marital_status" id="marital_status" class="form-control" value="Single">
</div>

<div class="mb-3">
    <label for="spouse_id_number" class="form-label">Spouse ID Number:</label>
    <input type="text" name="spouse_id_number" id="spouse_id_number" class="form-control">
</div>

<div class="mb-3">
    <label for="spouse_id_type" class="form-label">Spouse ID Type:</label>
    <input type="text" name="spouse_id_type" id="spouse_id_type" class="form-control">
</div>

<div class="mb-3">
    <label for="spouse_first_name" class="form-label">Spouse First Name:</label>
    <input type="text" name="spouse_first_name" id="spouse_first_name" class="form-control">
</div>

<div class="mb-3">
    <label for="spouse_second_name" class="form-label">Spouse Second Name:</label>
    <input type="text" name="spouse_second_name" id="spouse_second_name" class="form-control">
</div>

<div class="mb-3">
    <label for="spouse_third_name" class="form-label">Spouse Third Name:</label>
    <input type="text" name="spouse_third_name" id="spouse_third_name" class="form-control">
</div>

<div class="mb-3">
    <label for="spouse_family_name" class="form-label">Spouse Family Name:</label>
    <input type="text" name="spouse_family_name" id="spouse_family_name" class="form-control">
</div>

<div class="mb-3">
    <label for="is_war_victim" class="form-label">Is War Victim:</label>
    <select name="is_war_victim" id="is_war_victim" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

<div class="mb-3">
    <label for="is_disabled" class="form-label">Is Disabled:</label>
    <select name="is_disabled" id="is_disabled" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

<div class="mb-3">
    <label for="disability_type" class="form-label">Disability Type:</label>
    <input type="text" name="disability_type" id="disability_type" class="form-control">
</div>

<div class="mb-3">
    <label for="has_chronic_diseases" class="form-label">Has Chronic Diseases:</label>
    <select name="has_chronic_diseases" id="has_chronic_diseases" class="form-select">
        <option value="1" selected>Yes</option>
        <option value="0">No</option>
    </select>
</div>

<div class="mb-3">
    <label for="displaced_or_resident" class="form-label">Displaced or Resident:</label>
    <select name="displaced_or_resident" id="displaced_or_resident" class="form-select">
        <option value="displaced">Displaced</option>
        <option value="resident">Resident</option>
    </select>
</div>

<div class="mb-3">
    <label for="mobile_number1" class="form-label">Mobile Number 1:</label>
    <input type="text" name="mobile_number1" id="mobile_number1" class="form-control" value="123456789">
</div>

<div class="mb-3">
    <label for="mobile_number2" class="form-label">Mobile Number 2 (optional):</label>
    <input type="text" name="mobile_number2" id="mobile_number2" class="form-control">
</div>

<div class="mb-3">
    <label for="original_governorate" class="form-label">Original Governorate:</label>
    <input type="text" name="original_governorate" id="original_governorate" class="form-control" value="غزة">
</div>

<div class="mb-3">
    <label for="current_governorate" class="form-label">Current Governorate:</label>
    <input type="text" name="current_governorate" id="current_governorate" class="form-control" value="غزة">
</div>

<div class="mb-3">
    <label for="population_cluster" class="form-label">Population Cluster:</label>
    <input type="text" name="population_cluster" id="population_cluster" class="form-control" value="غزة">
</div>

<div class="mb-3">
    <label for="neighborhood" class="form-label">Neighborhood:</label>
    <input type="text" name="neighborhood" id="neighborhood" class="form-control" value="غزة">
</div>

<div class="mb-3">
    <label for="street" class="form-label">Street:</label>
    <input type="text" name="street" id="street" class="form-control" value="الرمال">
</div>

<div class="mb-3">
    <label for="nearest_landmark" class="form-label">Nearest Landmark:</label>
    <input type="text" name="nearest_landmark" id="nearest_landmark" class="form-control" value="الرمال">
</div>

<div class="mb-3">
    <label for="city" class="form-label">City:</label>
    <input type="text" name="city" id="city" class="form-control" value="غزة">
</div>

<div class="mb-3">
    <label for="address" class="form-label">Address:</label>
    <input type="text" name="address" id="address" class="form-control" value="غزة">
</div>

<div class="mb-3">
    <label for="family_members_count" class="form-label">Family Members Count:</label>
    <input type="number" name="family_members_count" id="family_members_count" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_male" class="form-label">Number of Males:</label>
    <input type="number" name="number_of_male" id="number_of_male" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_female" class="form-label">Number of Females:</label>
    <input type="number" name="number_of_female" id="number_of_female" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="children_under_5" class="form-label">Children Under 5:</label>
    <input type="number" name="children_under_5" id="children_under_5" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="children_under_2" class="form-label">Children Under 2:</label>
    <input type="number" name="children_under_2" id="children_under_2" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="children_under_3" class="form-label">Children Under 3:</label>
    <input type="number" name="children_under_3" id="children_under_3" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="children_6_18" class="form-label">Children 6-18:</label>
    <input type="number" name="children_6_18" id="children_6_18" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="children_5_16" class="form-label">Children 5-16:</label>
    <input type="number" name="children_5_16" id="children_5_16" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_school_students" class="form-label">Number of School Students:</label>
    <input type="number" name="number_of_school_students" id="number_of_school_students" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_university_students" class="form-label">Number of University Students:</label>
    <input type="number" name="number_of_university_students" id="number_of_university_students" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_infants" class="form-label">Number of Infants:</label>
    <input type="number" name="number_of_infants" id="number_of_infants" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_people_with_disabilities" class="form-label">Number of People with Disabilities:</label>
    <input type="number" name="number_of_people_with_disabilities" id="number_of_people_with_disabilities" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_people_with_chronic_diseases" class="form-label">Number of People with Chronic Diseases:</label>
    <input type="number" name="number_of_people_with_chronic_diseases" id="number_of_people_with_chronic_diseases" class="form-control" value="1">
</div>
 <div class="mb-3">
    <label for="number_of_elderly_people_over_60" class="form-label">Number of Elderly People Over 60:</label>
    <input type="number" name="number_of_elderly_people_over_60" id="number_of_elderly_people_over_60" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_pregnant_women" class="form-label">Number of Pregnant Women:</label>
    <input type="number" name="number_of_pregnant_women" id="number_of_pregnant_women" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_breastfeeding_women" class="form-label">Number of Breastfeeding Women:</label>
    <input type="number" name="number_of_breastfeeding_women" id="number_of_breastfeeding_women" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="number_of_injured_due_to_war" class="form-label">Number of Injured Due to War:</label>
    <input type="number" name="number_of_injured_due_to_war" id="number_of_injured_due_to_war" class="form-control" value="1">
</div>

<div class="mb-3">
    <label for="care_for_non_family_members" class="form-label">Care for Non-Family Members:</label>
    <select name="care_for_non_family_members" id="care_for_non_family_members" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

<div class="mb-3">
    <label for="number_of_children_cared_for_not_in_family_under_18" class="form-label">Number of Children Cared for Not in Family (Under 18):</label>
    <input type="number" name="number_of_children_cared_for_not_in_family_under_18" id="number_of_children_cared_for_not_in_family_under_18" class="form-control" value="0">
</div>

<div class="mb-3">
    <label for="reason_of_care" class="form-label">Reason of Care:</label>
    <input type="text" name="reason_of_care" id="reason_of_care" class="form-control" value="hi">
</div>

<div class="mb-3">
    <label for="lost_family_member_during_war" class="form-label">Lost Family Member During War:</label>
    <select name="lost_family_member_during_war" id="lost_family_member_during_war" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

<!-- Urgent Needs -->
<div class="mb-3">
    <label for="urgent_basic_needs_for_family" class="form-label">Select Displaced Needs:</label>
    <select name="urgent_basic_needs_for_family[]" id="displaced_needs" class="form-select" multiple>
        <option value="housing">Housing</option>
        <option value="healthcare">Healthcare</option>
        <option value="education">Education</option>
        <option value="job_support">Job Support</option>
        <option value="food_supply">Food Supply</option>
    </select>
</div>

<div class="mb-3">
    <label for="secondary_needs_for_family" class="form-label">Secondary Needs for Family:</label>
    <select name="secondary_needs_for_family[]" id="secondary_needs_for_family" class="form-select" multiple>
        <option value="food">Food</option>
        <option value="shelter">Shelter</option>
        <option value="education">Education</option>
        <option value="healthcare">Healthcare</option>
        <option value="clothing">Clothing</option>
    </select>
</div>

<div class="mb-3">
    <label for="sources_of_family_income" class="form-label">Sources of Family Income:</label>
    <select name="sources_of_family_income[]" id="sources_of_family_income" class="form-select" multiple>
        <option value="salary">Salary</option>
        <option value="business">Business</option>
        <option value="investments">Investments</option>
        <option value="government_aid">Government Aid</option>
        <option value="pension">Pension</option>
        <option value="freelance">Freelance</option>
    </select>
</div>

<div class="mb-3">
    <label for="monthly_income_shekels" class="form-label">Monthly Income (Shekels):</label>
    <input type="number" name="monthly_income_shekels" id="monthly_income_shekels" class="form-control" step="0.01" value="0">
</div>

<div class="mb-3">
    <label for="unable_to_use_land_or_properties_due_to_war" class="form-label">Unable to Use Land or Properties Due to War:</label>
    <select name="unable_to_use_land_or_properties_due_to_war" id="unable_to_use_land_or_properties_due_to_war" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>
   <div class="mb-3">
    <label for="housing_ownership" class="form-label">Housing Ownership:</label>
    <input type="text" name="housing_ownership" id="housing_ownership" class="form-control" value="hi">
</div>

<div class="mb-3">
    <label for="type_of_housing" class="form-label">Type of Housing:</label>
    <input type="text" name="type_of_housing" id="type_of_housing" class="form-control" value="hi">
</div>

<div class="mb-3">
    <label for="extent_of_housing_damage_due_to_war" class="form-label">Extent of Housing Damage Due to War:</label>
    <input type="text" name="extent_of_housing_damage_due_to_war" id="extent_of_housing_damage_due_to_war" class="form-control" value="Hi">
</div>

<div class="mb-3">
    <label for="displaced_due_to_war_and_changed_housing_location" class="form-label">Displaced Due to War and Changed Housing Location:</label>
    <select name="displaced_due_to_war_and_changed_housing_location" id="displaced_due_to_war_and_changed_housing_location" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

<div class="mb-3">
    <label for="displaced_governorate" class="form-label">Displaced Governorate:</label>
    <input type="text" name="displaced_governorate" id="displaced_governorate" class="form-control" value="Hi">
</div>
  <div class="mb-3">
    <label for="displaced_population_cluster" class="form-label">Displaced Population Cluster:</label>
    <input type="text" name="displaced_population_cluster" id="displaced_population_cluster" class="form-control" value="Hi">
</div>

<div class="mb-3">
    <label for="displaced_street" class="form-label">Displaced Street:</label>
    <input type="text" name="displaced_street" id="displaced_street" class="form-control" value="Hi">
</div>

<div class="mb-3">
    <label for="displaced_address" class="form-label">Displaced Address:</label>
    <input type="text" name="displaced_address" id="displaced_address" class="form-control" value="Hi">
</div>

<div class="mb-3">
    <label for="displaced_place_of_displacement" class="form-label">Displaced Place of Displacement:</label>
    <input type="text" name="displaced_place_of_displacement" id="displaced_place_of_displacement" class="form-control" value="Hi">
</div>

<div class="mb-3">
    <label for="housing_type" class="form-label">Housing Type:</label>
    <input type="text" name="housing_type" id="housing_type" class="form-control" value="Hi">
</div>
   <div class="mb-3">
    <label for="account_holder_name" class="form-label">Account Holder Name:</label>
    <input type="text" name="account_holder_name" id="account_holder_name" class="form-control" value="aya">
</div>

<div class="mb-3">
    <label for="bank_name_branch" class="form-label">Bank Name and Branch:</label>
    <input type="text" name="bank_name_branch" id="bank_name_branch" class="form-control" value="palestine">
</div>

<div class="mb-3">
    <label for="account_holder_id_number" class="form-label">Account Holder ID Number:</label>
    <input type="text" name="account_holder_id_number" id="account_holder_id_number" class="form-control" value="123456789">
</div>

<div class="mb-3">
    <label for="account_number" class="form-label">Account Number:</label>
    <input type="text" name="account_number" id="account_number" class="form-control" value="123456789">
</div> <div class="mb-3">
    <label for="has_war_damage" class="form-label">Has War Damage:</label>
    <select name="has_war_damage" id="has_war_damage" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

<div class="mb-3">
    <label for="damage_type" class="form-label">Damage Type:</label>
    <input type="text" name="damage_type" id="damage_type" class="form-control" value="sss">
</div>

<div class="mb-3">
    <label for="agree_to_share_data_for_assistance" class="form-label">Agree to Share Data for Assistance:</label>
    <select name="agree_to_share_data_for_assistance" id="agree_to_share_data_for_assistance" class="form-select">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
