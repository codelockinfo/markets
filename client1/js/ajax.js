function loading_show($selector) {
  $($selector)
    .addClass("loading")
    .html('<i class="fas fa-circle-notch fa-spin"></i>')
    .fadeIn("fast")
    .attr("disabled", "disabled");
}

function loading_hide($selector, $buttonName, $buttonIcon) {
  if ($buttonIcon != undefined) {
    $buttonIcon = '<i class="fas fa-circle-notch fa-spin"></i>';
  } else {
    $buttonIcon = $buttonName;
  }
  $($selector).removeClass("loading").html($buttonIcon).removeAttr("disabled");
}

$(document).ready(function () {
  $(".tab-selector [href^=tab]").click(function () {
    console.log("--------------");
    // get tab id and tab url
    tabId = $(this).attr("id");
    tabUrl = jQuery("#" + tabId).attr("href");

    jQuery("[id^=tab]").removeClass("current");
    jQuery("#" + tabId).addClass("current");

    // load tab content
    loadTabContent(tabUrl);
    return false;
  });

  function showMessage(msg, type) {
    var alertTitle =
      type === "success" ? "Success" : type === "fail" ? "Failure" : "Error";
    Swal.fire({
      title: alertTitle,
      text: msg,
      icon: type === "fail" ? "error" : type,
      timer: 5000,
      timerProgressBar: true,
      showConfirmButton: false,
    });
  }

  console.log("CLient ajax call");
  $(".contactForm").click(function () {
    console.log("contactForm");
    var form_data = $(".client_contact_form")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "conatct_form");
    $.ajax({
      url: "../client1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show("save_loader_show");
      },
      success: function (response) {
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Submit Now");
        console.log(response);
        response["msg"]["name"] !== undefined
          ? $(".name").html(response["msg"]["name"])
          : $(".name").html("");
        response["msg"]["email"] !== undefined
          ? $(".email").html(response["msg"]["email"])
          : $(".email").html("");
        response["msg"]["message"] !== undefined
          ? $(".message").html(response["msg"]["message"])
          : $(".message").html("");
        if (response["data"] == "success") {
          showMessage(response.msg, "success");
          $(".client_contact_form")[0].reset();
        }
      },
    });
  });
});






function loadData(routineName, elementId) {
  console.log(routineName + " on load");
  $.ajax({
    url: "../client1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: routineName },
    success: function (response) {
      var response = JSON.parse(response);
      if (response.outcome !== "" && response.outcome !== undefined) {
        $("#" + elementId).append(response.outcome);
        response.bannercontent !== undefined
          ? $(".bannerContent").append(response.bannercontent)
          : "";
        response.famousmarkettitle !== undefined
          ? $(".famousMarketTitle").append(response.famousmarkettitle)
          : "";
        response.famousmarketbutton !== undefined
          ? $(".famousMarketButton").append(response.famousmarketbutton)
          : "";
        response.offerstitle !== undefined
          ? $(".offersTitle").append(response.offerstitle)
          : "";
        response.videotitle !== undefined
          ? $(".videoTitle").append(response.videotitle)
          : "";
        response.videobutton !== undefined
          ? $(".videoButton").append(response.videobutton)
          : "";
        response.faqtitle != undefined
          ? $(".faqTitle").append(response.faqtitle)
          : "";
        response.faqcontent !== undefined
          ? $(".faqContent").append(response.faqcontent)
          : "";
        response.faqimage !== undefined
          ? $(".faqImage").append(response.faqimage)
          : "";
        response.marketreviewtitle !== undefined
          ? $(".marketReviewTitle").append(response.marketreviewtitle)
          : "";
        response.browsecategorytitle !== undefined
          ? $(".browseCategoryTitle").append(response.browsecategorytitle)
          : "";
        response.browsecategorybutton !== undefined
          ? $(".browseCategoryButton").append(response.browsecategorybutton)
          : "";
        // Desktop Browser categories
        if (
          response.browsecategorytab !== undefined &&
          response.browsecategorytab !== ""
        ) {
          var categories = response.browsecategorytab.split(",");
          $.each(categories, function (index, category) {
            category = category.trim(); // Remove any extra spaces
            if (
              response.outcome[category] != undefined &&
              response.outcome[category] !== ""
            ) {
              console.log(response.outcome[category]);
              console.log("-------------------------------");
              $(".tab-content #producttab-" + (index + 1)).append(
                response.outcome[category]
              );
            }
            if (category !== "" && response.outcome[category] != "") {
              var activeClass = index === 0 ? "active" : "";

              var liElement =
                '<li class="tab-selector">' +
                '<a class="d-flex mx-1 py-2 border border-primary rounded-pill ' +
                activeClass +
                '" data-bs-toggle="pill" href="#tab-' +
                (index + 1) +
                '">' +
                '<span class="fw-bold" style="width: 150px;">' +
                category +
                "</span>" +
                "</a>" +
                "</li>";
            }
            $(".browseCategoryTab").append(liElement);
          });
        }
        // Desktop Browser categories
        // Mobile Browser categories
        if (
          response.browsecategorytabmobile !== undefined &&
          response.browsecategorytabmobile !== ""
        ) {
          var mobilecategories = response.browsecategorytabmobile.split(",");
          $.each(mobilecategories, function (index, mobilecategories) {
            category = mobilecategories.trim(); // Remove any extra spaces
            if (category !== "" && response.outcome[category] != "") {
              var MobileliElement =
                "<li>" +
                '<a class="dropdown-item nav-link" data-bs-toggle="pill" href="#tab-' +
                (index + 1) +
                '">' +
                category +
                "</a>" +
                "</li>";
              $(
                '.browsecategorytab-mobile a[ href="#tab-' + (index + 1) + '"]'
              ).removeClass("d-none");
              $(
                '.browsecategorytab-mobile a[ href="#tab-' + (index + 1) + '"]'
              ).html(category);
            }
          });
        }
        // Mobile Browser categories
      }
    },
    error: function (xhr, status, error) {
      console.error("Error occurred:", error);
    },
  });
}


