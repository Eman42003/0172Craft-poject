document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const fullName = form.querySelector("input[name='fullName']");
    const course = form.querySelector("input[name='course']");
    const price = form.querySelector("input[name='price']");
    const phone = form.querySelector("input[name='phone']");
    const address = form.querySelector("input[name='address']");
    const online = form.querySelector("input[name='online']");
    const offline = form.querySelector("input[name='offline']");
    
    // زر إلغاء (مسح البيانات المدخلة)
    window.cancelForm = function () {
        form.reset();
        alert("تم مسح البيانات بنجاح!");
    };

    // التحقق من صحة البيانات قبل الإرسال
    form.addEventListener("submit", function (event) {
        let errorMessage = "";

        if (fullName.value.trim() === "") {
            errorMessage += " الاسم بالكامل مطلوب.\n";
        }
        if (course.value.trim() === "") {
            errorMessage += " اسم الدورة مطلوب.\n";
        }
        if (!/^\d+(\.\d{1,2})?$/.test(price.value)) {
            errorMessage += " السعر يجب أن يكون رقمًا صالحًا.\n";
        }
        if (!/^\d{10,15}$/.test(phone.value)) {
            errorMessage += " رقم الهاتف يجب أن يكون بين 10-15 رقمًا.\n";
        }
        if (address.value.trim() === "") {
            errorMessage += " العنوان مطلوب.\n";
        }
        if (!online.checked && !offline.checked) {
            errorMessage += " يجب اختيار نوع الدورة (أونلاين أو أوفلاين).\n";
        }

        if (errorMessage !== "") {
            alert(errorMessage);
            event.preventDefault(); // إيقاف إرسال النموذج في حال وجود أخطاء
        } else {
            alert(" تم إرسال الدورة بنجاح!");
        }
    });
});
