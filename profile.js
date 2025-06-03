document.addEventListener('DOMContentLoaded', () => {
    const postAdButton = document.querySelector('.form-actions button:first-of-type');
    const postCourseButton = document.querySelector('.form-actions button:last-of-type');

    postAdButton.addEventListener('click', () => {
        window.location.href = 'postad.html'; 
    });

    postCourseButton.addEventListener('click', () => {
        window.location.href = 'postcourse.html'; 
    });

    const formFields = document.querySelectorAll('.form-group input, .form-group textarea');

    formFields.forEach(field => {
        field.addEventListener('focus', () => {
            field.style.borderColor = '#734d26';
        });

        field.addEventListener('blur', () => {
            field.style.borderColor = '#ccc';
        });
    });
});


