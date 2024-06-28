// contact form validation
$(Document).on("click", ".submit", function (event) {
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
  } else {
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

//   on load popup js start
function createCookie(name, value, days) {
  var expires = "";
  if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toGMTString();
  }
  document.cookie = name + "=" + value + expires + "; path=/";
}

//Cookie reading function
function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}

// Cookie deletion function
function eraseCookie(name) {
  createCookie(name, "", -1);
}

document.addEventListener('DOMContentLoaded', function() {
  var modalOverlay = document.getElementById('modalOverlay');
  var yesButton = document.getElementById('yesButton');
  var noButton = document.getElementById('noButton');

  // Check the cookie
  var popupSeen = readCookie('popupSeen');
  if (popupSeen === null) {
      modalOverlay.style.display = 'block';
  }

  // On clicking yes button
  yesButton.addEventListener('click', function() {
      createCookie('popupSeen', 'yes', 365);
      modalOverlay.style.display = 'none';
  });

  // On clicking no button
  noButton.addEventListener('click', function() {
      eraseCookie('popupSeen');
      modalOverlay.style.display = 'none';
  });
});
//   on load popup js end

// product gallery slider start
document.addEventListener("DOMContentLoaded", function () {
  let thumbnailSwiper, mainImageSwiper;

  function initializeSwipers() {
    const isMobileView = window.innerWidth <= 576;

    if (thumbnailSwiper) thumbnailSwiper.destroy(true, true);
    if (mainImageSwiper) mainImageSwiper.destroy(true, true);

    thumbnailSwiper = new Swiper(".thumbnails-slider", {
      direction: isMobileView ? "horizontal" : "vertical",
      slidesPerView: 5,
      spaceBetween: 10,
      freeMode: true,
      watchSlidesProgress: true,
    });

    mainImageSwiper = new Swiper(".main-image-slider", {
      // direction: 'vertical',
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      thumbs: {
        swiper: thumbnailSwiper,
      },
    });

    // Update current thumbnail on slide change
    mainImageSwiper.on("slideChange", function () {
      const currentIndex = mainImageSwiper.activeIndex;
      document.querySelectorAll(".thumbnail-button").forEach((thumb, index) => {
        thumb.removeAttribute("aria-current");
        if (index === currentIndex) {
          thumb.setAttribute("aria-current", "true");
        }
      });
    });
  }

  // Initialize swipers on load
  initializeSwipers();

  // Reinitialize swipers on resize
  window.addEventListener("resize", initializeSwipers);
});
// product gallery slider end

//   product page related product slider start
var swiper = new Swiper(".relatedslider", {
  slidesPerView: 3,
  spaceBetween: 30,
  autoplay: true,
  loop: true,
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
  },
});
//   product page related product slider end

// collection page js start
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
      slidesPerView: 2,
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
  },
});
// collection page end

// event dropdown js start
document.querySelectorAll(".dropdown-item").forEach((item) => {
  item.addEventListener("click", function (e) {
    e.preventDefault();
    var target = this.getAttribute("href");
    var tabTriggerEl = document.querySelector('a[href="' + target + '"]');
    var tabTrigger = new bootstrap.Tab(tabTriggerEl);
    tabTrigger.show();
  });
});
// event dropdown js end

// blog content js start
document.addEventListener("DOMContentLoaded", function () {
  const paragraphs = document.querySelectorAll(".truncated-text");
  const anchors = document.querySelectorAll(".truncated-text-h");

  paragraphs.forEach((paragraph) => {
    const words = paragraph.innerText.split(" ");

    if (words.length > 6) {
      paragraph.innerText = words.slice(0, 6).join(" ") + "...";
    }
  });

  anchors.forEach((anchor) => {
    const words = anchor.innerText.split(" ");

    if (words.length > 9) {
      anchor.innerText = words.slice(0, 9).join(" ") + "...";
    }
  });
});
// blog content js end 

// filter collection category button strat
document.addEventListener('DOMContentLoaded', (event) => {
    const byCategoryButton = document.getElementById('byCategory');
    const latestMarketsButton = document.getElementById('latestMarkets');
    const categoryDropdown = document.getElementById('categoryDropdown');
    const categoryItems = document.querySelectorAll('.category-item');

    byCategoryButton.addEventListener('click', () => {
        categoryDropdown.style.display = 'block';
    });

    latestMarketsButton.addEventListener('click', () => {
        categoryDropdown.style.display = 'none';
    });

    categoryItems.forEach(item => {
        item.addEventListener('click', () => {
            categoryDropdown.style.display = 'none';
        });
    });
});

// filter collection category button end

// price range slider start

function getVals() {
  // Get slider values
  let parent = this.parentNode;
  let slides = parent.getElementsByTagName("input");
  let slide1 = parseFloat(slides[0].value);
  let slide2 = parseFloat(slides[1].value);
  // Neither slider will clip the other, so make sure we determine which is larger
  if (slide1 > slide2) {
    let tmp = slide2;
    slide2 = slide1;
    slide1 = tmp;
  }
  let displayElement = parent.getElementsByClassName("rangeValues")[0];
  displayElement.innerHTML = "Rs" + slide1 + " - Rs" + slide2;
}

window.onload = function () {
  // Initialize Sliders
  let sliderSections = document.getElementsByClassName("range-slider");
  for (let x = 0; x < sliderSections.length; x++) {
    let sliders = sliderSections[x].getElementsByTagName("input");
    for (let y = 0; y < sliders.length; y++) {
      if (sliders[y].type === "range") {
        sliders[y].oninput = getVals;
        // Manually trigger event first time to display values
        sliders[y].oninput();
      }
    }
  }
};
// price range slider end
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});


// testimonial slider strat 
var swiper = new Swiper(".testimonalSwiper", {
  slidesPerView: 3,
  spaceBetween: 30,
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
    1000: {
      slidesPerView: 3,
    },
  },
});
// testimonial slider end