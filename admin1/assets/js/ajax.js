"use strict";
var CLS_LOADER = '<svg viewBox="0 0 20 20" class="Polaris-Spinner Polaris-Spinner--colorInkLightest Polaris-Spinner--sizeSmall" aria-label="Loading" role="status"><path d="M7.229 1.173a9.25 9.25 0 1 0 11.655 11.412 1.25 1.25 0 1 0-2.4-.698 6.75 6.75 0 1 1-8.506-8.329 1.25 1.25 0 1 0-.75-2.385z"></path></svg>';
var CLS_DELETE = '<svg class="Polaris-Icon__Svg" viewBox="0 0 20 20"><path d="M16 6a1 1 0 1 1 0 2h-1v9a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V8H4a1 1 0 1 1 0-2h12zM9 4a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2H9zm2 12h2V8h-2v8zm-4 0h2V8H7v8z" fill="#000" fill-rule="evenodd"></path></svg>';
var CLS_MINUS = '<svg class="Polaris-Icon__Svg" viewBox="0 0 80 80" focusable="false" aria-hidden="true"><path d="M39.769,0C17.8,0,0,17.8,0,39.768c0,21.956,17.8,39.768,39.769,39.768   c21.965,0,39.768-17.812,39.768-39.768C79.536,17.8,61.733,0,39.769,0z M13.261,45.07V34.466h53.014V45.07H13.261z" fill-rule="evenodd" fill="#DE3618"></path></svg>';
var CLS_PLUS = '<svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M17 9h-6V3a1 1 0 1 0-2 0v6H3a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2" fill-rule="evenodd"></path></svg>';
var CLS_CIRCLE_MINUS = '<svg class="Polaris-Icon__Svg" viewBox="0 0 80 80" focusable="false" aria-hidden="true"><path d="M39.769,0C17.8,0,0,17.8,0,39.768c0,21.956,17.8,39.768,39.769,39.768   c21.965,0,39.768-17.812,39.768-39.768C79.536,17.8,61.733,0,39.769,0z M13.261,45.07V34.466h53.014V45.07H13.261z" fill-rule="evenodd" fill="#DE3618"></path></svg>';
var CLS_CIRCLE_PLUS = '<svg class="Polaris-Icon__Svg" viewBox="0 0 510 510" focusable="false" aria-hidden="true"><path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M382.5,280.5h-102v102h-51v-102    h-102v-51h102v-102h51v102h102V280.5z" fill-rule="evenodd" fill="#3f4eae"></path></svg>';

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    cname = (cname != undefined) ? cname : 'flash_message';
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) { 
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function flashNotice($message, $class) {
    $class = ($class != undefined) ? $class : '';
    
    var flashmessageHtml = '<div class="inline-flash-wrapper animated bounceInUp inline-flash-wrapper--is-visible ourFlashmessage"><div class="inline-flash ' + $class + '  "><p class="inline-flash__message">' + $message + '</p></div></div>';
    
    if ($('.ourFlashmessage').length) {
        $('.ourFlashmessage').remove();
    }
    $("body").append(flashmessageHtml);
    
    setTimeout(function () {
        if ($('.ourFlashmessage').length) {
            $('.ourFlashmessage').remove();
        }
    }, 3000);
}

function changeTab(evt, id) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("Polaris-Tabs_tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("Polaris-Tabs__Tab");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("Polaris-Tabs__Tab--selected", "");
    }
    document.getElementById(id).style.display = "block";
    evt.currentTarget.className += " Polaris-Tabs__Tab--selected";
}

function loading_show($selector) {
    $($selector).addClass("loading").html('<i class="fas fa-circle-notch fa-spin"></i>').fadeIn('fast').attr('disabled', 'disabled');
}

function loading_hide($selector, $buttonName, $buttonIcon) {
  if ($buttonIcon != undefined) {
    console.log("IN IF");
    $buttonIcon = '<i class="fas fa-circle-notch fa-spin"></i>'
    } else {
    console.log("else");
      $buttonIcon = 'Save'
  }
  $($selector).removeClass("loading").html($buttonIcon).removeAttr("disabled");
}


