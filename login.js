// تحديد العناصر في الصفحة
const loginButton = document.querySelector('.login-btn'); // زر تسجيل الدخول
const emailInput = document.querySelector('.editable-line[placeholder="Email"]'); // حقل البريد الإلكتروني
const passwordInput = document.getElementById('passwordInput'); // حقل كلمة المرور
const togglePassword = document.getElementById('togglePassword'); // أيقونة العين

// دالة للتحقق من صحة البريد الإلكتروني
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // تعبير منتظم للتحقق من التنسيق العام
    if (!emailRegex.test(email)) { 
        return false; // إذا لم يطابق البريد الإلكتروني التنسيق العام، اعتبره غير صالح
    }

    // التحقق من عدد الأحرف قبل @
    const localPart = email.split('@')[0]; // الجزء قبل @
    return localPart.length >= 6 && localPart.length <= 12; // يجب أن يكون بين 6 و 12 حرفًا
}

// منع المسافات في بداية أو نهاية كلمة المرور
passwordInput.addEventListener('input', (e) => {
    const value = e.target.value;

    // إزالة المسافات إذا كانت في البداية أو النهاية
    if (value.startsWith(' ') || value.endsWith(' ')) {
        e.target.value = value.trim();
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const passwordInput = document.getElementById("passwordInput");
    const togglePassword = document.getElementById("togglePassword");
    const eyeIcon = document.getElementById("eyeIcon");

    togglePassword.addEventListener("click", () => {
        // تبديل نوع الحقل بين password و text
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.src = "eye.svg"; // تغيير الأيقونة لإخفاء الباسورد
        } else {
            passwordInput.type = "password";
            eyeIcon.src = "eye-slash.svg"; // تغيير الأيقونة لإظهار الباسورد
        }
    });
});

// إضافة حدث الضغط على زر تسجيل الدخول
loginButton.addEventListener('click', (e) => {
    e.preventDefault(); // منع الإجراء الافتراضي

    // إزالة رسائل الخطأ القديمة
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(msg => msg.remove());

    let isValid = true;

    // التحقق من صحة البريد الإلكتروني
    if (!validateEmail(emailInput.value.trim())) {
        displayError(emailInput, 'Invalid email format or length before @ must be between 6 and 12 characters.');
        isValid = false;
    }

    // التحقق من صحة كلمة المرور
    if (passwordInput.value.trim().length < 6) {
        displayError(passwordInput, 'Password must be at least 6 characters.');
        isValid = false;
    }

    // إذا كانت البيانات غير صحيحة
    if (!isValid) {
        alert('Login failed! Please fix the errors and try again.');
        return; // منع أي عملية أخرى إذا كانت البيانات غير صحيحة
    }

    // إذا كانت البيانات صحيحة، التوجيه إلى صفحة home
    window.location.href = 'index.html'; // التوجيه إلى صفحة الهوم
});

// Move focus to next input field when pressing Enter
const inputs = [emailInput, passwordInput]; // أضف الحقول التي تريد الانتقال إليها
inputs.forEach((input, index) => {
    input.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault(); // منع الإجراء الافتراضي (عدم إرسال النموذج)
            if (inputs[index + 1]) {
                inputs[index + 1].focus(); // الانتقال إلى الحقل التالي
            }
        }
    });
});

// دالة لعرض رسائل الخطأ
function displayError(inputElement, message) {
    const errorMessage = document.createElement('span'); // إنشاء عنصر لرسالة الخطأ
    errorMessage.textContent = message; // إضافة النص
    errorMessage.style.color = 'red'; // جعل النص باللون الأحمر
    errorMessage.classList.add('error-message'); // إضافة فئة CSS للرسالة
    inputElement.parentElement.appendChild(errorMessage); // إضافة الرسالة بجانب الحقل
}