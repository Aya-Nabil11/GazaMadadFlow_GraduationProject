<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gaza Madad Flow</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon_2.png')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400..800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-gray-50">
    <!-- Landing Page -->
    <div id="landing-page" class="min-h-screen relative overflow-hidden">
      <!-- Floating Background Shapes -->
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>
      <div class="floating-shape"></div>

      <!-- Header -->
      <header class="relative z-10 p-6">
        <div class="container mx-auto flex justify-between items-center">
          <div class="flex items-center space-x-4">
            <img src="{{asset('images//logo_2.png')}}" alt="logo" class="size-24" />
          </div>

        </div>
      </header>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <!-- Hero Section -->
      <section class="relative z-10 container mx-auto px-6 py-20 text-center">
        <h1
          class="text-2xl md:text-2xl font-bold text-gray-800 mb-6 leading-tight"
        >
          سجّل بياناتك مرة واحدة مع<br />
          <span
            class="text-5xl md:text-7xl bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent"
            >Gaza Madad Flow</span
          >
        </h1>
        <p class="text-xl text-gray-600 mb-12 max-w-2xl mx-auto">
          منصة موحدة وآمنة لتسجيل بيانات المستفيدين من المساعدات الإنسانية في
          غزة
        </p>
        <button
          onclick="startRegistration()"
          class="btn-primary text-white px-12 py-4 rounded-full text-xl font-semibold shadow-lg"
        >
          ابدأ التسجيل الآن
        </button>
      </section>

      <!-- Features Section -->
      <section class="relative z-10 container mx-auto px-6 py-20">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-16">
          مميزات المنصة
        </h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div
            class="feature-card bg-white p-8 rounded-2xl shadow-lg text-center"
          >
            <div
              class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6"
            >
              <svg
                class="w-8 h-8 text-white"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">
              تسجيل مرة واحدة
            </h3>
            <p class="text-gray-600">
              سجل بياناتك مرة واحدة واستفد من جميع الخدمات
            </p>
          </div>

          <div
            class="feature-card bg-white p-8 rounded-2xl shadow-lg text-center"
          >
            <div
              class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6"
            >
              <svg
                class="w-8 h-8 text-white"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">
              أمان البيانات
            </h3>
            <p class="text-gray-600">حماية كاملة لبياناتك الشخصية والحساسة</p>
          </div>

          <div
            class="feature-card bg-white p-8 rounded-2xl shadow-lg text-center"
          >
            <div
              class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6"
            >
              <svg
                class="w-8 h-8 text-white"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"
                />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">خدمة شاملة</h3>
            <p class="text-gray-600">تغطية جميع أفراد الأسرة والاحتياجات</p>
          </div>

          <div
            class="feature-card bg-white p-8 rounded-2xl shadow-lg text-center"
          >
            <div
              class="w-16 h-16 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6"
            >
              <svg
                class="w-8 h-8 text-white"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                />
              </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-4">
              سهولة الاستخدام
            </h3>
            <p class="text-gray-600">واجهة بسيطة وسهلة للجميع</p>
          </div>
        </div>
      </section>
    </div>

    <!-- Registration Form -->
    <div id="registration-form" class="min-h-screen bg-gray-50 hidden">
      <div class="container mx-auto px-6 py-8">
        <div class="flex items-center justify-between">
          <div class="flex items-center space-x-4">
            <img src="./images//logo_2.png" alt="logo" class="size-24" />
          </div>
          <div class="flex items-center space-x-4">
            <h1
              class="text-2xl bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent font-bold"
            >
              Gaza Madad Flow
            </h1>
          </div>
        </div>
        <div class="max-w-6xl mx-auto">
          <!-- Header -->
          <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">
              تسجيل البيانات
            </h1>
            <p class="text-gray-600">يرجى ملء جميع الحقول المطلوبة بدقة</p>
          </div>

          <div class="flex flex-col lg:flex-row gap-8">
            <!-- Steps Sidebar -->
            <div class="lg:w-1/4">
              <div class="bg-white rounded-2xl p-6 shadow-lg sticky top-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-6">
                  خطوات التسجيل
                </h3>
                <div class="space-y-6">
                  <div class="step-wrapper flex items-center space-x-4 space-x-reverse">
                    <div class="step-circle active" id="step-circle-1">1</div>
                    <div class="text-sm font-medium text-gray-700">
                      البيانات الشخصية
                    </div>
                  </div>

                  <div class="step-wrapper flex items-center space-x-4 space-x-reverse">
                    <div class="step-circle" id="step-circle-2">2</div>
                    <div class="text-sm font-medium text-gray-700">
                      معلومات التواصل
                    </div>
                  </div>

                  <div class="step-wrapper flex items-center space-x-4 space-x-reverse">
                    <div class="step-circle" id="step-circle-3">3</div>
                    <div class="text-sm font-medium text-gray-700">
                      بيانات الأسرة
                    </div>
                  </div>

                  <div class="step-wrapper flex items-center space-x-4 space-x-reverse">
                    <div class="step-circle" id="step-circle-4">4</div>
                    <div class="text-sm font-medium text-gray-700">
                      بيانات المسكن
                    </div>
                  </div>

                  <div class="step-wrapper flex items-center space-x-4 space-x-reverse">
                    <div class="step-circle" id="step-circle-5">5</div>
                    <div class="text-sm font-medium text-gray-700">
                      احتياجات الأسرة
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Form Content -->
            <form class="lg:w-3/4" method="POST" action="{{route('citizens.store')}}">
              @csrf
              <div class="bg-white rounded-2xl p-8 shadow-lg">
                <!-- Step 1: البيانات الشخصية (معلومات رب الأسرة) -->
                <div class="form-slide active" id="step-1">
                  <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    البيانات الشخصية
                  </h2>
                  <div class="grid md:grid-cols-2 gap-6">
                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="first_name"
                        >الاسم الأول<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الاسم الأول"
                        name="first_name"
                        id="first_name"
                        required
                      />

                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="second_name"
                        >اسم الأب<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الاسم الأب"
                        name="second_name"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="third_name"
                        >اسم الجد<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الاسم الجد"
                        name="third_name"
                        id="third_name"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="family_name"
                        >اسم العائلة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل اسم العائلة"
                        name="family_name"
                        id="family_name"
                        required
                      />
                    </div>
                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="document"
                        >الوثيقة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="document"
                        id="document"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="هوية فلسطينية">هوية فلسطينية</option>
                        <option value="جواز سفر">جواز سفر</option>
                        <option value=" وثيقة أردنية">وثيقة أردنية</option>
                        <option value=" أخرى">أخرى</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="identity_type"
                        >نوع الهوية<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="identity_type"
                        id="identity_type"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="فلسطينية">فلسطينية</option>
                        <option value="اردنية">اردنية</option>
                        <option value="اسرائيلية">اسرائيلية</option>
                        <option value="مصرية">مصرية</option>
                        <option value="تصريح اقامة">تصريح اقامة</option>
                        <option value="وثيقة أخرى">وثيقة أخرى</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="identity_number"
                        >رقم الهوية<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل رقم الهوية"
                        name="identity_number"
                        id="identity_number"
                        required
                      />
                    </div>
                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="date_of_birth"
                        >تاريخ الميلاد<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="date"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="date_of_birth"
                        id="date_of_birth"
                        required
                      />
                    </div>
                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="gender"
                        >الجنس<span class="text-red-500 text-lg">*</span></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="gender"
                        id="gender"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="male">ذكر</option>
                        <option value="female">انثى</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="marital_status"
                        >الحالة الاجتماعية<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="marital_status"
                        id="marital_status"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="أعزب">أعزب</option>
                        <option value="متزوج">متزوج</option>
                        <option value="مطلق">مطلق</option>
                        <option value="أرمل">أرمل</option>
                        <option value="بلا معيل">بلا معيل</option>
                        <option value="مهجور">مهجور</option>
                        <option value="منفصل">منفصل</option>
                        <option value="عقد لاول مرة ولم يتم الدخول">
                          عقد لاول مرة ولم يتم الدخول
                        </option>
                      </select>
                    </div>

                    <div class="spouse_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="spouse_first_name"
                      >
                        الاسم الأول للزوج/ ة
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الاسم الأول"
                        name="spouse_first_name"
                        id="spouse_first_name"
                      />
                    </div>

                    <div class="spouse_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="spouse_second_name"
                      >
                        الاسم الثاني للزوج/ ة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الاسم الأب"
                        name="spouse_second_name"
                      />
                    </div>

                    <div class="spouse_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="spouse_third_name"
                      >
                        الاسم الثالث للزوج/ ة
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الاسم الجد"
                        name="spouse_third_name"
                        id="spouse_third_name"
                      />
                    </div>

                    <div class="spouse_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="spouse_family_name"
                      >
                        اسم العائلة للزوج/ ة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل اسم العائلة"
                        name="spouse_family_name"
                        id="spouse_family_name"
                      />
                    </div>

                    <div class="spouse_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="spouse_identity_type"
                      >
                        نوع هوية الزوج/ ة
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="spouse_identity_type"
                        id="spouse_identity_type"
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="فلسطينية">فلسطينية</option>
                        <option value="اردنية">اردنية</option>
                        <option value="اسرائيلية">اسرائيلية</option>
                        <option value="مصرية">مصرية</option>
                        <option value="تصريح اقامة">تصريح اقامة</option>
                        <option value="وثيقة أخرى">وثيقة أخرى</option>
                      </select>
                    </div>

                    <div class="spouse_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="spouse_identity_number"
                      >
                        رقم هوية الزوج/ ة
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل رقم الهوية"
                        name="spouse_identity_number"
                        id="spouse_identity_number"
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="is_war_victim"
                        >هل المعيل مصاب حرب<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="is_war_victim"
                        id="is_war_victim"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="is_disabled"
                        >هل المعيل ذو إعاقة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="is_disabled"
                        id="is_disabled"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="disability_type"
                        >نوع الإعاقة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="disability_type"
                        id="disability_type"
                        required
                      >
                        <option value="" selected="" disabled="">اختر</option>
                        <option value="لا يوجد">لا يوجد</option>
                        <option value="إعاقة بصرية">إعاقة بصرية</option>
                        <option value="إعاقة سمعية">إعاقة سمعية</option>
                        <option value="إعاقة حركية">إعاقة حركية</option>
                        <option value="إعاقة عقلية">إعاقة عقلية</option>
                        <option value="إعاقة نفسية">إعاقة نفسية</option>
                        <option value="إعاقة نطقية">إعاقة نطقية</option>
                        <option value="إعاقة اجتماعية">
                          إعاقة اجتماعية (التوحد أو اضطرابات التواصل)
                        </option>
                        <option value="إعاقة حسية">إعاقة حسية</option>
                        <option value="إعاقة متعددة">إعاقة متعددة</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="has_chronic_disease"
                        >لديه امراض مزمنه<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="has_chronic_disease"
                        id="has_chronic_disease"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>
                  </div>
                  <div id="form-errors" class="text-red-600 font-semibold mb-4 hidden"></div>

                </div>

                <!-- Step 2:   معلومات التواصل-->
                <div class="form-slide" id="step-2">
                  <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    معلومات التواصل
                  </h2>
                  <div class="grid md:grid-cols-2 gap-6">
                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="phone_1"
                        >رقم الجوال 1<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="tel"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        id="phone_1"
                        name="phone_1"
                        placeholder="أدخل رقم الجوال "
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-4"
                        for="phone_2"
                        >رقم الجوال 2</label
                      >
                      <input
                        type="tel"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        id="phone_2"
                        name="phone_2"
                        placeholder="أدخل رقم الجوال "
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="governorate"
                        >المحافظة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="governorate"
                        id="governorate"
                        required
                      >
                        <option value="" disabled="" selected="">
                          اختر المحافظة
                        </option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="city"
                        >المدينة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="city"
                        id="city"
                        required
                      ></select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="housing_complex"
                        >التجمع السكني<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="housing_complex"
                        id="housing_complex"
                        required
                      ></select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="neighborhood"
                        >الحي <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الحي"
                        name="neighborhood"
                        id="neighborhood"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="street"
                        >الشارع
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الشارع"
                        name="street"
                        id="street"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="address"
                        >العنوان
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل العنوان"
                        name="address"
                        id="address"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="nearest_landmark"
                        >أقرب معلم
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل أقرب معلم"
                        name="nearest_landmark"
                        id="nearest_landmark"
                        required
                      />
                    </div>
                  </div>
                </div>

                <!-- Step 3:  بيانات الأسرة -->
                <div class="form-slide" id="step-3">
                  <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    بيانات الأسرة
                  </h2>
                  <div class="grid md:grid-cols-2 gap-6">
                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="family_members_count"
                        >عدد أفراد الأسرة<span class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد أفراد الأسرة"
                        name="family_members_count"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="male_count"
                      >
                        عدد الذكور<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >

                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأفراد الذكور"
                        name="male_count"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="female_count"
                        >عدد الإناث<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >

                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأفراد الإناث"
                        name="female_count"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="children_under_2"
                        >عدد الأطفال أقل من سنتين
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأطفال أقل من سنتين"
                        name="children_under_2"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="children_under_3"
                        >عدد الأطفال أقل من 3 سنوات<span
                          class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأطفال أقل من 3 سنوات"
                        name="children_under_3"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="children_under_5"
                        >عدد الأطفال أقل من 5 سنوات<span
                          class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأطفال أقل من 5 سنوات"
                        name="children_under_5"
                        required
                      />
                    </div>
                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="children_aged_5_16_count"
                        >عدد الاطفال بين 5-16 سنة<span
                          class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>

                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأطفال ما بين 5-16 سنة"
                        name="children_aged_5_16_count"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="children_aged_6_18_count"
                        >عدد الاطفال بين 6-18 سنة<span
                          class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأطفال ما بين 6-18 سنة"
                        name="children_aged_6_18_count"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_school_students"
                        >عدد طلاب المدارس<span class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>

                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد طلاب المدارس"
                        name="number_of_school_students"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_university_students"
                        >عدد طلاب الجامعات<span class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد طلاب الجامعات"
                        name="number_of_university_students"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_infants"
                        >عدد الأطفال الرضع<span class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأطفال الرضع"
                        name="number_of_infants"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_people_with_disabilities"
                        >عدد الأشخاص ذوي الإعاقة<span
                          class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأشخاص ذوي الإعاقة"
                        name="number_of_people_with_disabilities"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_people_with_chronic_diseases"
                        >عددالمصابين بالأمراض المزمنة
                        <span class="text-red-500 text-lg">*</span>
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عددالمصابين بالأمراض المزمنة"
                        name="number_of_people_with_chronic_diseases"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_elderly_over_60"
                        >عدد المسنين فوق 60 سنة<span
                          class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد المسنين فوق 60 سنة"
                        name="number_of_elderly_over_60"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_pregnant_women"
                        >عدد النساء الحوامل<span class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد النساء الحوامل"
                        name="number_of_pregnant_women"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_breastfeeding_women"
                        >عدد النساء المرضعات<span class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد النساء المرضعات"
                        name="number_of_breastfeeding_women"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_injured_due_to_war"
                        >عدد الجرحى بسبب الحرب<span class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الجرحى بسبب الحرب"
                        name="number_of_injured_due_to_war"
                        required
                      />
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="is_caring_for_non_family_members"
                      >
                        هل تقوم برعاية أفراد ليسوا من ضمن أفراد الأسرة<span
                          class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="is_caring_for_non_family_members"
                        id="is_caring_for_non_family_members"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>

                    <div class="non_family_care" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="number_of_children_cared_for_not_in_family_under_18"
                      >
                        عدد الاطفال الذين يتم رعايتهم تحت سن 18 سنة
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل عدد الأطفال الذين يتم رعايتهم"
                        name="number_of_children_cared_for_not_in_family_under_18"
                        required
                      />
                    </div>

                    <div class="non_family_care" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="reason_for_caring_for_children"
                      >
                        سبب رعاية الاطفال<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="reason_for_caring_for_children"
                        id="reason_for_caring_for_children"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="وفاة احد الوالدين او كلاهما">
                          وفاة احد الوالدين او كلاهما
                        </option>
                        <option value="وفاة كامل العائلة">
                          وفاة كامل العائلة
                        </option>
                        <option value="مجهولين">مجهولين</option>
                        <option value="فقدان الاتصال بالوالدين او احداهما">
                          فقدان الاتصال بالوالدين او احداهما
                        </option>
                        <option value="الاهل خارج القطاع حاليا">
                          الاهل خارج القطاع حاليا
                        </option>
                        <option value="أخرى">أخرى</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="is_family_member_lost_during_war"
                        >هل يوجد فقيد حرب<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="is_family_member_lost_during_war"
                        id="is_family_member_lost_during_war"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>

                    <div
                      class="md:col-span-2 checkbox-group lost_family_member_relationship"
                      style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="relationship_to_family_members_lost_during_war"
                      >
                        خلال هذه الحرب، هل فقدت أحد أفراد عائلتك؟
                        <span class="text-red-500 text-lg">*</span>
                      </label>
                      <div class="grid grid-cols-2 gap-3 w-full">
                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="relationship_to_family_members_lost_during_war[]"
                            value="father"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">الاب</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="relationship_to_family_members_lost_during_war[]"
                            value="mother"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">الام</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="relationship_to_family_members_lost_during_war[]"
                            value="father_and_mother"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">الاب والام</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="relationship_to_family_members_lost_during_war[]"
                            value="brother"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">أخ</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="relationship_to_family_members_lost_during_war[]"
                            value="sister"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">اخت</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="relationship_to_family_members_lost_during_war[]"
                            value="son"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">ابن</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="relationship_to_family_members_lost_during_war[]"
                            value="daughter"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">ابنة</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="relationship_to_family_members_lost_during_war[]"
                            value="other_relatives"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">اقرباء اخرون</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Step 4:  بيانات المسكن -->
                <div class="form-slide" id="step-4">
                  <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    حيازة المسكن
                  </h2>
                  <div class="grid md:grid-cols-2 gap-6">
                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="housing_ownership"
                        >حيازة المسكن<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="housing_ownership"
                        id="housing_ownership"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="ملك">ملك</option>
                        <option value="مستأجر غير مفروش">
                          مستأجر غير مفروش
                        </option>
                        <option value="مستأجر مفروش">مستأجر مفروش</option>
                        <option value="دون مقابل">دون مقابل</option>
                        <option value="مقابل عمل">مقابل عمل</option>
                        <option value="غير ذلك">غير ذلك</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="type_of_housing"
                        >نوع المسكن<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="type_of_housing"
                        id="type_of_housing"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="فيلا">فيلا</option>
                        <option value="دار">دار</option>
                        <option value="شقة">شقة</option>
                        <option value="غرفة مستقلة">غرفة مستقلة</option>
                        <option value="خيمة">خيمة</option>
                        <option value="براكية">براكية</option>
                        <option value="ملجأ / دار مسنين">
                          ملجأ / دار مسنين
                        </option>
                        <option value="باطون">باطون</option>
                        <option value="زينقو">زينقو</option>
                        <option value="غير ذلك">غير ذلك</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="is_war_damage"
                        >هل يوجد أضرار حرب 2023<span
                          class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="is_war_damage"
                        id="is_war_damage"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="extent_of_housing_damage_due_to_war"
                        >حجم الضرر للمسكن نتيجة الحرب<span
                          class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="extent_of_housing_damage_due_to_war"
                        id="extent_of_housing_damage_due_to_war"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="ضرر كلي">ضرر كلي</option>
                        <option value="ضرر جزئي يصلح للسكن">
                          ضرر جزئي يصلح للسكن
                        </option>
                        <option value="ضرر جزئي لا يصلح للسكن">
                          ضرر جزئي لا يصلح للسكن
                        </option>
                        <option value="لم يتضرر">لم يتضرر</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="is_displaced_due_to_war_and_changed_housing_location"
                        >هل تم النزوح من المنزل بسبب الحرب وتم تغيير موقع
                        المسكن<span class="text-red-500 text-lg">*</span></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="is_displaced_due_to_war_and_changed_housing_location"
                        id="is_displaced_due_to_war_and_changed_housing_location"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>

                    <div class="displacement_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="displaced_governorate"
                        >المحافظة<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="displaced_governorate"
                        id="displaced_governorate"
                      >
                        <option value="" disabled="" selected="">
                          اختر المحافظة
                        </option>
                      </select>
                    </div>

                    <div class="displacement_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="displaced_housing_complex"
                        >التجمع السكني<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل التجمع السكني"
                        name="displaced_housing_complex"
                        id="displaced_housing_complex"
                      />
                    </div>

                    <div class="displacement_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="displaced_street"
                        >الشارع
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل الشارع"
                        name="displaced_street"
                        id="displaced_street"
                      />
                    </div>

                    <div class="displacement_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="displaced_address"
                        >العنوان
                        <span class="text-red-500 text-lg">*</span></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل العنوان"
                        name="displaced_address"
                        id="displaced_address"
                      />
                    </div>

                    <div class="displacement_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="displaced_place_of_displacement"
                        >مكان النزوح<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="displaced_place_of_displacement"
                        id="displaced_place_of_displacement"
                      >
                        <option value="" disabled="" selected>اختر</option>
                        <option value="مدارس الاونروا">مدارس الاونروا</option>
                        <option value="مدارس حكومية">مدارس حكومية</option>
                        <option value="منزل للاقارب بمقابل">
                          منزل للاقارب بمقابل
                        </option>
                        <option value="منزل اقارب بدون مقابل">
                          منزل اقارب بدون مقابل
                        </option>
                        <option value="منزل اخر للعائلة">
                          منزل اخر للعائلة
                        </option>
                        <option value="منزل مستأجر">منزل مستأجر</option>
                        <option value="مستشفيات">مستشفيات</option>
                        <option value="خيمة">خيمة</option>
                        <option value="كنيسة">كنيسة</option>
                        <option value="قاعات">قاعات</option>
                        <option value="مراكز ايوائية">مراكز ايوائية</option>
                        <option value="اخرى">اخرى</option>
                      </select>
                    </div>
                  </div>
                </div>

                <!-- Step 5:  احتياجات الأسرة -->
                <div class="form-slide" id="step-5">
                  <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    احتياجات الأسرة
                  </h2>
                  <div class="grid md:grid-cols-2 gap-6">
                    <div class="md:col-span-2 checkbox-group">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="urgent_basic_needs_for_family"
                      >
                        أهم الاحتياجات الأسرة الأساسية<span
                          class="text-red-500 text-lg"
                          >*</span
                        >
                      </label>
                      <div class="grid grid-cols-2 gap-3 w-full">
                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="financial_aid"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">المساعدات المالية</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="healthcare_treatment"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700"
                            >الرعاية الصحية - العلاج</span
                          >
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="housing_shelter"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">المسكن - المأوى</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="clothing"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">الملابس</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="blankets_mattresses_pillows"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700"
                            >اغطية / فرشات ومخدات</span
                          >
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="baby_milk"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">حليب الاطفال</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="water"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">الماء</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="hygiene_products"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">مستلزمات صحية (فوط)</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="food"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">الغذاء</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="cooking_gas"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">غاز للطهي</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="house_rent"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">اجار منزل</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="university_fees"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">اقساط جامعية</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="school_fees"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">اقساط مدارس</span>
                        </label>

                        <label
                          class="flex items-center space-x-2 md:col-span-2"
                        >
                          <input
                            type="checkbox"
                            name="urgent_basic_needs_for_family[]"
                            value="other"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">أخرى</span>
                        </label>
                      </div>
                      <p
                        class="error text-red-500 text-lg"
                        style="display: none"
                      >
                        *required
                      </p>
                    </div>

                    <div class="md:col-span-2">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="secondary_needs_for_family"
                      >
                        أهم الاحتياجات الأسرة الثانوية 
                      </label>
                      <div class="grid grid-cols-2 gap-3 w-full">
                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="secondary_needs_for_family[]"
                            value="legal_aid"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">المساعدات القانونية</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="secondary_needs_for_family[]"
                            value="psychological_support"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">المساعدات النفسية</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="secondary_needs_for_family[]"
                            value="heating_source"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">مصدر تدفئة</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="secondary_needs_for_family[]"
                            value="fuel"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">وقود</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="secondary_needs_for_family[]"
                            value="child_vaccines"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">مطاعيم الاطفال</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="secondary_needs_for_family[]"
                            value="free_internet_packages"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700"
                            >حزم اتصال مجانية وانترنت</span
                          >
                        </label>

                        <label
                          class="flex items-center space-x-2 md:col-span-2"
                        >
                          <input
                            type="checkbox"
                            name="secondary_needs_for_family[]"
                            value="other"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">أخرى</span>
                        </label>
                      </div>
                    </div>

                    <div class="md:col-span-2">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="sources_of_family_income"
                      >
                        مصادر دخل الأسرة 
                      </label>
                      <div class="grid grid-cols-2 gap-3 w-full">
                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="sources_of_family_income[]"
                            value="Government Salaries and Wages"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700"
                            >أجور ورواتب من القطاع الحكومي</span
                          >
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="sources_of_family_income[]"
                            value="Private Sector Salaries and Wages"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700"
                            >أجور ورواتب من القطاع الخاص</span
                          >
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="sources_of_family_income[]"
                            value="Salaries from Work inside 1948 Territories"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700"
                            >أجور ورواتب من العمل داخل اراضي 48</span
                          >
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="sources_of_family_income[]"
                            value="Non-Agricultural Family Projects"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700"
                            >مشاريع للاسرة غير زراعية</span
                          >
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="sources_of_family_income[]"
                            value="Agriculture and Animal Husbandry"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700"
                            >الزراعة وتربية الحيوانات</span
                          >
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="sources_of_family_income[]"
                            value="Social Assistance"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">مساعدات اجتماعية</span>
                        </label>

                        <label class="flex items-center space-x-2">
                          <input
                            type="checkbox"
                            name="sources_of_family_income[]"
                            value="Remittances from Abroad"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">تحويلات من الخارج</span>
                        </label>

                        <label
                          class="flex items-center space-x-2 md:col-span-2"
                        >
                          <input
                            type="checkbox"
                            name="sources_of_family_income[]"
                            value="Other"
                            class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500 accent-purple-600"
                          />
                          <span class="text-gray-700">أخرى</span>
                        </label>
                      </div>
                    </div>

                    <div class="">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="monthly_income_shekels"
                        >الدخل الشهري (شيكل)<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="number"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="الدخل الشهري (شيكل)"
                        name="monthly_income_shekels"
                        id="monthly_income_shekels"
                        required
                      />
                    </div>

                    <div class="">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="is_unable_to_use_land_or_properties_due_to_war"
                      >
                        هل عانت الاسرة من عدم القدرة على استخدام عقاراتها بسبب
                        الحرب<span class="text-red-500 text-lg">*</span></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="is_unable_to_use_land_or_properties_due_to_war"
                        id="is_unable_to_use_land_or_properties_due_to_war"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>

                    <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="has_bank_account"
                      >
                        هل يوجد حساب بنكي<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="has_bank_account"
                        id="has_bank_account"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>

                    <div class="bank_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="account_holder_name"
                      >
                        اسم صاحب الحساب البنكي<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل اسم صاحب الحساب "
                        name="account_holder_name"
                        id="account_holder_name"
                      />
                    </div>

                    <div class="bank_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="bank_name_branch"
                      >
                        اسم البنك/ الفرع<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل اسم البنك/ الفرع "
                        name="bank_name_branch"
                        id="bank_name_branch"
                      />
                    </div>

                    <div class="bank_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="account_holder_id_number"
                      >
                        رقم هوية صاحب الحساب<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل رقم هوية صاحب الحساب "
                        name="account_holder_id_number"
                        id="account_holder_id_number"
                      />
                    </div>

                    <div class="bank_field" style="display: none">
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="account_number"
                      >
                        رقم الحساب<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <input
                        type="text"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        placeholder="أدخل رقم الحساب "
                        name="account_number"
                        id="account_number"
                      />
                    </div>

                     <div>
                      <label
                        class="block text-sm font-medium text-gray-700 mb-2"
                        for="agree_to_share_data_for_assistance"
                        >هل توافق عل نشر البيانات  مع الجهات  لغايات تقديم المساعدات؟<span class="text-red-500 text-lg"
                          >*</span
                        ></label
                      >
                      <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent focus:outline-none"
                        name="agree_to_share_data_for_assistance"
                        id="agree_to_share_data_for_assistance"
                        required
                      >
                        <option value="" disabled="" selected="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div id="form-message" class="p-3 my-4 bg-red-100 text-red-800 rounded hidden"></div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-8">
                  <button
                    type="button"
                    onclick="previousStep()"
                    id="prev-btn"
                    class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors hidden"
                  >
                    السابق
                  </button>
                  <div></div>
                  <button
                    type="button"
                    onclick="nextStep()"
                    id="next-btn"
                    class="btn-primary text-white px-8 py-3 rounded-lg font-semibold"
                  >
                    التالي
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Success Page -->

    <div
      id="success-page"
      class="min-h-screen bg-gradient-to-br from-green-50 to-blue-50 flex items-center justify-center hidden"
    >
      <div
        class="text-center success-animation flex flex-col items-center justify-centerS"
      >
        <div class="size-40 mb-12">
          <img src="./images/first_check.png" alt="check" />
        </div>
        <h1 class="text-4xl font-bold text-gray-800 mb-4">
          تم تسجيل بياناتك بنجاح في Gaza Madad Flow
        </h1>
        <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
          سيتم إرسال بياناتك تلقائياً للروابط المتاحة للمساعدات.
        </p>

        <button
          onclick="goHome()"
          class="btn-primary text-white px-8 py-3 rounded-lg font-semibold"
        >
          العودة للرئيسية
        </button>
      </div>
    </div>

    <script src="{{asset('js/script.js')}}"></script>
      <script>
        function startRegistration() {
            // hide landing page
            document.getElementById('landing-page').classList.add('hidden');
            // show registration form
            document.getElementById('registration-form').classList.remove('hidden');
        }
        </script>

  </body>
</html>