function table_loader(selector, colSpan) {
    $(selector).html('<tr><td colspan="' + colSpan + '" style="text-align:center;"><div class="loader-spinner"><svg viewBox="0 0 44 44" class="Polaris-Spinner Polaris-Spinner--colorTeal Polaris-Spinner--sizeLarge" role="status"><path d="M15.542 1.487A21.507 21.507 0 0 0 .5 22c0 11.874 9.626 21.5 21.5 21.5 9.847 0 18.364-6.675 20.809-16.072a1.5 1.5 0 0 0-2.904-.756C37.803 34.755 30.473 40.5 22 40.5 11.783 40.5 3.5 32.217 3.5 22c0-8.137 5.3-15.247 12.942-17.65a1.5 1.5 0 1 0-.9-2.863z"></path></svg></div></td></tr>')
}

function redirect403() {
    window.location = "https://www.shopify.com/admin/apps";
}

var loadShopifyAJAX= null;
var js_loadShopifyDATA = function js_loadShopifyDATA(listingID, pageno) {
    if (loadShopifyAJAX && loadShopifyAJAX.readyState != 4) {
        loadShopifyAJAX.abort();
    }
    var searchKEY = $("#" + listingID + "SearchKeyword").val();
    var searchKEYLEN = (searchKEY != undefined) ? searchKEY.length : 0;
    if (searchKEYLEN == 0 || searchKEYLEN >= 3) {
        var shopifyApi = $('#' + listingID).attr('data-apiName');  
        var limit = $("#" + listingID + "limit").val();
        var from = $('#' + listingID).data('from');
        var routineNAME = 'take_' + from + '_shopify_data';
        var fields = $('#' + listingID).attr('data-fields');
        fields = (fields != undefined) ? fields : '*';
        var searchFields = $('#' + listingID).attr('data-search');
        pageno = (pageno != undefined) ? pageno : 1;
        loadShopifyAJAX = $.ajax({  
            url: "ajax_call.php",
            type: "post",
            dataType: "json",
            data: {
                routine_name: routineNAME,
                shopify_api: shopifyApi,
                fields: fields,
                store: store,
                limit: limit,
                pageno: pageno,
                search_key: searchKEY,
                listing_id: listingID,
                search_fields: searchFields,
                pagination_method: js_loadShopifyDATA.name
            }, 
            beforeSend: function () {
                var listingTH = $('#' + listingID + ' thead tr th').length;
                table_loader("table#" + listingID + " tbody", listingTH);
            },  
            success:function(comeback){
                if (comeback['code'] != undefined && comeback['code'] == '403') {
                    redirect403();
                } else if (comeback['outcome'] == 'true') {
                    var tablehtml =  comeback['html'] !== undefined && comeback['html'] != '' ? comeback['html'] : '<td  colspan="10" class="nodata"> NO DATA FOUND </td>';
                    $('table#' + listingID + ' tbody').html(tablehtml);
                    $('#' + listingID + 'Pagination').html(comeback['pagination_html']);
                } else {
                }
            }
        });
    }
}
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
  var options = {
    damping: '0.5'
  }
  Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
// DEMO FUNCTION CALLING ON LOAD
function demo(){
    $.ajax({
        url: "../admin1/ajax_call.php",
        type: "post",
        dataType: "json",
        data: {"routine_name":"demo_function"},
        beforeSend: function () {
            // loading_show('save_loader_show');
        },
        success: function (response) {
            console.log(response);
            // loading_hide('save_loader_show', 'Save');
        }
    });
}


