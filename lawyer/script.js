function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');
}

/**
 * دالة للتحكم في ظهور القائمة المنسدلة عند النقر (للموبايل) 
 * وتمنع الانتقال للرابط إذا كانت الشاشة صغيرة
 */
function toggleDropdown(event) {
    const dropdownLink = event.currentTarget.parentElement;
    
    // إذا كانت الشاشة كبيرة (Desktop)، لا نفعل شيئًا ونسمح بتأثير الـ hover
    if (window.innerWidth > 992) {
        return true; 
    }

    // منع الانتقال للرابط إذا كانت الشاشة موبايل
    event.preventDefault(); 

    // فتح وإغلاق القائمة المنسدلة
    dropdownLink.classList.toggle('open');

    // إغلاق أي قائمة منسدلة أخرى مفتوحة
    document.querySelectorAll('.dropdown-link').forEach(link => {
        if (link !== dropdownLink && link.classList.contains('open')) {
            link.classList.remove('open');
        }
    });
}