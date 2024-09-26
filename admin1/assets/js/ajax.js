"use strict";
var CLS_LOADER =
  '<svg viewBox="0 0 20 20" class="Polaris-Spinner Polaris-Spinner--colorInkLightest Polaris-Spinner--sizeSmall" aria-label="Loading" role="status"><path d="M7.229 1.173a9.25 9.25 0 1 0 11.655 11.412 1.25 1.25 0 1 0-2.4-.698 6.75 6.75 0 1 1-8.506-8.329 1.25 1.25 0 1 0-.75-2.385z"></path></svg>';
var CLS_DELETE =
  '<svg class="Polaris-Icon__Svg" viewBox="0 0 20 20"><path d="M16 6a1 1 0 1 1 0 2h-1v9a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V8H4a1 1 0 1 1 0-2h12zM9 4a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2H9zm2 12h2V8h-2v8zm-4 0h2V8H7v8z" fill="#000" fill-rule="evenodd"></path></svg>';
var CLS_MINUS =
  '<svg class="Polaris-Icon__Svg" viewBox="0 0 80 80" focusable="false" aria-hidden="true"><path d="M39.769,0C17.8,0,0,17.8,0,39.768c0,21.956,17.8,39.768,39.769,39.768   c21.965,0,39.768-17.812,39.768-39.768C79.536,17.8,61.733,0,39.769,0z M13.261,45.07V34.466h53.014V45.07H13.261z" fill-rule="evenodd" fill="#DE3618"></path></svg>';
var CLS_PLUS =
  '<svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M17 9h-6V3a1 1 0 1 0-2 0v6H3a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2" fill-rule="evenodd"></path></svg>';
var CLS_CIRCLE_MINUS =
  '<svg class="Polaris-Icon__Svg" viewBox="0 0 80 80" focusable="false" aria-hidden="true"><path d="M39.769,0C17.8,0,0,17.8,0,39.768c0,21.956,17.8,39.768,39.769,39.768   c21.965,0,39.768-17.812,39.768-39.768C79.536,17.8,61.733,0,39.769,0z M13.261,45.07V34.466h53.014V45.07H13.261z" fill-rule="evenodd" fill="#DE3618"></path></svg>';
var CLS_CIRCLE_PLUS =
  '<svg class="Polaris-Icon__Svg" viewBox="0 0 510 510" focusable="false" aria-hidden="true"><path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M382.5,280.5h-102v102h-51v-102    h-102v-51h102v-102h51v102h102V280.5z" fill-rule="evenodd" fill="#3f4eae"></path></svg>';

function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  cname = cname != undefined ? cname : "flash_message";
  var name = cname + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

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
    $buttonIcon = "Save";
  }
  $($selector).removeClass("loading").html($buttonIcon).removeAttr("disabled");
}

function redirect403() {
  window.location = "https://www.shopify.com/admin/apps";
}

function check_toggle_status() {
  var table_name = $("#toggleStatus").val();
  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "check_toggle_status", table_name: table_name },
    beforeSend: function () {},
    success: function (response) {
      var response = JSON.parse(response);
      if (response["outcome"] !== undefined) {
        var check_status = response["outcome"]["status"];
        if (check_status == 1) {
          $("#flexSwitchCheckDefault").prop("checked", true);
        } else {
          $("#flexSwitchCheckDefault").prop("checked", false);
        }
      } else {
        console.log("Something went wrong");
      }
    },
  });
}

function loadData(routineName) {
  console.log(routineName + " on load");
  $.ajax({
    url: "../admin1/ajax_call.php", // Your PHP script URL
    type: "post",
    dataType: "json",
    data: { routine_name: routineName },
    success: function (response) {
      var response = JSON.parse(response);
      console.log(response);
      console.log("Sending routine_name:", routineName);
      
      if (response.outcome === "No data found") {
        $("#getdata").html(
          '<div class="notdata">' +  
            '<img style="height:100px; width:100px;" src="assets/img/noimg.gif">' +
            '<br></div>'
        );
      } else {
        console.log("Data found");
        $("#getdata").html(response.outcome);
        if (response.pagination != "") {
          $("#pagination").html(response.pagination);
        }
        check_toggle_status();
        check_toggle_btn();
      }
    },
  });
}


function listgallary() {
  loadData("listgallary");
}

function listproduct() {
  console.log("product function called");
  loadData("productlisting");
}

function listcustomer() {
  console.log("customerlist function called");
  loadData("customerlisting");
}

function listblog() {
  loadData("bloglisting");
}
function listinvoice(){
  loadData("invoicelisting");
}

function offerlist() {
  loadData("offerlisting");
}

function listvideo() {
  loadData("videolisting");
}
function allvideo(){
  loadData("allvideolisting")
}

function listbrousetextile() {
  loadData("brousetextilelisting");
}

function listFAQ() {
  loadData("FAQlisting");
}

function listparagraph() {
  loadData("paragraphlisting");
}

function listproductprofile() {
  // not in use
  loadData("profileproductlisting");
}

function listbanner() {
  loadData("bannerlisting");
}

function listfamousmarket() {
  // not in use
  loadData("famousmarketlisting");
}

function listreview() {
  loadData("reviewlisting");
}

function profileLoadData(routineName) {
  console.log(routineName + " on load");
  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: routineName },
    success: function (response) {
      var response = JSON.parse(response);
      console.log(response);
      if (response.outcome === "No data found") {
        // $("#" + elementId).html('<div style="color: red; text-align: center;">' + response.outcome + '</div>');
      } else {
        response["profiledata"]["name"] !== undefined
          ? $("input[name='name']").val(response["profiledata"]["name"])
          : "";
        response["profiledata"]["shop"] !== undefined
          ? $("input[name='shop']").val(response["profiledata"]["shop"])
          : "";
        response["profiledata"]["phone_number"] !== undefined
          ? $("input[name='phone_number']").val(
              response["profiledata"]["phone_number"]
            )
          : "";
        response["profiledata"]["business_type"] !== undefined
          ? $("select[name='business_type']")
              .val(response["profiledata"]["business_type"])
              .change()
          : "";
        response["profiledata"]["address"] !== undefined
          ? $("input[name='address']").val(response["profiledata"]["address"])
          : "";

        response["outcome"]["profile_deatils"] !== undefined
          ? $("#getdataa").html(response["outcome"]["profile_deatils"])
          : $("#getdataa").html("");
        response["outcome"]["deatils"] !== undefined
          ? $("#img").html(response["outcome"]["deatils"])
          : $("#img").html("");
        response["outcome"]["logo"] !== undefined
          ? $("#profile_data").append(response["outcome"]["logo"])
          : $("#profile_data").html("");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error occurred:", error);
    },
  });
}

