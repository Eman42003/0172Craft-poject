document.querySelector('.SignUp-btn').addEventListener('click', function(event) {
    event.preventDefault(); // لمنع الإرسال التقليدي للنموذج

    // الحصول على البيانات المدخلة من النموذج
    let fullName = document.getElementById('full_name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirm_password').value;
    let userType = document.querySelector('input[name="type"]:checked') ? document.querySelector('input[name="type"]:checked').value : '';

    // التحقق من تطابق كلمة المرور مع التأكيد
    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
    }

    // التحقق من الحقول الأساسية
    if (!fullName || !email || !password || !confirmPassword || !userType) {
        alert("من فضلك تأكد من ملء جميع الحقول.");
        return;
    }

    // بناء البيانات لإرسالها
    let data = new FormData();
    data.append('full_name', fullName);
    data.append('email', email);
    data.append('password', password);
    data.append('confirm_password', confirmPassword); // تأكد من إرسال هذا الحقل
    data.append('type', userType);

    // إرسال البيانات باستخدام AJAX (fetch)
    fetch('signup.php', {
        method: 'POST',
        body: data
    })
    .then(response => response.json()) // استلام البيانات بتنسيق JSON
    .then(data => {
        console.log(data); // راجع ما إذا كانت البيانات تظهر بشكل صحيح
        if (data.status === 'success') {
            alert("Sign Up successful!");
            window.location.href = 'login.php'; // إعادة توجيه المستخدم بعد التسجيل
        } else {
            alert("Error: " + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred!');
    });
});
