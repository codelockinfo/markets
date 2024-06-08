    // BANNER ARROW BACKGROUND CHANGE 
   document.addEventListener('DOMContentLoaded', function () {
        var carouselInner = document.querySelector('.carousel-inner');
        var arrowBoxPrev = document.querySelector('.arrow-box');
        var arrowBoxNext = document.querySelector('.arrow-box2');

        var images = [
            'assets/img/banner-1.jpg',
            'assets/img/banner-2.jpg',
            'assets/img/banner-3.jpg'
        ];

        // Ensure we have at least 3 images by repeating if necessary
        while (images.length < 3) {
            images = images.concat(images);
        }
        images = images.slice(0, 3);

        // Insert images into carousel
        images.forEach((imgSrc, index) => {
            var carouselItem = document.createElement('div');
            carouselItem.className = 'carousel-item' + (index === 0 ? ' active' : '');
            carouselItem.innerHTML = `<img src="${imgSrc}" class="d-block w-100" alt="Banner Image ${index + 1}">`;
            carouselInner.appendChild(carouselItem);
        });

        var backgrounds = images.map(imgSrc => `url(${imgSrc})`);

        // Update background images on slide change
        document.getElementById('carouselExampleControls').addEventListener('slide.bs.carousel', function (event) {
            var nextIndex = event.to;
            arrowBoxPrev.style.backgroundImage = backgrounds[nextIndex];
            arrowBoxPrev.style.backgroundSize = 'cover';
            arrowBoxNext.style.backgroundImage = backgrounds[nextIndex];
            arrowBoxNext.style.backgroundSize = 'cover';
        });

        // Clear the opposite arrow box background on click
        arrowBoxPrev.addEventListener('click', function () {
            arrowBoxNext.style.backgroundImage = '';
        });

        arrowBoxNext.addEventListener('click', function () {
            arrowBoxPrev.style.backgroundImage = '';
        });

        // Update hover backgrounds
        arrowBoxPrev.addEventListener('mouseover', function () {
            arrowBoxPrev.style.backgroundImage = backgrounds[document.querySelector('.carousel-item.active').index];
        });
        arrowBoxNext.addEventListener('mouseover', function () {
            arrowBoxNext.style.backgroundImage = backgrounds[document.querySelector('.carousel-item.active').index];
        });
    });

    // form fillup

    $(".submit").click(function (event) {
        event.preventDefault();
     
        var name = $("#firstName").val();
        var email = $("#email").val();
        var comment = $("#query").val();
        
      
        $(".nameError").text("");
        $(".emailError").text("");
        $(".query").text("");
      
        if (name == "") {
          $(".nameError").text("Please enter first name");
        }
        if (email == "") {
          $(".emailError").text("Please enter your email");
        }
        if (age == "") {
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


      alert("Hello! I am an alert box!!");
      