// إضافة خاصية البحث في شريط البحث
document.querySelector('.search-bar input').addEventListener('keydown', (event) => {
    if (event.key === 'Enter') {
        const query = event.target.value;
        if (query.trim() !== '') {
            alert(`Searching for: ${query}`); // استبدل alert بالوظيفة الفعلية للبحث
        }
    }
});

// تفاعل مع الأيقونات في شريط المهام
const icons = document.querySelectorAll('.images-bar img');
icons.forEach(icon => {
    icon.addEventListener('click', () => {
        alert(`You clicked on: ${icon.alt}`); // عرض اسم الأيقونة عند النقر عليها
    });
});

// إضافة تأثير عند التمرير على الفئات
const categoryItems = document.querySelectorAll('.category-item');
categoryItems.forEach(item => {
    item.addEventListener('mouseover', () => {
        item.querySelector('.category-box').style.backgroundColor = '#d10024'; // تغيير اللون عند التمرير
    });
    item.addEventListener('mouseout', () => {
        item.querySelector('.category-box').style.backgroundColor = '#91410D'; // إعادة اللون عند الخروج
    });
});

// إضافة وظيفة تفاعل مع الأزرار في الـ footer
const footerLinks = document.querySelectorAll('.footer-top .content ul li a');
footerLinks.forEach(link => {
    link.addEventListener('mouseover', () => {
        link.style.color = '#d10024'; // تغيير اللون عند التمرير
    });
    link.addEventListener('mouseout', () => {
        link.style.color = '#8d99ae'; // إعادة اللون عند الخروج
    });
});

// إضافة وظيفة لتغيير الحجم عند التمرير فوق الأيقونات في الـ footer
const paymentIcons = document.querySelectorAll('.footer-bottom .payment-method li i');
paymentIcons.forEach(icon => {
    icon.addEventListener('mouseover', () => {
        icon.style.transform = 'scale(1.2)'; // تكبير الأيقونة عند التمرير
    });
    icon.addEventListener('mouseout', () => {
        icon.style.transform = 'scale(1)'; // إعادة الحجم الطبيعي عند الخروج
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const userIcon = document.getElementById('user-icon');
    const dropdownMenu = document.getElementById('dropdown-menu');
    const profileBtn = document.getElementById('profile-btn');
    const logoutBtn = document.getElementById('logout-btn');

    // إظهار / إخفاء القائمة عند النقر على أيقونة المستخدم
    userIcon.addEventListener('click', () => {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    // توجيه المستخدم إلى صفحة البروفايل
    profileBtn.addEventListener('click', () => {
        window.location.href = 'profile.html'; // عدّل الرابط حسب الحاجة
    });

    // تنفيذ عملية تسجيل الخروج
    logoutBtn.addEventListener('click', () => {
        alert('Logging out...'); // يمكنك استبدالها بكود تسجيل الخروج الفعلي
        window.location.href = 'logout.html'; // عدّل الرابط حسب الحاجة
    });

    // إغلاق القائمة عند النقر خارجها
    document.addEventListener('click', (event) => {
        if (!userIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
});