function getcollection(id){
  $.ajax({
    url: "../client1/ajax_call.php",
    type: "POST",
    dataType: "json",
    data: { routine_name: "market_collection", id: id }, 
    success: function(response) {
      var response = JSON.parse(response);
      console.log(response);
      if (response.data === 'success') {
        $('#getcollection').html(response.outcome);
      }
    },
  }); 
}

function getcustomer(id){
  $.ajax({
    url: "../client1/ajax_call.php",
    type: "POST",
    dataType: "json",
    data: { routine_name: "customer", id: id }, 
    success: function(response) {
      var response = JSON.parse(response);
      console.log(response);
      if (response.data === 'success') {
        $('#customer').html(response.outcome);
      }
    },
  }); 
}
function getcatelog(id) {
  $.ajax({
    url: "../client1/ajax_call.php",
    type: "POST",
    dataType: "json",
    data: { routine_name: "catlog", id: id },
    success: function(response) {
      console.log("slider............ ");
      var response = JSON.parse(response);
      if (response.data === 'success') {
        $('#catlog').html(response.outcome);
        var swiper = new Swiper('.mySwiper', {
          slidesPerView: 3,
          spaceBetween: 10,
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          loop: true,
        });
      }
    }
  });
}



function latestbanner() {
  loadData("bannershow", "getdata");
}

function famousmarket() {
  loadData("famousmarketshow", "getmarket");
}
function offersshow() {
  loadData("offershow", "getoffer");
}
function paragraphs() {
  loadData("paragraphshow", "getparagraph");
}
function videos() {
  loadData("videoshow", "getvideo");
}
function allfaq(){
  loadData("allFAQshow","allfaq");
}
function allfem_market(){
  loadData("allfamousmarketshow","allfems")
}
function allmarkets(){
  loadData("allmarket","allmarketdata")
}
function FAQshow() {
  loadData("FAQshow", "accordionExample");
}
function reviewshow() {
  loadData("reviewshow", "getreview");
}
function productshowclientside() {
  loadData("productshowclientside", "getproduct");
  // loadData("productshowclientside", "categoryProduct");
}
function marketlistshowclientside() {
  loadData("marketlistshowclientside", "get");
}
function marketlist2showclientside() {
  loadData("marketlist2showclientside", "get_market");
}
function collection(){
  loadData("market_collection","getcollection")
}
function marketlist3showclientside() {
  loadData("marketlist3showclientside", "get_market_next");
}
