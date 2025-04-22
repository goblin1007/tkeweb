// /* header */
document.addEventListener('DOMContentLoaded', function () {
    const btn = document.querySelector('.header_lang_btn');
    const list = document.querySelector('.header_lang_list');

    // Toggle hiển thị khi click vào nút
    btn.addEventListener('click', function (event) {
        event.stopPropagation(); // Ngăn sự kiện click lan ra ngoài
        list.style.display = (list.style.display === 'flex') ? 'none' : 'flex';
    });

    // Ẩn khi click ra ngoài danh sách
    document.addEventListener('click', function (e) {
        if (!list.contains(e.target) && !btn.contains(e.target)) {
            list.style.display = 'none';
        }
    });
});

document.querySelector('.introduce_item').onmouseover = function (){
    document.querySelector('.introduce_item_list').style.display='block';
}
document.querySelector('.introduce_item').onmouseout = function (){
    document.querySelector('.introduce_item_list').style.display='none';
}
document.querySelector('.introduce_item_list').onmouseout = function(){
    document.querySelector('.introduce_item_list').style.display='none';
}

document.querySelector('.news_item').onmouseover = function (){
    document.querySelector('.news_item_list').style.display='block';
}
document.querySelector('.news_item').onmouseout = function (){
    document.querySelector('.news_item_list').style.display='none';
}
document.querySelector('.dropdown-menu').onmouseout = function(){
    document.querySelector('.news_item_list').style.display='none';
}

document.querySelector('.trainning_item').onmouseover = function (){
    document.querySelector('.trainning_item_list').style.display='block';
}
document.querySelector('.trainning_item').onmouseout = function (){
    document.querySelector('.trainning_item_list').style.display='none';
}
document.querySelector('.trainning_item_list').onmouseout = function(){
    document.querySelector('.trainning_item_list').style.display='none';
}

document.querySelector(' .admission_item').onmouseover = function (){
    document.querySelector(' .admission_item_list').style.display='block';
}
document.querySelector(' .admission_item').onmouseout = function (){
    document.querySelector('.admission_item_list').style.display='none';
}
document.querySelector('.admission_item_list').onmouseout = function(){
    document.querySelector('.admission_item_list').style.display='none';
}

/* footer */
const inputs = document.querySelectorAll('.input_contact_form');
inputs.forEach(input => {
    const label = input.nextElementSibling;

    input.addEventListener('focus', () => {
        label.style.display = 'none';
    });

    input.addEventListener('blur', () => {
        if (label && input.value === '') {
            label.style.display = 'block';
        }
    });
});


document.querySelectorAll(".modal__overlay, .notice_container > button").forEach(function (el) {
    el.addEventListener("click", function () {
    document.querySelector(".modal").style.display = "none";
    document.querySelector(".modal__overlay").style.display = "none";
    document.querySelector(".notice_container").style.display = "none";
})})


document.getElementById("submit_contact").addEventListener("click", function () {
    const fullname = document.getElementById("fullname_footer").value.trim();
    const phone = document.getElementById("phone_footer").value.trim();
    const email = document.getElementById("email_footer").value.trim();
    const modalContent = modal.querySelector(".notice_content span");
    const phoneRegex = /^(0|\+84)(3|5|7|8|9)[0-9]{8}$/;
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  
    if (fullname === "") {
        modalContent.textContent = "Vui lòng nhập Họ và Tên";
        document.querySelector(".modal").style.display = "flex";
        document.querySelector(".modal__overlay").style.display = "block";
         document.querySelector(".notice_container").style.display = "flex";
        return;
      }
    if (phone === "") {
        modalContent.textContent = "Vui lòng nhập số điện thoại";
        document.querySelector(".modal").style.display = "flex";
        document.querySelector(".modal__overlay").style.display = "block";
         document.querySelector(".notice_container").style.display = "flex";
        return; 
      }

      if (!phoneRegex.test(phone)) {
        modalContent.textContent = "Vui lòng nhập đúng định dạng Số điện thoại";
        document.querySelector(".modal").style.display = "flex";
        document.querySelector(".modal__overlay").style.display = "block";
         document.querySelector(".notice_container").style.display = "flex";
        return;
      }
      if (email === "") {
        modalContent.textContent = "Vui lòng nhập Email";
        document.querySelector(".modal").style.display = "flex";
        document.querySelector(".modal__overlay").style.display = "block";
         document.querySelector(".notice_container").style.display = "flex";
        return;
      }
      
      if (!emailRegex.test(email)) {
        modalContent.textContent = "Vui lòng nhập đúng định dạng Email";
        document.querySelector(".modal").style.display = "flex";
        document.querySelector(".modal__overlay").style.display = "block";
         document.querySelector(".notice_container").style.display = "flex";
        return;
      }
    
    document.querySelector(".footer_contact_form").submit();
  });
