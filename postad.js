// وظيفة البحث
const searchBar = document.querySelector('.search-bar input');
searchBar.addEventListener('input', function () {
  const query = searchBar.value.toLowerCase();
  console.log("البحث عن:", query);
  // هنا يمكنك كتابة كود البحث الحقيقي أو التعامل مع البيانات.
});

// التحقق من صحة النموذج عند الإرسال
const adForm = document.querySelector('.ad-form'); // استهداف النموذج مرة واحدة

adForm.addEventListener('submit', function (e) {
  const title = document.querySelector('input[name="title"]')?.value.trim();
  const price = document.querySelector('input[name="price"]')?.value.trim();
  const agreeCheckbox = document.getElementById('agree-checkbox'); // استهداف checkbox

  if (!title || !price) {
    e.preventDefault(); // منع الإرسال
    alert("الرجاء تعبئة جميع الحقول المطلوبة!");
    return;
  }

  if (!agreeCheckbox || !agreeCheckbox.checked) {
    e.preventDefault(); // منع الإرسال
    alert("يجب الموافقة على الشروط قبل إرسال النموذج!");
    return;
  }

  alert("تم إرسال الإعلان بنجاح!");
});

// معاينة الصور قبل رفعها
const fileInput = document.querySelector('input[type="file"]');
fileInput.addEventListener('change', function (e) {
  const file = e.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (event) {
      let imgPreview = document.querySelector('.img-preview');
      if (!imgPreview) {
        imgPreview = document.createElement('img');
        imgPreview.className = 'img-preview'; // إضافة اسم class
        imgPreview.style.width = "100px";
        imgPreview.style.marginTop = "10px";
        adForm.appendChild(imgPreview);
      }
      imgPreview.src = event.target.result;
    };
    reader.readAsDataURL(file);
  }
});

// إضافة تفاعل مع الأيقونات في شريط المهام
const navbarIcons = document.querySelectorAll('.images-bar span');
navbarIcons.forEach(icon => {
  icon.addEventListener('mouseover', function () {
    icon.style.color = '#ffc107';
  });
  icon.addEventListener('mouseout', function () {
    icon.style.color = ''; // يرجع اللون الافتراضي
  });
});
