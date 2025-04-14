// custom.js

// Hiệu ứng hover cho logo
document.getElementById('logo').addEventListener('mouseover', function() {
    this.style.transform = 'scale(1.1)';
});

document.getElementById('logo').addEventListener('mouseout', function() {
    this.style.transform = 'scale(1)';
});

// Hiệu ứng hiển thị giỏ hàng khi nhấn
document.querySelector('.cart .beta-select').addEventListener('click', function() {
    let cartBody = document.querySelector('.cart-body');
    cartBody.classList.toggle('active');
});

// Hiệu ứng mở rộng tìm kiếm khi focus vào ô input
let searchInput = document.querySelector('input[type="text"]');
searchInput.addEventListener('focus', function() {
    this.style.width = '300px';
});

searchInput.addEventListener('blur', function() {
    this.style.width = '250px';
});

// Tạo hiệu ứng tự động chuyển banner
let currentSlide = 0;
let slides = document.querySelectorAll('.fullwidthbanner img');
setInterval(() => {
    slides[currentSlide].style.opacity = 0; // ẩn slide hiện tại
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].style.opacity = 1; // hiển thị slide mới
}, 3000); // thay đổi mỗi 3 giây
