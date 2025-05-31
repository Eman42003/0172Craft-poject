const loginButton = document.querySelector('.login-form'); // زر تسجيل الدخول
const emailInput = document.querySelector('input[placeholder="Enter your email address"]'); // حقل البريد الإلكتروني
const passwordInput = document.querySelector('input[placeholder="Enter your secure password"]'); // حقل كلمة المرور

// دالة للتحقق من صحة البريد الإلكتروني
function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // تعبير منتظم للبريد الإلكتروني
    return emailRegex.test(email);
}

// دالة للتحقق من صحة كلمة المرور
function validatePassword(password) {
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/; // كلمة مرور تتضمن أحرف وأرقام
    return passwordRegex.test(password);
}

// إضافة حدث الضغط على زر تسجيل الدخول
loginButton?.addEventListener('click', (e) => {
    e.preventDefault(); // منع الإجراء الافتراضي

    // إزالة رسائل الخطأ القديمة
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(msg => msg.remove());

    let isValid = true;

    // التحقق من صحة البريد الإلكتروني
    if (!validateEmail(emailInput.value.trim())) {
        displayError(emailInput, 'Please enter a valid email.');
        isValid = false;
    }

    // التحقق من صحة كلمة المرور
    if (!validatePassword(passwordInput.value.trim())) {
        displayError(passwordInput, 'Password must contain at least 6 characters including a number.');
        isValid = false;
    }

    // إذا كانت كل البيانات صحيحة
    if (isValid) {
        alert('Login successful!');
        // إرسال البيانات إلى السيرفر إذا لزم الأمر
    }
});

// دالة لعرض رسائل الخطأ
function displayError(inputElement, message) {
    const errorMessage = document.createElement('span'); // إنشاء عنصر لرسالة الخطأ
    errorMessage.textContent = message; // إضافة النص
    errorMessage.style.color = 'red'; // جعل النص باللون الأحمر
    errorMessage.classList.add('error-message'); // إضافة فئة CSS للرسالة
    inputElement.parentElement.appendChild(errorMessage); // إضافة الرسالة بجانب الحقل
}