function listprofile() {
  profileLoadData("listprofile");
}

var loadShopifyAJAX = null;
var js_loadShopifyDATA = function js_loadShopifyDATA(listingID, pageno) {
  if (loadShopifyAJAX && loadShopifyAJAX.readyState != 4) {
    loadShopifyAJAX.abort();
  }
  var searchKEY = $("#" + listingID + "SearchKeyword").val();
  var searchKEYLEN = searchKEY != undefined ? searchKEY.length : 0;
  if (searchKEYLEN == 0 || searchKEYLEN >= 3) {
    var shopifyApi = $("#" + listingID).attr("data-apiName");
    var limit = $("#" + listingID + "limit").val();
    var from = $("#" + listingID).data("from");
    var routineNAME = "take_" + from + "_shopify_data";
    var fields = $("#" + listingID).attr("data-fields");
    fields = fields != undefined ? fields : "*";
    var searchFields = $("#" + listingID).attr("data-search");
    pageno = pageno != undefined ? pageno : 1;
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
        pagination_method: js_loadShopifyDATA.name,
      },
      beforeSend: function () {
        var listingTH = $("#" + listingID + " thead tr th").length;
        table_loader("table#" + listingID + " tbody", listingTH);
      },
      success: function (comeback) {
        if (comeback["code"] != undefined && comeback["code"] == "403") {
          redirect403();
        } else if (comeback["outcome"] == "true") {
          var tablehtml =
            comeback["html"] !== undefined && comeback["html"] != ""
              ? comeback["html"]
              : '<td  colspan="10" class="nodata"> NO DATA FOUND </td>';
          $("table#" + listingID + " tbody").html(tablehtml);
          $("#" + listingID + "Pagination").html(comeback["pagination_html"]);
        } else {
        }
      },
    });
  }
};

function demo() {
  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "demo_function" },
    beforeSend: function () {},
    success: function (response) {
      console.log(response);
    },
  });
}

function get_product(id) {
  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "getproduct", id: id },
    success: function (response) {
      var response = JSON.parse(response);
      console.log(response);
      if (response.outcome !== "" && response.outcome !== undefined) {
        response["outcome"]["title"] !== undefined
          ? $("input[name='pname']").val(response["outcome"]["title"])
          : "";

        if (p_image != "") {
          $(".pro-zone__prompt").html("");
          var imagePreview =
            '<div class="drop-zone__thumb"><img src="../admin1/assets/img/product_img/' +
            p_image +
            // '" class="picture__img"/><button class="close-button d-none">x</button></div>';
            $(".pro-zone").append(imagePreview);

          response["outcome"]["category"] !== undefined
            ? $("select[name='select_catagory']")
                .val(response["outcome"]["category"])
                .change()
            : "";
          response["outcome"]["qty"] !== undefined
            ? $("input[name='qty']").val(response["outcome"]["qty"])
            : "";
          response["outcome"]["sku"] !== undefined
            ? $("input[name='sku']").val(response["outcome"]["sku"])
            : "";
          response["outcome"]["minprice"] !== undefined
            ? $("input[name='min_price']").val(response["outcome"]["minprice"])
            : "";
          response["outcome"]["maxprice"] !== undefined
            ? $("input[name='max_price']").val(response["outcome"]["maxprice"])
            : "";
          response["outcome"]["product_img_alt"] !== undefined
            ? $("input[name='image_alt']").val(
                response["outcome"]["product_img_alt"]
              )
            : "";
          response["outcome"]["p_tag"] !== undefined
            ? $("select[name='p_tag']")
                .val(response["outcome"]["p_tag"])
                .change()
            : "";
          response["outcome"]["p_description"] !== undefined
            ? $("textarea[name='p_description']").val(
                response["outcome"]["p_description"]
              )
            : "";
          var p_image =
            response["outcome"]["p_image"] !== undefined
              ? response["outcome"]["p_image"]
              : "";
          if (p_image != "") {
            $(".drop-zone__prompt").html("");
            var imagePreview =
              '<div class="drop-zone__thumb"><img src="../admin1/assets/img/product_img/' +
              p_image +
              '" class="picture__img"/><button class="close-button d-none">x</button></div>';
            $(".drop-zone").append(imagePreview);
          }
        }
      }
    },
  });
}
  function get_invoice(id) {
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      data: { routine_name: "getinvoice", id: id },
      success: function (response) {
        var response = JSON.parse(response);
        // console.log(response);
        // console.log("i_name:", response.outcome.i_name);
        // console.log("ship_to:", response.outcome.ship_to);
        // console.log("bill_no:", response.outcome.bill_no);
        // console.log("total:", response.outcome.total);
        // console.log(response.outcome.date);
        // console.log(response.outcome.balance_due);



        response["outcome"]["i_name"] !== undefined
        ? $("textarea[name='i_name']").val(response["outcome"]["i_name"])
        : "";
          response["outcome"]["bill_no"] !== undefined
          ? $("textarea[name='bill_no']").val(response["outcome"]["bill_no"])
          : "";
          
          response["outcome"]["ship_to"] !== undefined
          ? $("textarea[name='ship_to']").val(response["outcome"]["ship_to"])
          : "";
          response["outcome"]["terms"] !== undefined
          ? $("input[name='terms']").val(response["outcome"]["terms"])
          : "";
          response["outcome"]["due_date"] !== undefined
          ? $("input[name='due_date']").val(response["outcome"]["due_date"])
          : "";
          
          response["outcome"]["po_number"] !== undefined
          ? $("input[name='po_number']").val(response["outcome"]["po_number"])
          : "";
          response["outcome"]["total"] !== undefined
          ? $("input[name='total']").val(response["outcome"]["total"])
          : "";
          response["outcome"]["amount_paid"] !== undefined
          ? $("input[name='amount_paid']").val(response["outcome"]["amount_paid"])
          : "";
          response["outcome"]["balance_due"] !== undefined
          ? $("input[name='balance_due']").val(response["outcome"]["balance_due"])
          : "";
        var i_image =
          response["outcome"]["i_image"] !== undefined
            ? response["outcome"]["i_image"]
            : "";
        if (i_image != "") {
          $(".drop-zone__prompt").html("");
          var imagePreview =
            '<div class="drop-zone__thumb"><img src="../admin1/assets/img/invoice_img/' +
            i_image +
            '" class="picture__img"/><button class="close-button d-none">x</button></div>';
          $(".drop-zone").append(imagePreview);
        }
        response["outcome"]["body"] !== undefined
          ? CKEDITOR.instances.myeditor.setData(response["outcome"]["body"])
          : "";
      },
    });
  }


