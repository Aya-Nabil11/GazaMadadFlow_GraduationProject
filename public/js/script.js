// load the first page
function startRegistration() {
    document.getElementById("landing-page").classList.add("hidden");
    document.getElementById("registration-form").classList.remove("hidden");
}

document.getElementById("date_of_birth").max = new Date()
    .toISOString()
    .split("T")[0];
let currentStep = 1;
const totalSteps = 5;

// Next step
function nextStep() {
    console.log(`currentStep in next ${currentStep}`);

    // // Current Step
    const stepEl = document.getElementById(`step-${currentStep}`);

    // stop if error occur
    if (!validateStep(currentStep)) return;

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

// validate step fields
function validateStep(stepNumber) {
    let allFilled = true;
    const stepEl = document.getElementById(`step-${stepNumber}`);
    const fields = stepEl.querySelectorAll("input, select");

    fields.forEach((field) => {
        let errorMessage = field.parentElement.querySelector(".error-message");
        if (!errorMessage) errorMessage = createErrorMessage(field);

        const errorText = checkField(field);
        if (errorText) {
            allFilled = false;
            showError(field, errorMessage, errorText);
        } else {
            hideError(field, errorMessage);
        }
    });

    // checkbox groups
    const checkboxGroups = stepEl.querySelectorAll(".checkbox-group");
    checkboxGroups.forEach((group) => {
        if (group.offsetParent === null) return;
        const checkboxes = group.querySelectorAll("input[type='checkbox']");

        let errorMessage = group.nextElementSibling;
        if (
            !errorMessage ||
            !errorMessage.classList.contains("error-message")
        ) {
            errorMessage = document.createElement("div");
            errorMessage.className =
                "error-message text-red-500 text-sm mt-2 font-semibold hidden";
            group.parentNode.insertBefore(errorMessage, group.nextSibling);
        }

        const anyChecked = Array.from(checkboxes).some((cb) => cb.checked);
        if (!anyChecked) {
            allFilled = false;
            errorMessage.textContent = "*الرجاء اختيار خيار واحد على الأقل";
            errorMessage.classList.remove("hidden");
        } else {
            errorMessage.classList.add("hidden");
        }
    });

    return allFilled;
}

// validate field to show error message
function checkField(field) {
    const value = field.value.trim();

    const nameFields = [
        "first_name",
        "second_name",
        "third_name",
        "family_name",
        "spouse_first_name",
        "spouse_second_name",
        "spouse_third_name",
        "spouse_family_name",
        "account_holder_name",
    ];
    const addressFields = [
        "neighborhood",
        "street",
        "address",
        "nearest_landmark",
        "displaced_housing_complex",
        "displaced_street",
        "displaced_address",
        "bank_name_branch",
    ];
    const numberFields = [
        "family_members_count",
        "male_count",
        "female_count",
        "children_under_2",
        "children_under_3",
        "children_under_5",
        "children_aged_5_16_count",
        "children_aged_6_18_count",
        "number_of_school_students",
        "number_of_university_students",
        "number_of_infants",
        "number_of_people_with_disabilities",
        "number_of_people_with_chronic_diseases",
        "number_of_elderly_over_60",
        "number_of_pregnant_women",
        "number_of_breastfeeding_women",
        "number_of_injured_due_to_war",
        "number_of_children_cared_for_not_in_family_under_18",
    ];

    let errorText = "";

    if (field.hasAttribute("required") && !value) {
        errorText = "*هذا الحقل مطلوب";
    } else if (nameFields.includes(field.name) && value) {
        const nameRegex = /^[A-Za-z\u0600-\u06FF\s]+$/;
        if (!nameRegex.test(value))
            errorText = "*الاسم يجب أن يبدأ بحرف ولا يحتوي على أرقام";
    } else if (field.name === "phone_1") {
        const phoneRegex = /^(056|059)[0-9]{7}$/;
        if (!phoneRegex.test(value))
            errorText = "*يجب أن يبدأ رقم الجوال بـ 056 أو 059 ويكون 10 أرقام";
    } else if (field.name === "phone_2" && value) {
        const phoneRegex = /^(056|059)[0-9]{7}$/;
        if (!phoneRegex.test(value))
            errorText = "*يجب أن يبدأ رقم الجوال بـ 056 أو 059 ويكون 10 أرقام";
    } else if (addressFields.includes(field.name) && value) {
        const addressRegex = /^[A-Za-zأ-ي][A-Za-zأ-ي0-9\s]*$/;
        if (!addressRegex.test(value))
            errorText = "*يجب أن يحتوي الحقل على حرف واحد على الأقل";
    } else if (
        (field.name === "identity_number" ||
            field.name === "spouse_identity_number") &&
        value
    ) {
        const documentRegex = /^[0-9]{9}$/;
        if (!documentRegex.test(value))
            errorText = "*رقم الهوية يجب أن يتكون من 9 أرقام";
    } else if (field.name === "account_holder_id_number" && value) {
        const documentRegex = /^[0-9]{9}$/;
        if (!documentRegex.test(value))
            errorText = "*رقم الهوية يجب أن يتكون من 9 أرقام";
    } else if (numberFields.includes(field.name) && value) {
        const num = Number(value);
        const validNumberRegex = /^(0|[1-9][0-9]*)$/;
        if (
            !validNumberRegex.test(value) ||
            isNaN(num) ||
            !Number.isInteger(num) ||
            num < 0 ||
            num > 40
        )
            errorText = "*يجب أن يكون رقماً صحيحاً بين 0 و 40 ";
    } else if (field.name === "monthly_income_shekels" && value) {
        const income = Number(value);
        if (isNaN(income) || income < 0)
            errorText = "*يجب إدخال دخل شهري صحيح ";
    }

    return errorText;
}

// create error message
function createErrorMessage(field) {
    const span = document.createElement("span");
    span.className =
        "error-message text-red-500 text-sm mt-2 font-semibold hidden";
    field.parentElement.appendChild(span);
    return span;
}

// show error message
function showError(field, errorMessage, errorText) {
    field.classList.add("border-red-500");
    errorMessage.textContent = errorText;
    errorMessage.classList.remove("hidden");
}

// hide error message
function hideError(field, errorMessage) {
    field.classList.remove("border-red-500");
    errorMessage.classList.add("hidden");
}
//show error of field when input
document.querySelectorAll("input, select").forEach((field) => {
    field.addEventListener("input", () => {
        let errorMessage = field.parentElement.querySelector(".error-message");
        if (!errorMessage) errorMessage = createErrorMessage(field);

        const errorText = checkField(field);
        if (errorText) {
            showError(field, errorMessage, errorText);
        } else {
            hideError(field, errorMessage);
        }
    });
});

// previous step
function previousStep() {
    if (currentStep > 1) {
        // Hide current step
        document
            .getElementById(`step-${currentStep}`)
            .classList.remove("active");
        document
            .getElementById(`step-circle-${currentStep}`)
            .classList.remove("active");

        // Show previous step
        currentStep--;
        setTimeout(() => {
            document
                .getElementById(`step-${currentStep}`)
                .classList.add("active");
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
// navigate between the current and previous step
const stepWrappers = document.querySelectorAll(".step-wrapper");
stepWrappers.forEach((wrapper, index) => {
    wrapper.addEventListener("click", () => {
        const clickedStep = index + 1;

        if (clickedStep <= currentStep) {
            document
                .getElementById(`step-${currentStep}`)
                .classList.remove("active");
            document
                .getElementById(`step-circle-${currentStep}`)
                .classList.remove("active");

            currentStep = clickedStep;

            setTimeout(() => {
                document
                    .getElementById(`step-${currentStep}`)
                    .classList.add("active");
                document
                    .getElementById(`step-circle-${currentStep}`)
                    .classList.add("active");

                updateCursor();
            }, 100);
        }
    });
});
// update the step cursor
function updateCursor() {
    stepWrappers.forEach((w, i) => {
        if (i + 1 === currentStep || i + 1 === currentStep + 1) {
            w.style.cursor = "pointer";
        } else {
            w.style.cursor = "default";
        }
    });
}
window.addEventListener("DOMContentLoaded", () => {
    updateCursor();
});

async function submitForm() {
    const form = document.querySelector("form");
    const formData = new FormData(form);

    // Show backend errors
    let messageDiv = document.getElementById("form-message");
    if (!messageDiv) {
        messageDiv = document.createElement("div");
        messageDiv.id = "form-message";
        messageDiv.className = "p-3 mb-4 bg-red-100 text-red-800 rounded";
        form.parentNode.insertBefore(messageDiv, form);
    }
    messageDiv.innerHTML = "";
    messageDiv.classList.add("hidden");

    try {
        const response = await fetch(form.action, {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
                Accept: "application/json",
            },
            body: formData,
        });

        const data = await response.json();

        if (data.status) {
            document.getElementById("success-page").classList.remove("hidden");
            document
                .getElementById("registration-form")
                .classList.add("hidden");
        } else {
            let allErrors = [];

            if (data.errors) {
                Object.values(data.errors).forEach((errArr) => {
                    allErrors = allErrors.concat(errArr);
                });
            }
            if (allErrors.length > 0) {
                const ul = document.createElement("ul");

                allErrors.forEach((err) => {
                    const li = document.createElement("li");
                    li.innerText = err;
                    ul.appendChild(li);
                });

                messageDiv.appendChild(ul);
                messageDiv.classList.remove("hidden");
            }
        }
    } catch (err) {
        messageDiv.innerText = "حدث خطأ في الاتصال بالسيرفر.";
        messageDiv.classList.remove("hidden");
        console.error(err);
    }
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
    step.querySelectorAll("[data-required]").forEach((f) =>
        f.setAttribute("required", "")
    );
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
            spouseInputs.forEach((input) =>
                input.setAttribute("required", "true")
            );
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
const nonFamilyCare = document.getElementById(
    "is_caring_for_non_family_members"
);
const nonFamilyCareFields = document.querySelectorAll(".non_family_care");
const nonFamilyCareInputs = document.querySelectorAll(".non_family_care input");
const nonFamilyCareSelect = document.querySelector(".non_family_care select");

if (nonFamilyCare) {
    nonFamilyCare.addEventListener("change", function () {
        if (this.value === "1") {
            nonFamilyCareFields.forEach(
                (field) => (field.style.display = "block")
            );
            nonFamilyCareInputs.forEach((input) =>
                input.setAttribute("required", "true")
            );
            nonFamilyCareSelect.setAttribute("required", "true");
        } else {
            nonFamilyCareFields.forEach(
                (field) => (field.style.display = "none")
            );
            nonFamilyCareInputs.forEach((input) => {
                input.removeAttribute("required");
                input.value = "";
            });
            nonFamilyCareSelect.removeAttribute("required");
        }
    });
}

// Check lost_family_member
const lostFamilyMember = document.getElementById(
    "is_family_member_lost_during_war"
);
const lostMemberRelationship = document.querySelector(
    ".lost_family_member_relationship"
);

if (lostFamilyMember) {
    lostFamilyMember.addEventListener("change", function () {
        if (this.value === "1") {
            lostMemberRelationship.style.display = "block";
        } else {
            lostMemberRelationship.style.display = "none";
            const errorMessage = lostMemberRelationship.nextElementSibling;
            if (
                errorMessage &&
                errorMessage.classList.contains("error-message")
            ) {
                errorMessage.classList.add("hidden");
            }
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
            displacementField.forEach(
                (field) => (field.style.display = "block")
            );
            displacemenInputs.forEach((input) =>
                input.setAttribute("required", "true")
            );
            displacemenSelect.forEach((input) =>
                input.setAttribute("required", "true")
            );
        } else {
            displacementField.forEach(
                (field) => (field.style.display = "none")
            );
            displacemenInputs.forEach((input) => {
                input.removeAttribute("required");
                input.value = "";
            });
            displacemenSelect.forEach((input) => {
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
    غزة: {
        غزة: [
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
    الوسطى: {
        "دير البلح": ["دير البلح", "مخيم دير البلح", "المصدر", "وادي السلقا"],
        النصيرات: ["النصيرات", "مخيم النصيرات"],
        البريج: ["البريج", "مخيم البريج"],
        المغازي: ["المغازي", "مخيم المغازي"],
        الزوايدة: ["الزوايدة"],
    },
    خانيونس: {
        خانيونس: [
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

    رفح: {
        رفح: [
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
        '<option value="" disabled selected >اختر المدينة</option>';
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

if (hasBankAccount) {
    hasBankAccount.addEventListener("change", function () {
        if (this.value === "1") {
            bankfields.forEach((field) => (field.style.display = "block"));
            bankInputs.forEach((input) =>
                input.setAttribute("required", "true")
            );
        } else {
            bankfields.forEach((field) => (field.style.display = "none"));
            bankInputs.forEach((input) => {
                input.removeAttribute("required");
                input.value = "";
            });
            // bankSelect.removeAttribute("required");
        }
    });
}