$(document).ready(function() {
    demo(); // CALLING ON LOAD FOR TESTING
    console.log("DOCUMENT READY ...");

    $('.signUpcancel').click(function(){
      $('#savesignup')[0].reset();
      $('.name').html('');
      $('.shop').html('');
      $('.address').html('');
      $('.phone_number').html('');
      $('.business_type').html('');
      $('.image').html('');
      $('.password').html('');
      $('.Confirm_Password').html('');
      $('.email').html('');
    });
    
    $(document).on("click",".signUpsave",function(e){
      e.preventDefault();   
      console.log("signUpsavebutton click");
      var form_data = $("#savesignup")[0]; 
      var form_data = new FormData(form_data);
      form_data.append('routine_name','insert_signup'); 
      $.ajax({
        url: "../admin1/ajax_call.php",
        type: "post",
        dataType: "json",
        contentType: false,
        processData: false,
        data: form_data, 
        beforeSend: function () {
             loading_show('.save_loader_show');
        },
        success: function (response) {
            console.log(response);
            var response = JSON.parse(response);
            console.log(response['msg']['name']);
            response["msg"]["name"] !== undefined ? $(".name").html (response["msg"]["name"]) : $(".name").html("");
            response["msg"]["shop"] !== undefined ? $(".shop").html (response["msg"]["shop"]) : $(".shop").html("");
            response["msg"]["address"] !== undefined ? $(".address").html (response["msg"]["address"]) : $(".address").html("");
            response["msg"]["phone_number"] !== undefined ? $(".phone_number").html (response["msg"]["phone_number"]) : $(".phone_number").html("");
            response["msg"]["business_type"] !== undefined ? $(".business_type").html (response["msg"]["business_type"]) : $(".business_type").html("");
            response["msg"]["image"] !== undefined ? $(".image").html (response["msg"]["image"]) : $(".image").html(""); 
            response["msg"]["password"] !== undefined ? $(".password").html (response["msg"]["password"]) : $(".password").html("");
            response["msg"]["Confirm_Password"] !== undefined ? $(".Confirm_Password").html (response["msg"]["Confirm_Password"]) : $(".Confirm_Password").html("");
            response["msg"]["email"] !== undefined ? $(".email").html (response["msg"]["email"]) : $(".email").html("");
            loading_hide('.save_loader_show', 'Save');
            if(response['data'] == "success"){
              $("#savesignup")[0].reset();
             
            }
            if (response.data === "success") {
              showMessage(response.msg, "success");
          } 
        }
    });

    })

    function showMessage(msg, type) {
      var alertClass = (type === "success") ? "success" : "error";
      var messageHtml = '<div class="alert ' + alertClass + '">' + msg + '</div>';
      $("#success_message").html(messageHtml);
      $("#success_message").fadeIn().delay(5000).fadeOut(1000, function() {
        $(this).remove();
    });
     
    }
  

    $('.pform_reset').click(function(){
      $('#productinsert')[0].reset();
      $('.pname').html('');
      $('.select_catagory').html('');
      $('.p_price').html('');
      $('.p_image').html('');
      $('.p_tag').html('');
      $('.p_description').html('');
    });
    
    $(document).on("click",".productSave",function(event){
      event.preventDefault();
      console.log("Product save button click");
      var form_data = $("#productinsert")[0];
      var form_data = new FormData(form_data);
      form_data.append('routine_name','insert_products'); 
      $.ajax({
        url: "../admin1/ajax_call.php",
        type: "post",
        dataType: "json",
        contentType: false,
        processData: false,
        data: form_data, 
        beforeSend: function () {
             loading_show('.save_loader_show');
        },
        success: function (response) {
          console.log(response);
          var response = JSON.parse(response);
          loading_hide('.save_loader_show', 'Save');
             response["msg"]["pname"] !== undefined ? $(".pname").html (response["msg"]["pname"]) : $(".pname").html("");
             response["msg"]["select_catagory"] !== undefined ? $(".select_catagory").html (response["msg"]["select_catagory"]) : $(".select_catagory").html("");
             response["msg"]["p_price"] !== undefined ? $(".p_price").html (response["msg"]["p_price"]) : $(".p_price").html("");
             response["msg"]["p_image"] !== undefined ? $(".p_image").html (response["msg"]["p_image"]) : $(".p_image").html("");
             response["msg"]["p_tag"] !== undefined ? $(".p_tag").html (response["msg"]["p_tag"]) : $(".p_tag").html("");
             response["msg"]["p_description"] !== undefined ? $(".p_description").html (response["msg"]["p_description"]) : $(".p_description").html("");
             if(response['data'] == "success"){
              $("#productinsert")[0].reset();
            }
            if (response.data === "success") {
              showMessage(response.msg, "success");
          } 
      }
    });
    })

    function showMessage(msg, type) {
      var alertClass = (type === "success") ? "success" : "error";
      var messageHtml = '<div class="alert ' + alertClass + '">' + msg + '</div>';
      $("#success_message").html(messageHtml);
      $("#success_message").fadeIn().delay(5000).fadeOut(1000, function() {
        $(this).remove();
    });
     
    }

    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
    
	  CKEDITOR.replace('myeditor');
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
   
});