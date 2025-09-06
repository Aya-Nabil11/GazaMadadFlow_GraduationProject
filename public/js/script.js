// load the first page
function startRegistration() {
  document.getElementById("landing-page").classList.add("hidden");
  document.getElementById("registration-form").classList.remove("hidden");
}

document.getElementById("date_of_birth").max = new Date().toISOString().split("T")[0];
let currentStep = 1;
const totalSteps = 5;
// Next step
function nextStep() {
  let allFilled = true;

  // Current Step
  const stepEl = document.getElementById(`step-${currentStep}`);
  // Check the inputs is empty or not
  const textFields = stepEl.querySelectorAll(
    "input[required], select[required]"
  );

  textFields.forEach((field) => {
  let errorMessage = field.parentElement.querySelector(".error-message");
  if (!errorMessage) {
    errorMessage = document.createElement("span");
    errorMessage.classList.add("error-message", "text-red-500", "text-sm", "mt-2","font-semibold", "hidden");
    errorMessage.textContent = "*هذا الحقل مطلوب";
    field.parentElement.appendChild(errorMessage);
  }

  if (!field.value.trim()) {
    allFilled = false;
    field.classList.add("border-red-500");
    errorMessage.classList.remove("hidden");
  } else {
    field.classList.remove("border-red-500");
    errorMessage.classList.add("hidden");
  }
});

  const checkboxGroups = stepEl.querySelectorAll(".checkbox-group");
  checkboxGroups.forEach((group) => {
  if (group.offsetParent === null) return; 
  const checkboxes = group.querySelectorAll("input[type='checkbox']");
  let errorMessage = group.querySelector(".error-message");

  if (!errorMessage) {
    errorMessage = document.createElement("span");
    errorMessage.classList.add("error-message", "text-red-500", "text-sm", "mt-2", "font-semibold", "hidden");
    errorMessage.textContent = "*الرجاء اختيار خيار واحد على الأقل";
    group.appendChild(errorMessage);
  }

  const anyChecked = Array.from(checkboxes).some(cb => cb.checked);

  if (!anyChecked) {
    allFilled = false;
    errorMessage.classList.remove("hidden");
  } else {
    errorMessage.classList.add("hidden");
  }
});

  // stop if error occur
  if (!allFilled) return;

  // submit data if all input is filled
  if (currentStep === totalSteps) {
    submitForm();
    return;
  }

  // go to the next step
  stepEl.classList.remove("active");
  document
    .getElementById(`step-circle-${currentStep}`)
    .classList.remove("active");
  document
    .getElementById(`step-circle-${currentStep}`)
    .classList.add("completed");

  currentStep++;

  setTimeout(() => {
    document.getElementById(`step-${currentStep}`).classList.add("active");
    document
      .getElementById(`step-circle-${currentStep}`)
      .classList.add("active");
  }, 100);

  // display the previous btn
  document.getElementById("prev-btn").classList.remove("hidden");

  // change the text and type of send data btn
  if (currentStep === totalSteps) {
    const nextBtn = document.getElementById("next-btn");
    nextBtn.textContent = "إرسال البيانات";
  }
}

// previous Step
function previousStep() {
  if (currentStep > 1) {
    // Hide current step
    document.getElementById(`step-${currentStep}`).classList.remove("active");
    document
      .getElementById(`step-circle-${currentStep}`)
      .classList.remove("active");

    // Show previous step
    currentStep--;
    setTimeout(() => {
      document.getElementById(`step-${currentStep}`).classList.add("active");
      document
        .getElementById(`step-circle-${currentStep}`)
        .classList.add("active");
      document
        .getElementById(`step-circle-${currentStep}`)
        .classList.remove("completed");
    }, 100);

    // Update buttons
    if (currentStep === 1) {
      document.getElementById("prev-btn").classList.add("hidden");
    }

    document.getElementById("next-btn").textContent = "التالي";
    document.getElementById("next-btn").onclick = nextStep;
  }
}

// function submitForm() {
//   // Simulate form submission
//   document.getElementById("registration-form").classList.add("hidden");
//   document.getElementById("success-page").classList.remove("hidden");
  
// }

function submitForm() {
  // Select the form
  const form = document.querySelector("form");

  // Optional: You can do final validation here if needed

  // Submit the form
  form.submit();
}


function goHome() {
  // Reset form
  currentStep = 1;
  document.getElementById("success-page").classList.add("hidden");
  document.getElementById("landing-page").classList.remove("hidden");

  // Reset all steps
  for (let i = 1; i <= totalSteps; i++) {
    document.getElementById(`step-${i}`).classList.remove("active");
    document
      .getElementById(`step-circle-${i}`)
      .classList.remove("active", "completed");
  }

  // Activate first step
  document.getElementById("step-1").classList.add("active");
  document.getElementById("step-circle-1").classList.add("active");

  // Reset buttons
  document.getElementById("prev-btn").classList.add("hidden");
  document.getElementById("next-btn").textContent = "التالي";
  document.getElementById("next-btn").onclick = nextStep;
}