function get_customer(id) {
  var routine_name = "getcustomer";
  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: routine_name, id: id },
    success: function (response) {
      console.log("Response received:");
      console.log(response);
      var response = JSON.parse(response);
      response["outcome"]["name"] !== undefined
        ? $("input[name='name']").val(response["outcome"]["name"])
        : "";
      response["outcome"]["email"] !== undefined
        ? $("input[name='email']").val(response["outcome"]["email"])
        : "";
      response["outcome"]["contact"] !== undefined
        ? $("input[name='contact']").val(response["outcome"]["contact"])
        : "";
      console.log($("input[name='address']"));
      response["outcome"]["address"] !== undefined
        ? $("textarea[name='address']").val(response["outcome"]["address"])
        : "";
      var c_image =
        response["outcome"]["c_image"] !== undefined
          ? response["outcome"]["c_image"]
          : "";
      if (c_image != "") {
        $(".drop-zone__prompts").html("");
        var imagePreview =
          '<div class="drop-zone__thumb"><img src="../admin1/assets/img/customer/' +
          c_image +
          '" class="picture__img"/><button class="close-button d-none">x</button></div>';
        $(".drop-zone").append(imagePreview);
      }
    },
  });
}

function get_blog(id) {
  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "getblog", id: id },
    success: function (response) {
      var response = JSON.parse(response);
      console.log(response);

      response["outcome"]["title"] !== undefined
        ? $("input[name='blog_title']").val(response["outcome"]["title"])
        : "";
      response["outcome"]["category"] !== undefined
        ? $("select[name='blog_category']")
            .val(response["outcome"]["category"])
            .change()
        : "";
      response["outcome"]["author_name"] !== undefined
        ? $("input[name='author_name']").val(response["outcome"]["author_name"])
        : "";
      response["outcome"]["blog_img_alt"] !== undefined
        ? $("input[name='blog_image_alt']").val(
            response["outcome"]["blog_img_alt"]
          )
        : "";
      var image =
        response["outcome"]["image"] !== undefined
          ? response["outcome"]["image"]
          : "";
      if (image != "") {
        $(".drop-zone__prompt").html("");
        var imagePreview =
          '<div class="drop-zone__thumb"><img src="../admin1/assets/img/blog_img/' +
          image +
          '" class="picture__img"/><button class="close-button d-none">x</button></div>';
        $(".drop-zone").append(imagePreview);
      }
      response["outcome"]["body"] !== undefined
        ? CKEDITOR.instances.myeditor.setData(response["outcome"]["body"])
        : "";
    },
  });
}

function activeSidebarMenu() {
  var path = window.location.pathname;
  var page = path.split("/").pop();
  $(".nav-link").removeClass("active");
  $(".nav-item").each(function () {
    var href = $(this).find(".nav-link").attr("href");
    if (typeof href !== "undefined") {
      var pagehref = href.split("/").pop();
      if (page === pagehref) {
        $(this).find(".nav-link").addClass("active");
      }
    }
  });
  $(".dropdown-container .nav-link").each(function () {
    var href = $(this).attr("href");
    if (typeof href !== "undefined") {
      var pagehref = href.split("/").pop();
      if (page === pagehref) {
        $(".dropdown-container").css("display", "block");
        $(this).addClass("active");
      }
    }
  });
}

function get_Categories() {
  console.log("CAtegories");
  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "get_categories" },
    beforeSend: function () {},
    success: function (response) {
      var response = JSON.parse(response);
      if (response["data"] == "success") {
        if (response["outcome"] !== undefined) {
          $("select[name=categories],select[name=select_catagory]").append(
            response["outcome"]
          );
          // var categories = response["outcome"].split(",");
          // $.each(categories, function (index, category) {
          //   category = category.trim(); // Remove any extra spaces
          //   if (category !== "") {
          //     var CategoriesHtml =
          //       "<option value='" + (index + 1) + "'>" + category + "</option>";
          //     console.log(CategoriesHtml);
          //     $("select[name=categories],select[name=select_catagory]").append(
          //       CategoriesHtml
          //     );
          //   }
          // });
        }
      } else {
        console.log("Something went wrong");
      }
    },
  });
}

function select_shop() {
  console.log("select shop");
  $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      data: { routine_name: "select_shop" },
      beforeSend: function () {
         
      },
      success: function (response) {
        var response = JSON.parse(response);
          console.log("Response:", response); 
          if (response.data === "success") {
              if (Array.isArray(response.outcome)) {
                  $("#mySelect").empty().append('<option selected value="">Select Shop</option>');
                  $.each(response.outcome, function (index, shop) {
                      var userId = shop.user_id; 
                      var shopName = shop.shop.trim(); 

                      if (shopName) {
                          var optionHtml = "<option value='" + userId + "'>" + shopName + "</option>";
                          console.log(optionHtml); 
                          $("#mySelect").append(optionHtml); 
                      }
                  });
              }
          } else {
              console.log("Something went wrong");
          }
      },
      error: function (xhr, status, error) {
          console.log("AJAX Error: " + status + ": " + error);
      }
  });
}



