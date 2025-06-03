const loginButton = document.querySelector('.login-form'); 
const emailInput = document.querySelector('input[placeholder="Enter your email address"]'); 
const passwordInput = document.querySelector('input[placeholder="Enter your secure password"]'); 


function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    return emailRegex.test(email);
}


function validatePassword(password) {
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/; 
    return passwordRegex.test(password);
}


loginButton?.addEventListener('click', (e) => {
    e.preventDefault(); 

    
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(msg => msg.remove());

    let isValid = true;

   
    if (!validateEmail(emailInput.value.trim())) {
        displayError(emailInput, 'Please enter a valid email.');
        isValid = false;
    }

    
    if (!validatePassword(passwordInput.value.trim())) {
        displayError(passwordInput, 'Password must contain at least 6 characters including a number.');
        isValid = false;
    }

   
    if (isValid) {
        alert('Login successful!');
        
    }
}); 
function displayError(inputElement, message) {
    const errorMessage = document.createElement('span'); 
    errorMessage.textContent = message; 
    errorMessage.style.color = 'red'; 
    errorMessage.classList.add('error-message'); 
    inputElement.parentElement.appendChild(errorMessage); 
}

