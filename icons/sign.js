// sign.js

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector('.signUp').addEventListener('click', function(event) {
        event.preventDefault(); // لمنع الإرسال التقليدي للنموذج

        // الحصول على البيانات المدخلة من النموذج
        let fullName = document.querySelector('input[name="name"]');
        let email = document.querySelector('input[name="email"]');
        let password = document.querySelector('input[name="password"]');
        let confirmPassword = document.querySelector('input[name="confirm_password"]');

        // التحقق من تطابق كلمة المرور مع التأكيد
        if (password.value !== confirmPassword.value) {
            alert("Passwords do not match!");
            clearFields(fullName, email, password, confirmPassword);
            return;
        }

        // التحقق من الحقول الأساسية
        if (!fullName.value || !email.value || !password.value || !confirmPassword.value) {
            alert("من فضلك تأكد من ملء جميع الحقول.");
            clearFields(fullName, email, password, confirmPassword);
            return;
        }

        // التحقق من صحة البريد الإلكتروني
        if (!validateEmail(email.value)) {
            alert("Please enter a valid email address.");
            clearFields(fullName, email, password, confirmPassword);
            return;
        }

        // التحقق من قوة كلمة المرور
        if (password.value.length < 8) {
            alert("Password must be at least 8 characters long.");
            clearFields(fullName, email, password, confirmPassword);
            return;
        }

        // بناء البيانات لإرسالها
        let data = new FormData();
        data.append('name', fullName.value);
        data.append('email', email.value);
        data.append('password', password.value);
        data.append('confirm_password', confirmPassword.value); // تأكد من إرسال هذا الحقل

        // إرسال البيانات باستخدام AJAX (fetch)
        fetch('signUp.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.json()) // استلام البيانات بتنسيق JSON
        .then(data => {
            console.log(data); // راجع ما إذا كانت البيانات تظهر بشكل صحيح
            if (data.status === 'success') {
                alert("Sign Up successful!");
                clearFields(fullName, email, password, confirmPassword); // مسح الحقول بعد النجاح
                window.location.href = 'login.html'; // إعادة توجيه المستخدم بعد التسجيل
            } else {
                alert("Error: " + data.message);
                clearFields(fullName, email, password, confirmPassword); // مسح الحقول بعد الخطأ
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred!');
            clearFields(fullName, email, password, confirmPassword); // مسح الحقول بعد الخطأ
        });
    });

    // Email validation function
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Function to clear input fields
    function clearFields(...fields) {
        fields.forEach(field => field.value = '');
    }
});