(function () {
  function c() {
    var b = a.contentDocument || a.contentWindow.document;
    if (b) {
      var d = b.createElement("script");
      d.innerHTML =
        "window.__CF$cv$params={r:'975e86ba201a5dab',t:'MTc1NjMyODcxOC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
      b.getElementsByTagName("head")[0].appendChild(d);
    }
  }
  if (document.body) {
    var a = document.createElement("iframe");
    a.height = 1;
    a.width = 1;
    a.style.position = "absolute";
    a.style.top = 0;
    a.style.left = 0;
    a.style.border = "none";
    a.style.visibility = "hidden";
    document.body.appendChild(a);
    if ("loading" !== document.readyState) c();
    else if (window.addEventListener)
      document.addEventListener("DOMContentLoaded", c);
    else {
      var e = document.onreadystatechange || function () {};
      document.onreadystatechange = function (b) {
        e(b);
        "loading" !== document.readyState &&
          ((document.onreadystatechange = e), c());
      };
    }
  }
})();

// Show steps
function showStep(stepId) {
  // At first,hide all steps
  document.querySelectorAll(".form-slide").forEach((slide) => {
    slide.classList.remove("active");
    // remove all required fields from hidden step
    slide
      .querySelectorAll("[required]")
      .forEach((f) => f.removeAttribute("required"));
  });

  // show current step
  const step = document.getElementById(stepId);
  step.classList.add("active");
  //show required fields for current step only
  step
    .querySelectorAll("[data-required]")
    .forEach((f) => f.setAttribute("required", ""));
}

// check the marital status
const maritalStatus = document.getElementById("marital_status");
const spouseFields = document.querySelectorAll(".spouse_field");
const spouseInputs = document.querySelectorAll(".spouse_field input");
const spouseSelect = document.querySelector(".spouse_field select");

if (maritalStatus) {
  maritalStatus.addEventListener("change", function () {
    if (this.value === "متزوج") {
      spouseFields.forEach((field) => (field.style.display = "block"));
      spouseInputs.forEach((input) => input.setAttribute("required", "true"));
      spouseSelect.setAttribute("required", "true");
    } else {
      spouseFields.forEach((field) => (field.style.display = "none"));
      spouseInputs.forEach((input) => {
        input.removeAttribute("required");
        input.value = "";
      });
      spouseSelect.removeAttribute("required");
    }
  });
}

// Check non-family-care children
const nonFamilyCare = document.getElementById("is_caring_for_non_family_members");
const nonFamilyCareFields = document.querySelectorAll(".non_family_care");
const nonFamilyCareInputs = document.querySelectorAll(".non_family_care input");
const nonFamilyCareSelect = document.querySelector(".non_family_care select");

if (nonFamilyCare) {
  nonFamilyCare.addEventListener("change", function () {
    if (this.value === "1") {
      nonFamilyCareFields.forEach((field) => (field.style.display = "block"));
      nonFamilyCareInputs.forEach((input) =>
        input.setAttribute("required", "true")
      );
      nonFamilyCareSelect.setAttribute("required", "true");
    } else {
      nonFamilyCareFields.forEach((field) => (field.style.display = "none"));
      nonFamilyCareInputs.forEach((input) => {
        input.removeAttribute("required");
        input.value = "";
      });
      nonFamilyCareSelect.removeAttribute("required");
    }
  });
}

// Check lost_family_member
const lostFamilyMember = document.getElementById("is_family_member_lost_during_war");
const lostMemberRelationship = document.querySelector(
  ".lost_family_member_relationship"
);

if (lostFamilyMember) {
  lostFamilyMember.addEventListener("change", function () {
    if (this.value === "1") {
      lostMemberRelationship.style.display = "block";
      
    } else {
      lostMemberRelationship.style.display = "none";
      
    }
  });
}

// Check displacement
const warDisplacement = document.getElementById(
  "is_displaced_due_to_war_and_changed_housing_location"
);
const displacementField = document.querySelectorAll(".displacement_field");
const displacemenInputs = document.querySelectorAll(
  ".displacement_field input"
);
const displacemenSelect = document.querySelectorAll(
  ".displacement_field select"
);

if (warDisplacement) {
  warDisplacement.addEventListener("change", function () {
    if (this.value === "1") {
      displacementField.forEach((field) => (field.style.display = "block"));
      displacemenInputs.forEach((input) =>
        input.setAttribute("required", "true")
      );
      displacemenSelect.forEach((input) =>
        input.setAttribute("required", "true")
      );
    } else {
      displacementField.forEach((field) => (field.style.display = "none"));
      displacemenInputs.forEach((input) => {
        input.removeAttribute("required");
        input.value = "";
      });
      displacemenSelectforEach((input) => {
        input.removeAttribute("required");
        input.value = "";
      });
    }
  });
}

