// contact form validation 

$(".submit").click(function (event) {
    console.log("jnjnnv");
    event.preventDefault();
 
    var name = $("#firstName").val();
    var email = $("#email").val();
    var query = $("#query").val();
    
  
    $(".nameError").text("");
    $(".emailError").text("");
    $(".query").text("");
  
    if (name == "") {
      $(".nameError").text("Please enter first name");
    }
    if (email == "") {
      $(".emailError").text("Please enter your email");
    }
    if (query == "") {
      $(".query").text("Please enter your query");
    }
    
    
     else {
      var con = confirm("Are you done?");
      if (con == true) {
        $(".done").text("Your form is successfully submitted ");
        $(".done").css("margin-top", "20px");
        return true;
      } else {
        return false;
      }
    }
  });

  // contact form validation end


  // product gallery slider start 
  document.addEventListener('DOMContentLoaded', function() {
    let thumbnailSwiper, mainImageSwiper;

    function initializeSwipers() {
        const isMobileView = window.innerWidth <= 576;

        if (thumbnailSwiper) thumbnailSwiper.destroy(true, true);
        if (mainImageSwiper) mainImageSwiper.destroy(true, true);

        thumbnailSwiper = new Swiper('.thumbnails-slider', {
            direction: isMobileView ? 'horizontal' : 'vertical',
            slidesPerView: 5,
            spaceBetween: 10,
            freeMode: true,
            watchSlidesProgress: true,
        });

        mainImageSwiper = new Swiper('.main-image-slider', {
            // direction: 'vertical',
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            thumbs: {
                swiper: thumbnailSwiper,
            },
        });

        // Update current thumbnail on slide change
        mainImageSwiper.on('slideChange', function() {
            const currentIndex = mainImageSwiper.activeIndex;
            document.querySelectorAll('.thumbnail-button').forEach((thumb, index) => {
                thumb.removeAttribute('aria-current');
                if (index === currentIndex) {
                    thumb.setAttribute('aria-current', 'true');
                }
            });
        });
    }

    // Initialize swipers on load
    initializeSwipers();

    // Reinitialize swipers on resize
    window.addEventListener('resize', initializeSwipers);
});

  // product gallery slider start 

//   product page related product slider start
var swiper = new Swiper(".relatedslider", {
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay:true,
    loop:true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
        576: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
        1100: {
            slidesPerView: 4,
        },
    }
  });
//   product page related product slider end

  // collection page js
  
  var swiper = new Swiper(".mySwiper", {
      navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
      },
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      freeMode: true,
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      breakpoints: {
          0: {
              slidesPerView: 1,
          },
          320: {
              slidesPerView: 1,
          },
          650: {
              slidesPerView: 2,
          },
          768: {
              slidesPerView: 2,
          },
          1020: {
              slidesPerView: 3,
          },
          1100: {
              slidesPerView: 3,
          },
      }
  });