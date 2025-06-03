

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector('.signUp').addEventListener('click', function(event) {
        event.preventDefault(); 

        
        let fullName = document.querySelector('input[name="name"]');
        let email = document.querySelector('input[name="email"]');
        let password = document.querySelector('input[name="password"]');
        let confirmPassword = document.querySelector('input[name="confirm_password"]');


        if (password.value !== confirmPassword.value) {
            alert("Passwords do not match!");
            clearFields(fullName, email, password, confirmPassword);
            return;
        }

      
        if (!fullName.value || !email.value || !password.value || !confirmPassword.value) {
            alert("من فضلك تأكد من ملء جميع الحقول.");
            clearFields(fullName, email, password, confirmPassword);
            return;
        }
   if (!validateEmail(email.value)) {
            alert("Please enter a valid email address.");
            clearFields(fullName, email, password, confirmPassword);
            return;
        }


        if (password.value.length < 8) {
            alert("Password must be at least 8 characters long.");
            clearFields(fullName, email, password, confirmPassword);
            return;
        }

        
        let data = new FormData();
        data.append('name', fullName.value);
        data.append('email', email.value);
        data.append('password', password.value);
        data.append('confirm_password', confirmPassword.value); 

        
        fetch('signUp.php', {
            method: 'POST',
            body: data
        })
        .then(response => response.json()) 
        .then(data => {
            console.log(data); 
            if (data.status === 'success') {
                alert("Sign Up successful!");
                clearFields(fullName, email, password, confirmPassword); 
                window.location.href = 'login.html'; 
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