// Data on governorates, cities, and housing complex
const data = {
  "شمال غزة": {
    "بيت لاهيا": ["بيت لاهيا"],
    "بيت حانون": ["بيت لاهيا"],
    جباليا: ["جباليا", "مخيم جباليا"],
  },
  "غزة": {
    "غزة": [
      "الرمال",
      "الصبرة",
      "الشجاعية",
      "التفاح",
      "الزيتون",
      "النصر",
      "الدرج",
      "الميناء",
      "الشيخ عجلين",
      "مخيم الشاطئ",
      "الزهراء",
      "المغراقة",
      "جحر الديك",
    ],
  },
  "الوسطى": {
    "دير البلح": ["دير البلح", "مخيم دير البلح", "المصدر", "وادي السلقا"],
    "النصيرات": ["النصيرات", "مخيم النصيرات"],
    "البريج": ["البريج", "مخيم البريج"],
    "المغازي": ["المغازي", "مخيم المغازي"],
    "الزوايدة": ["الزوايدة"],
  },
  "خانيونس": {
    "خانيونس": [
      "خانيونس البلد",
      "مخيم خانيونس",
      "المواصي خانيونس",
      "قيزان ابو رشوان",
      "قيزان النجار",
      "المحطة",
      "البطن السمين",
      "جورة اللوت",
      "جورة العقاد",
      "معن",
      "الشيخ ناصر",
      "القرارة",
      "بني سهيلا",
      "عبسان الكبيرة",
      "عبسان الجديدة",
      "خزاعة",
      "الفخاري",
      "الاوروبي",
    ],
  },

  "رفح": {
    "رفح": [
      "النصر رفح",
      "شوكة",
      "تل السلطان",
      "الشابورة",
      "البرازيل",
      "العودة",
      "رفح الغربية",
      "مخيم يبنا",
      "السلام",
    ],
  },


};

const governorateSelect = document.getElementById("governorate");
const displacedGovernorateSelect = document.getElementById(
  "displaced_governorate"
);
const citySelect = document.getElementById("city");
const housingSelect = document.getElementById("housing_complex");

window.addEventListener("DOMContentLoaded", () => {
  // add governorates

  if (governorateSelect) {
    Object.keys(data).forEach((governorate) => {
      const option = document.createElement("option");
      option.value = governorate;
      option.textContent = governorate;
      governorateSelect.appendChild(option);
    });
  }

  // add displaced governorates
  if (displacedGovernorateSelect) {
    Object.keys(data).forEach((governorate) => {
      const option = document.createElement("option");
      option.value = governorate;
      option.textContent = governorate;
      displacedGovernorateSelect.appendChild(option);
    });
  }

  citySelect.innerHTML =
    '<option value="" disabled selected>اختر المدينة</option>';
  housingSelect.innerHTML =
    '<option value="" disabled selected>اختر التجمع السكني</option>';
  citySelect.disabled = true;
  housingSelect.disabled = true;
});

governorateSelect.addEventListener("change", function () {
  citySelect.innerHTML =
    '<option value="" disabled selected>اختر المدينة</option>';

  housingSelect.innerHTML =
    '<option value="" disabled selected>اختر التجمع السكني</option>';
  housingSelect.disabled = true;

  const selectedGovernorate = this.value;
  const cities = Object.keys(data[selectedGovernorate]);

  // add governorate cities
  cities.forEach((city) => {
    const option = document.createElement("option");
    option.value = city;
    option.textContent = city;
    citySelect.appendChild(option);
  });

  citySelect.disabled = false;
});

citySelect.addEventListener("change", function () {
  housingSelect.innerHTML =
    '<option value="" disabled selected>اختر التجمع السكني</option>';

  const selectedGovernorate = governorateSelect.value;
  const selectedCity = this.value;
  const housings = data[selectedGovernorate][selectedCity];

  // add governorate housing complex

  housings.forEach((house) => {
    const option = document.createElement("option");
    option.value = house;
    option.textContent = house;
    housingSelect.appendChild(option);
  });

  housingSelect.disabled = false;
});

//// Check Bank Details
const hasBankAccount = document.getElementById("has_bank_account");
const bankfields = document.querySelectorAll(".bank_field");
const bankInputs = document.querySelectorAll(".bank_field input");
const bankSelect = document.querySelector(".bank_field select");

if (hasBankAccount) {
  hasBankAccount.addEventListener("change", function () {
    if (this.value === "1") {
      bankfields.forEach((field) => (field.style.display = "block"));
      bankInputs.forEach((input) => input.setAttribute("required", "true"));
      bankSelect.setAttribute("required", "true");
    } else {
      bankfields.forEach((field) => (field.style.display = "none"));
      bankInputs.forEach((input) => {
        input.removeAttribute("required");
        input.value = "";
      });
      bankSelect.removeAttribute("required");
    }
  });
}
