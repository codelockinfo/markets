// LOADER 
$(window).on('load', function() {
    $(".loader").delay(500).fadeOut("fast");
});
// top to bottom arrow 
// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 500) {        // If page is scrolled more than 50px
        $('.icon-topbottom').fadeIn(200);    // Fade in the arrow
    } else {
        $('.icon-topbottom').fadeOut(200);   // Else fade out the arrow
    }
});
$('.icon-topbottom').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});



$( document ).ready(function() {
        // FAQs
        document.querySelectorAll('.accordion-item').forEach((item) => {
            const header = item.querySelector('.accordion-header a');
            const icon = header.querySelector('.circle-icon i');
            const collapse = item.querySelector('.accordion-collapse');
            if (collapse.classList.contains('show')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
                header.classList.add('custom-main-color');
                header.classList.remove('custom-light-color');
            } else {
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
                header.classList.add('custom-light-color');
                header.classList.remove('custom-main-color');
            }
            collapse.addEventListener('show.bs.collapse', () => {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus');
                header.classList.add('custom-main-color');
                header.classList.remove('custom-light-color');
            });

            collapse.addEventListener('hide.bs.collapse', () => {
                icon.classList.remove('fa-minus');
                icon.classList.add('fa-plus');
                header.classList.add('custom-light-color');
                header.classList.remove('custom-main-color');
            });
        });
        // Swiper slider CATEGORIES SLIDER
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6, 
            spaceBetween: 20, 
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: { 
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                480: { 
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: { 
                    slidesPerView: 3,
                    spaceBetween: 15,
                },
                1024: { 
                    slidesPerView: 4,
                    spaceBetween: 15,
                },
                1440: {
                    slidesPerView: 6,
                    spaceBetween: 20,
                }
            }
        });
        // video treditional slider
        var swiper = new Swiper(".videoSwiper", {
            slidesPerView: 4, 
            spaceBetween: 30, 
            freeMode: true,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: { 
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                576: { 
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: { 
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: { 
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1200: { 
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
            }
        });
        // banner slider
        var swiper = new Swiper(".banner", {
            slidesPerView: 1, 
            loop: true,
            freeMode: true,
            autoplay: true,
            pagination: {
                el: '.custom-pagination', 
                bulletClass: 'custom-pagination-bullet', 
                bulletActiveClass: 'custom-pagination-bullet-active', 
                clickable: true,
            },
        });
        // tranding product
        var swiper = new Swiper(".product", {
            slidesPerView: 3, 
            spaceBetween: 30, 
            freeMode: true,
            loop:true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: { 
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                576: { 
                    slidesPerView: 1.5,
                    spaceBetween: 10,
                },
                768: { 
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                1024: { 
                    slidesPerView: 2.5,
                    spaceBetween: 25,
                },
                1025: { 
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
            }
        });
        //blog 
        var swiper = new Swiper(".blog", {
            slidesPerView: 3, 
            spaceBetween: 30, 
            freeMode: true,
            loop: true,
            // autoplay: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                320: { 
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                576:{
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: { 
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: { 
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
            }
        });
});
    