$(document).ready(function () {
  console.log("DOCUMENT READY ...");
  activeSidebarMenu();

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

  if ($("textarea#myeditor").length > 0) {
    CKEDITOR.replace("myeditor");
  }

  $(".validtext").on("input", function () {
    var c = this.selectionStart,
      r = /[^a-zA-Z\s']/g,
      v = $(this).val();
    if (r.test(v)) {
      $(this).val(v.replace(r, ""));
      c--;
    }
    this.setSelectionRange(c, c);
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

  $(".signImage").on("input change", function () {
    $(this).siblings(".imageError").text("");
  });

  $(".validtext").on("keypress", function () {
    $(this).next(".errormsg").text("");
  });

  $(".validsignf").on("keypress", function () {
    $(this).next(".errormsg").text("");
  });

  $(".number").on("keypress", function (e) {
    if (e.which >= 48 && e.which <= 57) {
      $(this).next(".errormsg").text("");
    } else {
      e.preventDefault();
    }
  });

  $(".validurl").on("keypress", function () {
    $(this).next(".errormsg").text("");
  });

  $(".price").on("keypress", function (e) {
    if (e.which >= 48 && e.which <= 57) {
      $(this).next(".errormsg").text("");
    } else {
      e.preventDefault();
    }
  });

  if (CKEDITOR.instances["myeditor"]) {
    CKEDITOR.instances["myeditor"].on("change", function () {
      if (CKEDITOR.instances["myeditor"].getData().length > 0) {
        $(".myeditor").html("");
      }
    });
  }

  $(".form-select").on("input change", function () {
    $(this).siblings(".errormsg").text("");
  });

  $(".formCancel").click(function () {
    console.log("CCCCC");
    $(".errormsg").html("");
    $(".multiple_tag").val(null).trigger("change");
    $(this).closest("form")[0].reset();
    if (CKEDITOR.instances["myeditor"]) {
      CKEDITOR.instances["myeditor"].setData("");
    }
    var $thumbnailElement = $(".drop-zone__thumb");
    if ($thumbnailElement.length > 0) {
      $thumbnailElement.html("");
      $thumbnailElement.removeClass("drop-zone__thumb");
      $thumbnailElement.html(
        '<span class="drop-zone__prompt">Drop file here or click to upload</span>'
      );
    }
  });

  function resetThumbnail() {
    var $thumbnailElement = $(".drop-zone__thumb");
    if ($thumbnailElement.length > 0) {
      $thumbnailElement.html("");
      $thumbnailElement.removeClass("drop-zone__thumb");
      $thumbnailElement.html(
        '<span class="drop-zone__prompt">Drop file here or click to upload</span>'
      );
    }
  }

  $(document).on("click", ".signInsave", function (e) {
    e.preventDefault();
    var form_data = $("#savesignin")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_signin");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Sign in");
        if (response["data"] == "success") {
          $("#savesignin")[0].reset();
          window.location.href = "analytics.php";
        } else {
          response["msg"]["password"] !== undefined
            ? $(".password").html(response["msg"]["password"])
            : $(".password").html("");
          response["msg"]["email"] !== undefined
            ? $(".email").html(response["msg"]["email"])
            : $(".email").html("");
          response["msg"]["errormsg"] !== undefined
            ? $(".error-msg").html(response["msg"]["errormsg"])
            : $(".error-msg").html("");
        }
      },
    });
  });

  $(document).on("keydown", "#savesignin input", function (event) {
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent default action
      $(".signInsave").click(); // Trigger the button click
    }
  });

  $(document).on("click", ".profileDataUpdate", function (e) {
    var form_data = $("#profileUpdate")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "profile_updatedata");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        response["msg"]["name"] !== undefined
          ? $(".name").html(response["msg"]["name"])
          : $(".name").html("");
        response["msg"]["shop"] !== undefined
          ? $(".shop").html(response["msg"]["shop"])
          : $(".shop").html("");
        response["msg"]["address"] !== undefined
          ? $(".address").html(response["msg"]["address"])
          : $(".address").html("");
        response["msg"]["phone_number"] !== undefined
          ? $(".phone_number").html(response["msg"]["phone_number"])
          : $(".phone_number").html("");
        response["msg"]["business_type"] !== undefined
          ? $(".business_type").html(response["msg"]["business_type"])
          : $(".business_type").html("");
        loading_hide(".save_loader_show", "SIGN UP");
        if (response["data"] == "success") {
          showMessage(response.msg, "success");
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".signUpsave", function (e) {
    e.preventDefault();
    console.log("signUpsavebutton click");
    var form_data = $("#savesignup")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_signup");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        response["msg"]["name"] !== undefined
          ? $(".name").html(response["msg"]["name"])
          : $(".name").html("");
        response["msg"]["shop"] !== undefined
          ? $(".shop").html(response["msg"]["shop"])
          : $(".shop").html("");
        response["msg"]["address"] !== undefined
          ? $(".address").html(response["msg"]["address"])
          : $(".address").html("");
          response["msg"]["shop_img"] !== undefined
          ? $(".shop_img").html(response["msg"]["shop_img"])
          : $(".shop_img").html("");
          response["msg"]["shop_logo"] !== undefined
          ? $(".shop_logo").html(response["msg"]["shop_logo"])
          : $(".shop_logo").html("");

        response["msg"]["phone_number"] !== undefined
          ? $(".phone_number").html(response["msg"]["phone_number"])
          : $(".phone_number").html("");
        response["msg"]["business_type"] !== undefined
          ? $(".business_type").html(response["msg"]["business_type"])
          : $(".business_type").html("");
        response["msg"]["image"] !== undefined
          ? $(".image").html(response["msg"]["image"])
          : $(".image").html("");
        response["msg"]["password"] !== undefined
          ? $(".password").html(response["msg"]["password"])
          : $(".password").html("");
        response["msg"]["Confirm_Password"] !== undefined
          ? $(".Confirm_Password").html(response["msg"]["Confirm_Password"])
          : $(".Confirm_Password").html("");
        response["msg"]["email"] !== undefined
          ? $(".email").html(response["msg"]["email"])
          : $(".email").html("");
        loading_hide(".save_loader_show", "SIGN UP");
        if (response["data"] == "success") {
          $("#savesignup")[0].reset();
          window.location.href = "analytics.php";
        } else {
          // showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("keydown", "#savesignin input", function (event) {
    console.log("KEYDOWN");
    console.log(event.key);
    if (event.key === "Enter") {
      event.preventDefault(); // Prevent default action
      $(".signUpsave").click(); // Trigger the button click
    }
  });

  $(document).on("click", ".productSave", function (event) {
    event.preventDefault();
    console.log("Product save button click");
    var form_data = $("#productinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_products");
    var selectedTags = $(".multiple_tag").val();
    if (selectedTags !== null) {
      for (var i = 0; i < selectedTags.length; i++) {
        form_data.append("p_tag[]", selectedTags[i]);
      }
    }

    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["pname"] !== undefined
          ? $(".pname").html(response["msg"]["pname"])
          : $(".pname").html("");
        response["msg"]["select_catagory"] !== undefined
          ? $(".select_catagory").html(response["msg"]["select_catagory"])
          : $(".select_catagory").html("");
        response["msg"]["addcategory"] !== undefined
          ? $(".addcategory").html(response["msg"]["addcategory"])
          : $(".addcategory").html("");
        response["msg"]["min_price"] !== undefined
          ? $(".min_price").html(response["msg"]["min_price"])
          : $(".min_price").html("");
        response["msg"]["max_price"] !== undefined
          ? $(".max_price").html(response["msg"]["max_price"])
          : $(".max_price").html("");
        response["msg"]["p_image"] !== undefined
          ? $(".p_image").html(response["msg"]["p_image"])
          : $(".p_image").html("");
        response["msg"]["image_alt"] !== undefined
          ? $(".image_alt").html(response["msg"]["image_alt"])
          : $(".image_alt").html("");
        response["msg"]["sku"] !== undefined
          ? $(".sku").html(response["msg"]["sku"])
          : $(".sku").html("");
        response["msg"]["qty"] !== undefined
          ? $(".qty").html(response["msg"]["qty"])
          : $(".qty").html("");
        response["msg"]["p_tag"] !== undefined
          ? $(".p_tag").html(response["msg"]["p_tag"])
          : $(".p_tag").html("");
        response["msg"]["p_description"] !== undefined
          ? $(".p_description").html(response["msg"]["p_description"])
          : $(".p_description").html("");
        if (response["data"] == "success") {
          console.log(response);
          if (!response["updated_product_id"]) {
            $("#productinsert")[0].reset();
            resetThumbnail();
            $(".multiple_tag").val(null).trigger("change");
            $(".myFile").html("");
          } else {
            window.location.href = "product-list.php";
          }
          showMessage(response.msg, "success");
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });
  // custemer
  $(document).on("click", ".customersave", function (event) {
    event.preventDefault();
    console.log("customer click");
    var form_data = $("#custemer_frm")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "add_customer");
    $.ajax({
      url: "../admin1/ajax_call.php",
      method: "POST",
      dataType: "JSON",
      contentType: false,
      processData: false,
      data: form_data,
      success: function (data) {
        console.log(data);
        var response = JSON.parse(data);
        response["msg"]["name"] !== undefined
          ? $(".name").html(response["msg"]["name"])
          : $(".name").html("");
        response["msg"]["email"] !== undefined
          ? $(".email").html(response["msg"]["email"])
          : $(".email").html("");
        response["msg"]["contact"] !== undefined
          ? $(".contact").html(response["msg"]["contact"])
          : $(".contact").html("");
        response["msg"]["c_image"] !== undefined
          ? $(".c_image").html(response["msg"]["c_image"])
          : $(".c_image").html("");
        response["msg"]["address"] !== undefined
          ? $(".address").html(response["msg"]["address"])
          : $(".address").html("");
        if (response["data"] == "success") {
          console.log(response);
          console.log("Updated Customer ID:", response["updated_customer_id"]);
          if (!response["updated_customer_id"]) {
            $("#custemer_frm")[0].reset();
            resetThumbnail();
            $(".myFile").html("");
          } else {
            window.location.href = "customer_list.php";
          }
          showMessage(response.msg, "success");
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  // invoice
  $(document).on("click", ".invoice ", function (event) {
    event.preventDefault();
    console.log("invoice  button click");
    var form_data = $("#invoice_frm")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "invoice");

    $.ajax({
      url: "../admin1/ajax_call.php",
      method: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        response["msg"]["i_image"] !== undefined
          ? $(".i_image").html(response["msg"]["i_image"])
          : $(".i_image").html("");

        response["msg"]["i_name"] !== undefined
          ? $(".i_name").html(response["msg"]["i_name"])
          : $(".i_name").html("");

        response["msg"]["bill_no"] !== undefined
          ? $(".bill_no").html(response["msg"]["bill_no"])
          : $(".bill_no").html("");

        response["msg"]["ship_to"] !== undefined
          ? $(".ship_to").html(response["msg"]["ship_to"])
          : $(".ship_to").html("");

        response["msg"]["date"] !== undefined
          ? $(".date").html(response["msg"]["date"])
          : $(".date").html("");

        response["msg"]["terms"] !== undefined
          ? $(".terms").html(response["msg"]["terms"])
          : $(".terms").html("");

        response["msg"]["due_date"] !== undefined
          ? $(".due_date").html(response["msg"]["due_date"])
          : $(".due_date").html("");

        response["msg"]["po_number"] !== undefined
          ? $(".po_number").html(response["msg"]["po_number"])
          : $(".po_number").html("");

        response["msg"]["item"] !== undefined
          ? $(".item").html(response["msg"]["item"])
          : $(".item").html("");

        response["msg"]["quantity"] !== undefined
          ? $(".quantity").html(response["msg"]["quantity"])
          : $(".quantity").html("");

        response["msg"]["rate"] !== undefined
          ? $(".rate").html(response["msg"]["rate"])
          : $(".rate").html("");

        response["msg"]["amount"] !== undefined
          ? $(".amount").html(response["msg"]["amount"])
          : $(".amount").html("");

          if (response["data"] == "success") {
            console.log(response);
            console.log("Updated invoice ID:", response["update_invoice_id"]);
            if (!response["update_invoice_id"]) {
              $("#invoice_frm")[0].reset();
              resetThumbnail();
              $(".myFile").html("");
            } else {
              window.location.href = "invoice-list.php";
            }
            showMessage(response.msg, "success");
          } else {
            showMessage(response.msg_error, "fail");
          }
      },
    });
  });
  function confirmAndDelete(employeeId, routineName, type, onSuccess) {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        var data = { routine_name: routineName };
        if (type === "product") {
          data.product_id = employeeId;
        } else if (type === "blog") {
          data.blog_id = employeeId;
        } else if (type === "video") {
          data.video_id = employeeId;
        } else if (type === "banner") {
          data.banner_id = employeeId;
        } else if (type === "famous_market") {
          data.famous_market_id = employeeId;
        } else if (type === "b_textile_catagory") {
          data.b_textile_catagory_id = employeeId;
        } else if (type === "offer") {
          data.offer_id = employeeId;
        } else if (type === "faq") {
          data.faq_id = employeeId;
        } else if (type === "review") {
          data.marketreview_id = employeeId;
        } else if (type === "customer") {
          data.customer_id = employeeId;
        }else if(type ==="invoice"){
          data.invoice_id = employeeId;
        }
        $.ajax({
          url: "../admin1/ajax_call.php",
          type: "POST",
          dataType: "json",
          data: data,
          success: function (response) {
            var result = JSON.parse(response);
            if (result.data === "success") {
              Swal.fire("Deleted!", "Your record has been deleted.", "success");
              if (typeof onSuccess === "function") {
                onSuccess();
              }
            } else {
              Swal.fire(
                "Error!",
                "There was a problem deleting the record.",
                "error"
              );
            }
          },
          error: function () {
            Swal.fire(
              "Error!",
              "There was a problem with the server.",
              "error"
            );
          },
        });
      }
    });
  }

  $(document).delegate(".delete", "click", function () {
    var employeeId = $(this).attr("data-id");
    var deleteType = $(this).attr("data-delete-type");
    var deleteMapping = {
      product: { routine: "productdelete", callback: listproduct },
      invoice: { routine: "invoicedelete", callback: listinvoice },
      customer: { routine: "customerdelete", callback: listcustomer },
      blog: { routine: "blogdelete", callback: listblog },
      video: { routine: "videodelete", callback: listvideo },
      banner: { routine: "bannerdelete", callback: listbanner },
      famous_market: {
        routine: "famousmarketdelete",
        callback: listfamousmarket,
      },
      b_textile_catagory: {
        routine: "b_textile_catagorysdelete",
        callback: listbrousetextile,
      },
      offer: { routine: "offerdelete", callback: offerlist },
      faq: { routine: "faqdelete", callback: listFAQ },
      review: { routine: "reviewdelete", callback: listreview },
    };
    if (deleteMapping[deleteType]) {
      var routine = deleteMapping[deleteType].routine;
      var callback = deleteMapping[deleteType].callback;
      confirmAndDelete(employeeId, routine, deleteType, callback);
    } else {
      console.error("Delete type not found:", deleteType);
    }
  });

  $(document).on("click", ".videoSave", function (event) {
    event.preventDefault();
    console.log("video save button click");
    var form_data = $("#videoinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_videos");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["video_title"] !== undefined
          ? $(".video_title").html(response["msg"]["video_title"])
          : $(".video_title").html("");
        response["msg"]["video_category"] !== undefined
          ? $(".video_category").html(response["msg"]["video_category"])
          : $(".video_category").html("");
        response["msg"]["youtube_shorts"] !== undefined
          ? $(".youtube_shorts").html(response["msg"]["youtube_shorts"])
          : $(".youtube_shorts").html("");
        response["msg"]["youtube_vlogs"] !== undefined
          ? $(".youtube_vlogs").html(response["msg"]["youtube_vlogs"])
          : $(".youtube_vlogs").html("");
        if (response["data"] == "success") {
          $("#videoinsert")[0].reset();
          showMessage(response.msg, "success");
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".blogSave", function (event) {
    event.preventDefault();
    console.log("Blog save button click");
    var $contentheader = CKEDITOR.instances["myeditor"];
    if ($contentheader != undefined) {
      CKEDITOR.instances["myeditor"].updateElement();
    }
    var form_data = $("#bloginsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_blog");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["blog_title"] !== undefined
          ? $(".blog_title").html(response["msg"]["blog_title"])
          : $(".blog_title").html("");
        response["msg"]["blog_category"] !== undefined
          ? $(".blog_category").html(response["msg"]["blog_category"])
          : $(".blog_category").html("");
        response["msg"]["myeditor"] !== undefined
          ? $(".myeditor").html(response["msg"]["myeditor"])
          : $(".myeditor").html("");
        response["msg"]["author_name"] !== undefined
          ? $(".author_name").html(response["msg"]["author_name"])
          : $(".author_name").html("");
        response["msg"]["blog_image"] !== undefined
          ? $(".blog_image").html(response["msg"]["blog_image"])
          : $(".blog_image").html("");
        response["msg"]["blog_image_alt"] !== undefined
          ? $(".blog_image_alt").html(response["msg"]["blog_image_alt"])
          : $(".blog_image_alt").html("");
        if (response["data"] == "success") {
          if (!response.updated_blog_id) {
            $("#bloginsert")[0].reset();
            CKEDITOR.instances["myeditor"].setData("");
            $(".myFile").html("");
            resetThumbnail();
          } else {
            window.location.href = "blog-list.php";
          }
          showMessage(response.msg, "success");
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".bannerSave", function (event) {
    event.preventDefault();
    console.log("Banner save button click");
    var form_data = $("#bannerinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_banner");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["myFile"] !== undefined
          ? $(".myFile").html(response["msg"]["myFile"])
          : $(".myFile").html("");
        response["msg"]["image_alt"] !== undefined
          ? $(".image_alt").html(response["msg"]["image_alt"])
          : $(".image_alt").html("");
        response["msg"]["heading"] !== undefined
          ? $(".heading").html(response["msg"]["heading"])
          : $(".heading").html("");
        response["msg"]["sub_heading"] !== undefined
          ? $(".sub_heading").html(response["msg"]["sub_heading"])
          : $(".sub_heading").html("");
        response["msg"]["banner_text"] !== undefined
          ? $(".banner_text").html(response["msg"]["banner_text"])
          : $(".banner_text").html("");
        response["msg"]["banner_btn_link"] !== undefined
          ? $(".banner_btn_link").html(response["msg"]["banner_btn_link"])
          : $(".banner_btn_link").html("");
        if (response["data"] == "success") {
          $("#bannerinsert")[0].reset();
          resetThumbnail();
          $(".myFile").html("");
          showMessage(response.msg, "success");
          listbanner();
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });
  // search product

  $("#search").on("keyup", function () {
    var search_text = $(this).val();
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "POST",
      dataType: "json",
      data: {
        search_text: search_text,
        routine_name: "productlisting",
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.data == "success") {
          $("#getdata").html(data.outcome);
        } else {
          $("#getdata").html("Data not found...");
        }
      },
    });
  });
  // product pagination
  $(document).on("click", "#pagination-product a", function (event) {
    event.preventDefault();
    var page = $(this).data("page");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      data: {
        page: page,
        search_text: $("#search_text").val(),
        routine_name: "productlisting",
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.data === "success") {
          $("#getdata").html(data.outcome);
          $("#pagination").html(data.pagination);
        } else {
          $("#getdata").html("Data not found");
          $("#pagination").html("Pagination not found");
        }
      },
    });
  });
  // blog pagination
  $(document).on("click", "#pagination-blog a", function (event) {
    event.preventDefault();
    var page = $(this).data("page");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      data: {
        page: page,
        search_text: $("#search_text").val(),
        routine_name: "bloglisting",
      },
      success: function (data) {
        var data = JSON.parse(data);
        if (data.data == "success") {
          $("#getdata").html(data.outcome);
          $("#pagination").html(data.pagination);
        } else {
          $("#getdata").html("Data not found");
          $("#pagination").html("Pagination not found");
        }
      },
    });
  });
  // blogsearching
  $("#blog_search").on("keyup", function () {
    // alert("ok")
    var search_text = $(this).val();
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      data: { search_text: search_text, routine_name: "bloglisting" },
      success: function (data) {
        var data = JSON.parse(data);
        console.log(data.data);
        if (data.data == "success") {
          $("#getdata").html(data.outcome);
        } else {
          $("#getdata").html("data is not found");
        }
      },
    });
  });

  $(document).on("click", "#flexSwitchCheckDefault", function () {
    toggle_enabledisable(this);
  });

  function toggle_enabledisable(thisObj) {
    var table_name = $("#flexSwitchCheckDefault").val();
    var ischecked_value = $(thisObj).is(":checked") ? 1 : 0;
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "POST",
      dataType: "json",
      data: {
        routine_name: "toggle_enabledisable",
        ischecked_value: ischecked_value,
        table_name: table_name,
      },
      success: function (response) {
        console.log("Ajax response received: ", response);
      },
    });
  }
  

  $(document).on("click", ".marketSave", function (event) {
    event.preventDefault();
    console.log("market save button click");
    var form_data = $("#f_marketinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_market");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        // response["msg"]["image_alt"] !== undefined ? $(".image_alt").html (response["msg"]["image_alt"]) : $(".image_alt").html("");
        // response["msg"]["svg_image_alt"] !== undefined ? $(".svg_image_alt").html (response["msg"]["svg_image_alt"]) : $(".svg_image_alt").html("");
        response["msg"]["shop_logo"] !== undefined
          ? $(".shop_logo").html(response["msg"]["shop_logo"])
          : $(".shop_logo").html("");
        response["msg"]["svg_img"] !== undefined
          ? $(".svg_img").html(response["msg"]["svg_img"])
          : $(".svg_img").html("");
        response["msg"]["heading"] !== undefined
          ? $(".heading").html(response["msg"]["heading"])
          : $(".heading").html("");
        response["msg"]["sub_heading"] !== undefined
          ? $(".sub_heading").html(response["msg"]["sub_heading"])
          : $(".sub_heading").html("");
        response["msg"]["img"] !== undefined
          ? $(".img").html(response["msg"]["img"])
          : $(".img").html("");
        if (response["data"] == "success") {
          $("#f_marketinsert")[0].reset();
          resetThumbnail();
          showMessage(response.msg, "success");
          $(".myFile").html("");
          listfamousmarket();
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".brouseSave", function (event) {
    event.preventDefault();
    console.log(" brouseSave save button click");
    var form_data = $("#b_textileCtgryinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_brousetxt");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["categories"] !== undefined
          ? $(".categories").html(response["msg"]["categories"])
          : $(".categories").html("");
        if (response["data"] == "success") {
          $("#b_textileCtgryinsert")[0].reset();
          $(".multiple_tag").val(null).trigger("change");
          showMessage(response.msg, "success");
          listbrousetextile();
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".offerSave", function (event) {
    event.preventDefault();
    console.log(" offers save button click");
    var form_data = $("#offersinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_offers");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["myFile"] !== undefined
          ? $(".myFile").html(response["msg"]["myFile"])
          : $(".myFile").html("");
        response["msg"]["image_alt"] !== undefined
          ? $(".image_alt").html(response["msg"]["image_alt"])
          : $(".image_alt").html("");
        response["msg"]["img_link"] !== undefined
          ? $(".img_link").html(response["msg"]["img_link"])
          : $(".img_link").html("");
        if (response["data"] == "success") {
          $("#offersinsert")[0].reset();
          resetThumbnail();
          showMessage(response.msg, "success");
          $(".myFile").html("");
          offerlist();
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".paragraphSave", function (event) {
    event.preventDefault();
    console.log(" paragraph save button click");
    var $contentheader = CKEDITOR.instances["myeditor"];
    if ($contentheader != undefined) {
      CKEDITOR.instances["myeditor"].updateElement();
    }
    var form_data = $("#paragraphinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_paragraph");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["myeditor"] !== undefined
          ? $(".myeditor").html(response["msg"]["myeditor"])
          : $(".myeditor").html("");
        if (response["data"] == "success") {
          $("#paragraphinsert")[0].reset();
          CKEDITOR.instances["myeditor"].setData("");
          showMessage(response.msg, "success");
          listparagraph();
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".faqSave", function (event) {
    event.preventDefault();
    console.log(" faqSave save button click");
    var $contentheader = CKEDITOR.instances["myeditor"];
    if ($contentheader != undefined) {
      CKEDITOR.instances["myeditor"].updateElement();
    }
    var form_data = $("#faqinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_faq");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["faq_question"] !== undefined
          ? $(".faq_question").html(response["msg"]["faq_question"])
          : $(".faq_question").html("");
        response["msg"]["myeditor"] !== undefined
          ? $(".myeditor").html(response["msg"]["myeditor"])
          : $(".myeditor").html("");
        if (response["data"] == "success") {
          $("#faqinsert")[0].reset();
          CKEDITOR.instances["myeditor"].setData("");
          showMessage(response.msg, "success");
          listFAQ();
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".reviewSave", function (event) {
    event.preventDefault();
    console.log("review save button click");
    var form_data = $("#reviewinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_review");
    $.ajax({
      url: "../admin1/ajax_call.php",
      type: "post",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        loading_hide(".save_loader_show", "Save");
        response["msg"]["shop_image"] !== undefined
          ? $(".shop_image").html(response["msg"]["shop_image"])
          : $(".shop_image").html("");
        response["msg"]["shop_description"] !== undefined
          ? $(".shop_description").html(response["msg"]["shop_description"])
          : $(".shop_description").html("");
        response["msg"]["shop_name"] !== undefined
          ? $(".shop_name").html(response["msg"]["shop_name"])
          : $(".shop_name").html("");
        response["msg"]["review"] !== undefined
          ? $(".review").html(response["msg"]["review"])
          : $(".review").html("");
        if (response["data"] == "success") {
          $("#reviewinsert")[0].reset();
          resetThumbnail();
          showMessage(response.msg, "success");
          $(".shop_logo").html("");
          listreview();
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(".forgotPasswordForm").on("click", function (event) {
    event.preventDefault();
    var form_data = $("#forgetpassword")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "forget_password");
    $.ajax({
      url: "ajax_call.php",
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        if (response["data"] == "success") {
          showMessage(response.msg, "success");
        } else {
          response["msg"] !== undefined
            ? $(".email").html(response["msg"])
            : $(".email").html("");
        }
      },
      error: function () {
        showMessage(response.msg_error, "fail");
      },
    });
  });

  $(".resetPasswordForm").on("click", function (event) {
    event.preventDefault();
    var form_data = $("#reset-password-form")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "reset_passwordform");

    $.ajax({
      url: "ajax_call.php",
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      success: function (response) {
        console.log(response);
        var response = JSON.parse(response);
        if (response["data"] == "success") {
          showMessage(response["msg"], "success");
          window.location.href = "sign-in.php";
        } else {
          showMessage(response["msg"], "fail");
        }
      },
      error: function () {
        showMessage(response.msg_error, "fail");
      },
    });
  });

  $(".dropdown .dropdown-item").click(function () {
    console.log($(this).html());
    var sortValue = $(this).data("value");
    var tablename = $(this).closest(".dropdown-menu").data("table");
    $.ajax({
      url: "ajax_call.php",
      type: "POST",
      dataType: "json",
      data: {
        routine_name: "data_sort_by",
        sortValue: sortValue,
        tablename: tablename,
      },
      success: function (response) {
        var response = JSON.parse(response);
        console.log(response.outcome);
        if (response.outcome != "") {
          $("#getdata").html(response.outcome);
        } else {
        }
      },
    });
  });

  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
});

// video anable disable

$(document).on("click", ".toggle-button", function () {
  toggle_checkuncheck(this);
});

function check_toggle_btn(videoId) {
  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "post",
    dataType: "json",
    data: {
      routine_name: "check_toggle_btn",
      video_id: videoId 
    },
   
    success: function (response) {
      if (response["outcome"] !== undefined) {
        var check_status = response["outcome"]["toggle"];
        $("#checkbox_" + videoId).prop("checked", check_status == 1);
      } else {
        console.log("Something went wrong");
      }
    },
  });
}
function toggle_checkuncheck(thisObj) {
  var videoId = $(thisObj).data("video-id");
  var ischecked_value = $(thisObj).is(":checked") ? 1 : 0;

  $.ajax({
    url: "../admin1/ajax_call.php",
    type: "POST",
    dataType: "json",
    data: {
      routine_name: "toggle_checkuncheck",
      ischecked_value: ischecked_value,
      video_id: videoId 
    },
    success: function (response) {
      console.log("Ajax response received: ", response);
    },
  });
}


document.addEventListener("DOMContentLoaded", function () {
  var ctxhtml = document.getElementById("chart-bars");
  if (ctxhtml) {
    var ctx = ctxhtml.getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
          {
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
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
                style: "normal",
                lineHeight: 2,
              },
              color: "#fff",
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false,
            },
          },
        },
      },
    });

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
    gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
    gradientStroke1.addColorStop(0, "rgba(203,12,159,0)"); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
    gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
    gradientStroke2.addColorStop(0, "rgba(20,23,39,0)"); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [
          {
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#77C0FC",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6,
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
            maxBarThickness: 6,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
        },
        interaction: {
          intersect: false,
          mode: "index",
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              padding: 10,
              color: "#b2b9bf",
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5],
            },
            ticks: {
              display: true,
              color: "#b2b9bf",
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: "normal",
                lineHeight: 2,
              },
            },
          },
        },
      },
    });
  }
});
