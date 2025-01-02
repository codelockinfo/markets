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
var NO_DATA = '<div class="no-data"><img src="assets/img/no_img_gif1.gif"></div>';
let storedFiles = []; // Array to store selected files
let allowedTypes = ["image/png", "image/jpeg", "image/jpg", "image/gif"];

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

function formatNumber(num) {
  if (num >= 10000000) {
    return (num / 10000000).toFixed(0) + "Cr";
  } else if (num >= 100000) {
    return (num / 100000).toFixed(0) + "L";
  } else if (num >= 1000) {
    return (num / 1000).toFixed(0) + "K";
  } else {
    return num;
  }
  return num.toString();
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
    $buttonIcon = $buttonName;
  }
  $($selector).removeClass("loading").html($buttonIcon).removeAttr("disabled");
}

function redirect403() {
  window.location = "https://www.shopify.com/admin/apps";
}

function check_toggle_status() {
  var table_name = $("#toggleStatus").val();
  $.ajax({
    url: "../admin/ajax-call.php",
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
      }
    },
  });
}

function CountData(routineName) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: routineName },
    success: function (response) {
      var response = JSON.parse(response);

      if (response.data === "success") {
        response.totalearning !== undefined
          ? $(".totalEarning").text(
              "Rs. " + formatNumber(response.totalearning)
            )
          : "";
        response.totalproduct !== undefined
          ? $(".totalProduct").text(response.totalproduct)
          : "";
        response.countclient !== undefined
          ? $(".totalClient").text(response.countclient)
          : "";
        response.totalitemsale !== undefined
          ? $(".totalItemSale").text(response.totalitemsale)
          : "";
        response.totalamountsale !== undefined
          ? $(".totalAmountSale").text(
              "Rs. " + formatNumber(response.totalamountsale)
            )
          : "";
      }
    },
  });
}
function userData(routineName) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: routineName },
    success: function (response) {
      var response = JSON.parse(response);
      console.log(response);
      console.log(response.outcome);
      if (response.data === "success") {
        $(".user_msgactive").html(response.outcome);
      }
    },
  });
}
function loadData(routineName) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: routineName },
    success: function (response) {
      var response = JSON.parse(response);
      if (response.outcome === "No data found") {
        $("#getdata").html(NO_DATA);
        $(".user_msg").html(NO_DATA);
        $(".dropdownhide").hide();
        $("#pagination").hide();
        $(".addproduct").show();
        $(".viewproduct").hide();
        $(".range_picker").hide();
      } else {
        $("#getdata").html(response.outcome);
        $(".user_msg").html(response.outcome);
        if (response.pagination != "") {
          $("#pagination").html(response.pagination);
          $(".dropdownhide").show();
          $(".addproduct").hide();
          $(".viewproduct").show();
          $("#pagination").show();
          $(".range_picker").show();

        } else {
          $(".addproduct").hide();
          $(".viewproduct").show();
        }
        // check_toggle_status();
        // check_toggle_btn();
      }
    },
    error: function (xhr, status, error) {
      console.error("Error occurred: ", status, error);
    },
  });
}

function listgallary() {
  loadData("listgallary");
}

function listproduct() {
  loadData("productlisting");
}

function listcustomer() {
  loadData("customerlisting");
}
function listuser() {
  loadData("userlisting");
}
function listblog() {
  loadData("bloglisting");
}

function listinvoice() {
  loadData("invoicelisting");
}

function offerlist() {
  loadData("offerlisting");
}
function topbarlist() {
  loadData("topbarlisting");
}
function custom_product() {
  loadData("custm_productlisting");
}

function listvideo() {
  loadData("videolisting");
}

function allvideo() {
  loadData("allvideolisting");
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
  loadData("profileproductlisting");
}

function listbanner() {
  loadData("bannerlisting");
}

function listfamousmarket() {
  loadData("famousmarketlisting");
}

function profileLoadData(routineName) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    timeout: 5000,
    data: { routine_name: routineName },
    success: function (response) {
      try {
        const parsedResponse =
          typeof response === "string" ? JSON.parse(response) : response;
        console.log(parsedResponse, " .....parsedResponse");
        if (parsedResponse.data === "success") {
          console.log("Data loaded successfully:", parsedResponse.data);
          parsedResponse["profiledata"]["name"] !== undefined
            ? $("input[name='name']").val(parsedResponse["profiledata"]["name"])
            : "";
          parsedResponse["profiledata"]["shop"] !== undefined
            ? $("input[name='shop']").val(parsedResponse["profiledata"]["shop"])
            : "";
          parsedResponse["profiledata"]["phone_number"] !== undefined
            ? $("input[name='phone_number']").val(
                parsedResponse["profiledata"]["phone_number"]
              )
            : "";
          parsedResponse["profiledata"]["business_type"] !== undefined
            ? $("select[name='business_type']")
                .val(parsedResponse["profiledata"]["business_type"])
                .change()
            : "";
          parsedResponse["profiledata"]["address"] !== undefined
            ? $("input[name='address']").val(
                parsedResponse["profiledata"]["address"]
              )
            : "";
          parsedResponse["outcome"]["profile_deatils"] !== undefined
            ? $("#getdataa").html(parsedResponse["outcome"]["profile_deatils"])
            : $("#getdataa").html("");
          parsedResponse["outcome"]["deatils"] !== undefined
            ? $("#img").html(parsedResponse["outcome"]["deatils"])
            : $("#img").html("");
          parsedResponse["outcome"]["logo"] !== undefined
            ? $("#profile_data").html(parsedResponse["outcome"]["logo"])
            : $("#profile_data").html("");
        } else if (parsedResponse.data === "fail") {
          console.error("Error from server:", parsedResponse.message);
        } else {
          console.warn("Unexpected status:", parsedResponse.status);
        }
        initializeDynamicContent();
      } catch (error) {
        console.error("Error parsing response:", error.message);
      }
    },

    error: function (xhr, status, error) {
      console.log(status, " ..........status");
      console.log(xhr.status, "......xhr.status ");
      if (status === "timeout") {
        console.log("Request timed out. Please try again.");
        profileLoadData("listprofile");
      } else if (xhr.status === 500) {
        console.error("Internal server error (500)");
        profileLoadData("listprofile");
      } else {
        console.error(`AJAX Error - Status: ${status}, Error: ${error}`);
      }
    },
  });
}

function initializeDynamicContent() {
  console.log("iiiiiiiiiiiiiiiiiiiiiiii");
  document
    .querySelectorAll(".profile-drop-zone__input")
    .forEach((inputElement) => {
      console.log("profile-drop-zone__input");
      const dropZoneElement = inputElement.closest(".drop-zone");
      const promptElement = dropZoneElement.querySelector(".pro-zone__prompt");

      console.log(dropZoneElement);

      if (!promptElement) {
        console.error("pro-zone__prompt element is missing");
        return;
      }

      dropZoneElement.addEventListener("click", () => {
        if (!inputElement.disabled) {
          inputElement.click();
        }
      });

      inputElement.addEventListener("change", (e) => {
        if (
          inputElement &&
          inputElement.files &&
          inputElement.files.length > 0
        ) {
          const file = inputElement.files[0];
          if (file.type.startsWith("image/")) {
            clearThumbnailProfileImage(dropZoneElement);
            updateThumbnailProfileImage(dropZoneElement, file, inputElement);
            promptElement.style.display = "none";
          } else {
            Swal.fire({
              icon: "error",
              title: "Failure",
              text: "Only PNG, JPG, JPEG, GIF files are allowed!",
            });
            inputElement.value = "";
            promptElement.style.display = "block";
          }
        } else {
          const thumbnailElement =
            dropZoneElement.querySelector(".drop-zone__thumb");
          if (!thumbnailElement) {
            promptElement.style.display = "block";
          }
        }
      });
      dropZoneElement.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
      });

      ["dragleave", "dragend"].forEach((type) => {
        dropZoneElement.addEventListener(type, () => {
          dropZoneElement.classList.remove("drop-zone--over");
        });
      });

      dropZoneElement.addEventListener("drop", (e) => {
        e.preventDefault();
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith("image/")) {
          if (inputElement) {
            inputElement.files = e.dataTransfer.files;
            clearThumbnailProfileImage(dropZoneElement);
            updateThumbnailProfileImage(dropZoneElement, file, inputElement);

            promptElement.style.display = "none";
          } else {
            console.error("inputElement is missing.");
          }
        } else {
          Swal.fire({
            icon: "error",
            title: "Failure",
            text: "Only PNG, JPG, JPEG, GIF files are allowed!",
          });
          if (inputElement) {
            inputElement.value = "";
          }
          promptElement.style.display = "block";
        }

        dropZoneElement.classList.remove("drop-zone--over");
      });
    });
}
function clearThumbnailProfileImage(dropZoneElement) {
  const thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
  if (thumbnailElement) {
    thumbnailElement.innerHTML = "";
  }
}

function updateThumbnailProfileImage(dropZoneElement, file, inputElement) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
  const promptElement = dropZoneElement.querySelector(".pro-zone__prompt");
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.innerHTML = "";

  if (file.type.startsWith("image/")) {
    const reader = new FileReader();
    reader.addEventListener("load", (e) => {
      const img = document.createElement("img");
      img.src = e.target.result;
      img.classList.add("picture__img");
      const closeButton = document.createElement("button");
      closeButton.classList.add("close-buttons_profile");
      closeButton.innerText = "x";

      closeButton.addEventListener("click", (event) => {
        event.stopPropagation();

        thumbnailElement.innerHTML = "";
        inputElement.value = "";
        inputElement.disabled = false;
        promptElement.style.display = "block";
        setTimeout(() => {
          inputElement.value = null;
        }, 0);
      });
      thumbnailElement.appendChild(img);
      thumbnailElement.appendChild(closeButton);
      promptElement.style.display = "none";
    });

    reader.readAsDataURL(file);
  }
}

function demo() {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "demo_function" },
    beforeSend: function () {},
    success: function (response) {},
  });
}

function get_product(id) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "getproduct", id: id },
    success: function (response) {
      var response = JSON.parse(response);
      if (response.outcome !== "" && response.outcome !== undefined) {
        response["outcome"]["title"] !== undefined
          ? $("input[name='pname']").val(response["outcome"]["title"])
          : "";
        response["outcome"]["category"] !== undefined
          ? $("select[name='select_catagory']")
              .val(response["outcome"]["category"])
              .change()
          : "";
        response["outcome"]["cloth"] !== undefined
          ? $("select[name='cloth']").val(response["outcome"]["cloth"]).change()
          : "";
        response["outcome"]["qty"] !== undefined
          ? $("input[name='qty']").val(response["outcome"]["qty"])
          : "";
        response["outcome"]["fabric_type"] !== undefined
          ? $("input[name='fabric_type']").val(
              response["outcome"]["fabric_type"]
            )
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
        if (response.outcome.p_tag) {
          const arrangedValue = response.outcome.p_tag;
          if (arrangedValue.trim() !== "") {
            const rearrangedValue = arrangedValue.split(",").reverse();
            rearrangedValue.forEach(function (value) {
              if (
                $(`select[name='p_tag'] option[value='${value}']`).length === 0
              ) {
                $("select[name='p_tag']").append(
                  `<option value="${value}">${value}</option>`
                );
              }
            });
            $("select[name='p_tag']").val(rearrangedValue).trigger("change");
          }
        }

        response["outcome"]["p_description"] !== undefined
          ? $("textarea[name='p_description']").val(
              response["outcome"]["p_description"]
            )
          : "";

        var productmain_image =
          response["outcome"]["p_image"] !== undefined &&
          response["outcome"]["p_image"].trim() !== ""
            ? response["outcome"]["p_image"]
            : "";
        console.log(productmain_image);
        if (productmain_image !== "") {
          var filePath = "../admin/assets/img/product_img/" + productmain_image;
          $.ajax({
            url: filePath,
            type: "HEAD",
            success: function () {
              var imagePreview =
                '<div class="drop-zone__thumb ">' +
                '<div class="img-wrapper">' +
                '<img src="' +
                filePath +
                '" class="picture__img"/>' +
                '<button class="close-buttons_profile">x</button>' +
                "</div>" +
                "</div>";
              console.log(imagePreview);
              $(".productMainImageAppend").append(imagePreview);
              $(".productMainImageAppend .drop-zone").hide();
            },
            error: function () {
              // $(".productMainImageAppend .drop-zone").hide();
            },
          });
        } else {
          $(".productMainImageAppend .drop-zone").show();
        }
        if (response.pro_img) {
          $(".get_pro").html(response.pro_img);
        }
        if (window.File && window.FileList && window.FileReader) {
          $("#files").on("change", function (e) {
            console.log("File input changed");

            let filesArray = Array.from(e.target.files);
            // console.log(storedFiles,"....storedFiles");
            // console.log(filesArray,"....filesArray");
            // storedFiles = [...storedFiles, ...filesArray];
            // storedFiles = storedFiles.filter(
            //   (file, index, self) =>
            //     index === self.findIndex((f) => f.name === file.name)
            // );
            filesArray = filesArray.filter((file) => {
              if (!allowedTypes.includes(file.type)) {
                console.log(
                  `Skipped unsupported file type: ${file.name} (${file.type})`
                );
                Swal.fire({
                  icon: "error",
                  title: "Invalid File Type",
                  text: "Only PNG, JPG, JPEG, and GIF files are allowed!",
                });
                return false;
              }
              return true;
            });

            storedFiles = [...storedFiles, ...filesArray];
            storedFiles = storedFiles.filter(
              (file, index, self) =>
                index === self.findIndex((f) => f.name === file.name)
            );

            console.log("Merged Files main image:", storedFiles);

            filesArray.forEach((f) => {
              if (!allowedTypes.includes(f.type)) {
                Swal.fire({
                  icon: "error",
                  title: "Invalid File Type",
                  text: "Only PNG, JPG, JPEG, and GIF files are allowed!",
                });
              } else {
                if ($(`.drop-zone__thumb img[title="${f.name}"]`).length > 0) {
                  showMessage(
                    "This file name already contains an image",
                    "fail"
                  );
                  console.log(`Duplicate preview skipped: ${f.name}`);
                  return;
                }
                let fileReader = new FileReader();

                fileReader.onload = function (e) {
                  let fileContent = e.target.result;
                  $(
                    `<div class="drop-zone__thumb col-6 col-lg-3 col-md-4">
                      <div class="img-wrapper">
                        <img class="picture__img" src="${fileContent}" title="${f.name}" />
                        <button class="close-button_product" data-name="${f.name}">x</button>
                      </div>
                    </div>`
                  ).insertBefore("#files");
                };
                fileReader.readAsDataURL(f);
              }
            });
          });
        }
        if (response["product_img_result"] !== undefined) {
          var imagePreviews = "";
          $.each(response["product_img_result"], function (index, image) {
            var imageUrl = image.p_image;
            imagePreviews +=
              '<div class="drop-zone__thumb col-6 col-lg-3 col-md-4">' +
              '<div class="img-wrapper">' +
              '<img src="../admin/assets/img/product_img/' +
              imageUrl +
              '" class="picture__img"/>' +
              '<button class="close-button_product delete" data-productimageid="' +
              image["product_image_id"] +
              '" data-id="' +
              image["product_image_id"] +
              '" data-delete-type="product_form_image">x</button>' +
              "</div>" +
              "</div>";
          });
          $("#files").before(imagePreviews);
        }
      }
    },
  });
}

// function lastInsertedId(table_name, id) {
//   $.ajax({
//     url: "../admin/ajax-call.php",
//     type: "post",
//     dataType: "json",
//     data: { routine_name: "last_inserted_id", id: id, table_name: table_name },
//     success: function (response) {
//       var response = JSON.parse(response);
//       if (response["data"] == "success") {
//         const year = new Date().getFullYear();
//         let rawOutcome = response.outcome.toString();
//         console.log("Raw Outcome:", rawOutcome);
//         if (rawOutcome.startsWith(year.toString())) {
//           rawOutcome = rawOutcome.slice(year.toString().length);
//         }
//         const paddedId = rawOutcome.padStart(5, "0");
//         const formattedId = `${year}${paddedId}`;
//         $(".invoiceid").val(formattedId);
//         console.log("Generated Invoice ID:", formattedId);
//       }
//     },
//   });
// }

function get_invoice(id) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "getinvoice", id: id },
    success: function (response) {
      var response = JSON.parse(response);
      response["outcome"]["i_name"] !== undefined
        ? $("textarea[name='i_name']").val(response["outcome"]["i_name"])
        : "";
      response["outcome"]["invoice_no"] !== undefined
        ? $("input[name='invoice_no']").val(response["outcome"]["invoice_no"])
        : "";

      response["outcome"]["bill_no"] !== undefined
        ? $("textarea[name='bill_no']").val(response["outcome"]["bill_no"])
        : "";

      response["outcome"]["ship_to"] !== undefined
        ? $("textarea[name='ship_to']").val(response["outcome"]["ship_to"])
        : "";

      response["outcome"]["due_date"] !== undefined
        ? $("input[name='due_date']").val(response["outcome"]["due_date"])
        : "";
      response["outcome"]["date"] !== undefined
        ? $("input[name='date']").val(response["outcome"]["date"])
        : "";
      response["outcome"]["shipping_charges"] !== undefined
        ? $("input[name='shipping_charges']").val(
            response["outcome"]["shipping_charges"]
          )
        : "";

      response["outcome"]["po_number"] !== undefined
        ? $("input[name='po_number']").val(response["outcome"]["po_number"])
        : "";
      response["outcome"]["total"] !== undefined
        ? $("input[name='total']").val(response["outcome"]["total"])
        : "";
      response["outcome"]["subtotal"] !== undefined
        ? $("input[name='subtotal']").val(response["outcome"]["subtotal"])
        : "";
      response["outcome"]["amount_paid"] !== undefined
        ? $("input[name='amount_paid']").val(response["outcome"]["amount_paid"])
        : "";
      response["outcome"]["balance_due"] !== undefined
        ? $("input[name='balance_due']").val(response["outcome"]["balance_due"])
        : "";
      response["outcome"]["terms"] !== undefined
        ? $("select[name='terms']").val(response["outcome"]["terms"]).change()
        : "";
      response["outcome"]["terms_condition"] !== undefined
        ? $("textarea[name='terms_condition']").val(
            response["outcome"]["terms_condition"]
          )
        : "";
      response["outcome"]["notes"] !== undefined
        ? $("textarea[name='notes']").val(response["outcome"]["notes"])
        : "";
      var i_image =
        response["outcome"]["i_image"] !== undefined
          ? response["outcome"]["i_image"]
          : "";

      if (i_image != "") {
        var filePath = "../admin/assets/img/invoice_img/" + i_image;
        $.ajax({
          url: filePath,
          type: "HEAD",
          success: function () {
            var imagePreview =
              '<div class="drop-zone__thumb">' +
              '<div class="img-wrapper">' +
              '<img src="' +
              filePath +
              '" class="picture__img"/>' +
              '<button class="close-buttons_profile">x</button>' +
              "</div>" +
              "</div>";
            $(".imageAppend").append(imagePreview);
            $(".drop-zone").hide();
          },
          error: function () {
            $(".drop-zone").show();
          },
        });
      } else {
        $(".drop-zone").show();
      }
      if (response.item_data) {
        $(".get_invoiceitem").html(response.item_data);
      }
    },
  });
}

function get_customer(id) {
  var routine_name = "getcustomer";
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: routine_name, id: id },
    success: function (response) {
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
      response["outcome"]["city"] !== undefined
        ? $("input[name='city']").val(response["outcome"]["city"])
        : "";
      response["outcome"]["state"] !== undefined
        ? $("input[name='state']").val(response["outcome"]["state"])
        : "";

      response["outcome"]["address"] !== undefined
        ? $("textarea[name='address']").val(response["outcome"]["address"])
        : "";
      var c_image =
        response["outcome"]["c_image"] !== undefined
          ? response["outcome"]["c_image"]
          : "";

      if (c_image != "") {
        var filePath = "../admin/assets/img/customer/" + c_image;
        $.ajax({
          url: filePath,
          type: "HEAD",
          success: function () {
            var imagePreview =
              '<div class="drop-zone__thumb">' +
              '<div class="img-wrapper">' +
              '<img src="' +
              filePath +
              '" class="picture__img"/>' +
              '<button class="close-buttons_profile">x</button>' +
              "</div>" +
              "</div>";
            $(".imageAppend").append(imagePreview);
            $(".drop-zone").hide();
          },
          error: function () {
            $(".drop-zone").show();
          },
        });
      } else {
        $(".drop-zone").show();
      }
    },
  });
}

function get_blog(id) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "getblog", id: id },
    success: function (response) {
      var response = JSON.parse(response);
      response["outcome"]["title"] !== undefined
        ? $("input[name='blog_title']").val(response["outcome"]["title"])
        : "";
      response["outcome"]["category"] !== undefined
        ? $("select[name='category']")
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
        var filePath = "../admin/assets/img/blog_img/" + image;
        $.ajax({
          url: filePath,
          type: "HEAD",
          success: function () {
            var imagePreview =
              '<div class="drop-zone__thumb">' +
              '<div class="img-wrapper">' +
              '<img src="' +
              filePath +
              '" class="picture__img"/>' +
              '<button class="close-buttons_profile">x</button>' +
              "</div>" +
              "</div>";
            $(".imageAppend").append(imagePreview);
            $(".drop-zone").hide();
          },
          error: function () {
            $(".drop-zone").show();
          },
        });
      } else {
        $(".drop-zone").show();
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
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "get_categories" },
    beforeSend: function () {},
    success: function (response) {
      var response = JSON.parse(response);
      if (response["data"] == "success") {
        if (response["outcome"] !== undefined) {
          $(
            "select[name=categories], select[name=select_catagory], select[name=catagory], select[name=category]"
          ).append(response["outcome"]);

          $(
            "select[name=categories], select[name=select_catagory], select[name=catagory], select[name=category]"
          ).select2({
            placeholder: "Select a category",
            allowClear: true,
          });
        }
      }
    },
  });
}

function select_shop() {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "select_shop" },
    beforeSend: function () {},
    success: function (response) {
      var response = JSON.parse(response);
      if (response.data === "success") {
        if (Array.isArray(response.outcome)) {
          $("#mySelect")
            .empty()
            .append('<option selected value="">Select Shop</option>');
          $.each(response.outcome, function (index, shop) {
            var userId = shop.user_id;
            var shopName = shop.shop.trim();

            if (shopName) {
              var optionHtml =
                "<option value='" + userId + "'>" + shopName + "</option>";

              $("#mySelect").append(optionHtml);
            }
          });
          $("#mySelect").select2({
            placeholder: "Select Shop",
            allowClear: true,
          });
        }
      }
    },
  });
}

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

$(document).ready(function () {
  activeSidebarMenu();

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

  $(".signImage").on("input change", function () {
    $(this).closest(".mb-2").find(".imageError").text("");
  });

  $(document).on("input", "input", function () {
    const parentTd = $(this).closest("td");
    parentTd.removeClass("error");
    const closestColXl = $(this).closest(".col-xl");
    closestColXl.removeClass("error");
  });

  let randomNumber = Math.floor(10000000 + Math.random() * 90000000);
  console.log(randomNumber);
  $(".genrate").val(randomNumber);
  
  var pnameElement = document.getElementById('pname');
  var imageAltElement = document.getElementById('image_alt');

  if (pnameElement && imageAltElement) {
    pnameElement.oninput = function() {
      console.log("oninput");
      imageAltElement.value = this.value;
    };
  }

  $(".date-input").on("change keypress", function () {
    $(this).next(".errormsg").text("");
  });
  $("#imageUpload").on("change", function () {
    $(this).closest(".mb-3").find(".errormsg").html("");
  });
  $("#removeImage").on("change", function () {
    $(this).closest(".mb-3").find(".errormsg").html("");
  });

  $(".validtext").on("input", function () {
    $(this).next(".errormsg").text("");
  });
  $(".valikey").on("input", function () {
    const name = $(this).attr("name");
    $(`.errormsg.${name}`).text("");
  });
  $(".number").on("input", function () {
    this.value = this.value.replace(/[^0-9]/g, "").slice(0, 10);
  });
  $(".valid_invoice_item").on("keypress", function () {
    $(this).closest(".attr").find(".errormsg").text("");
  });
  // $(".validsignf").on("keypress", function () {
  //   $(this).closest(".mb-3").find(".errormsg").text("");
  // });
  $(".change_remove").on("change", function () {
    $(this).closest(".mb-3").find(".errormsg").text("");
  });

  $(".number").on("input", function (e) {
    if (e.which >= 48 && e.which <= 57) {
      $(this).next(".errormsg").text("");
    } else {
      e.preventDefault();
    }
  });

  $(".validurl").on("input", function () {
    $(this).closest(".mb-3").find(".errormsg").text("");
  });

  $(".price").on("input", function () {
    const value = $(this).val();
    $(this).next(".errormsg").text("");
  });

  if (CKEDITOR.instances["myeditor"]) {
    CKEDITOR.instances["myeditor"].on("change", function () {
      if (CKEDITOR.instances["myeditor"].getData().length > 0) {
        $(".myeditor").html("");
      }
    });
  }

  $(document).on("click", ".formCancel", function (event) {
    event.preventDefault();
    console.log("formcancel");

    var autoGenValue = $('input[name="auto_genrate"]').val();
    // console.log(autoGenValue, " getVal");
    $(".pro-zone__prompt").css("display", "block");
    $(".pro-zone .file-label").css("display", "none");

    $(".drop-zone").css("display", "flex");
    $(".errormsg").html("");
    if ($(".form-control[name=p_tag]").length > 0) {
      if ($(".form-control[name=p_tag]").val().length > 0) {
        $(this)
          .closest("form")
          .find(".multiple_tag")
          .val(null)
          .trigger("change");
        $(this).closest("form").find(".select2-selection__clear").remove();
      }
    }
    if ($(".form-select[name=shop_name]").length > 0) {
      $(".form-select[name=shop_name]").val("").trigger("change");
    }
    if ($(".form-select[name=categories]").length > 0) {
      $(".form-select[name=categories]").val("").trigger("change");
    }
    if ($(".form-select[name=select_catagory]").length > 0) {
      $(".form-select[name=select_catagory]").val("").trigger("change");
    }
    if (CKEDITOR.instances["myeditor"]) {
      CKEDITOR.instances["myeditor"].setData("");
    }
    var $thumbnailElement = $(".drop-zone .drop-zone__thumb");
    var $inputElement = $(".pro-zone");
    if ($thumbnailElement.length > 0) {
      $thumbnailElement.html("");
      $inputElement.removeClass("drop-zone__thumb");
    }
    var $thumbnailElement = $(".get_pro .drop-zone__thumb");
    if ($thumbnailElement.length > 0) {
      $thumbnailElement.remove();
      $inputElement.find(".inputElement").show();
      $inputElement.find(".file-label").hide();
      $inputElement.removeClass("col-6 col-lg-3 col-md-4");
    }
    var $incoiveitem = $("tr.attr");
    if ($incoiveitem.length > 0) {
      $incoiveitem.find(".error").removeClass("error");
    }
    $(this).closest("form")[0].reset();
    setTimeout(function () {
      loading_hide(".cencle_loader_show", "cancel");
    }, 300);
    loading_show(".cencle_loader_show");
    var formType = $(this).closest("form").data("form-type");
    console.log(autoGenValue, " setVal");
    if (autoGenValue !== undefined) {
      $('input[name="auto_genrate"]').val(autoGenValue);
    }
    var id = $('input[name="id"]').val();
    if (id !== "" && id !== undefined) {
      switch (formType) {
        case "product":
          window.location.href = "product-list";
          break;
        case "blog":
          window.location.href = "blog-list";
          break;
        case "customer":
          window.location.href = "customer-list";
          break;
        case "invoice":
          window.location.href = "invoice-list";
          break;
      }
    }
  });

  $(".form-select").on("input change paste", function () {
    $(this).closest(".mb-3").find(".errormsg").text("");
  });

  function resetThumbnail() {
    console.log("resetThumbnail");
    var $thumbnailElement = $(".drop-zone__thumb");
    var propzone = $thumbnailElement
      .closest(".drop-zone")
      .find(".pro-zone__prompt");
    console.log(propzone, " ,,,,ppppppppropzone");
    if ($thumbnailElement.length > 0) {
      $thumbnailElement.html("");
      $thumbnailElement.removeClass("drop-zone__thumb");

      if (propzone.length >= 1) {
        propzone.css("display", "block");
      } else {
        $thumbnailElement.html(
          '<span class="pro-zone__prompt">Drop file here or click to upload</span>'
        );
      }
    }
  }
  $("#email").on("input", function () {
    var email = $(this).val();
    var emailErrorDiv = $(".email");
    var emailRegex =
      /^[a-zA-Z0-9._%+-]+@(gmail\.com|gmail\.in|yahoo\.com|yahoo\.in|gmail\.org|yahoo\.org)$/;
    if (email === "") {
      emailErrorDiv.text("");
    } else if (!emailRegex.test(email)) {
      emailErrorDiv.text("The email address entered is invalid.");
    } else {
      emailErrorDiv.text("");
    }
  });

  $(document).on("click", ".signInsave", function (e) {
    e.preventDefault();
    var form_data = $("#savesignin")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_signin");
    $.ajax({
      url: "../admin/ajax-call.php",
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
        if (response["data"] == "success") {
          $("#savesignin")[0].reset();
          window.location.href = "./";
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
          loading_hide(".save_loader_show", "Sign in");
        }
      },
    });
  });

  $(document).on("keydown", "#savesignin input", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      $(".signInsave").click();
    }
  });

  $(document).on("click", ".profileDataUpdate", function (e) {
    var form_data = $("#profileUpdate")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "profile_updatedata");
    $.ajax({
      url: "../admin/ajax-call.php",
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
        loading_hide(".save_loader_show", "save");
        if (response["data"] == "success") {
          showMessage(response.msg, "success");
          window.location.href = "profile";
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });
  function profileUpdateImage() {
    $("#profileImageUpdate").modal("hide");
  }
  $(document).on("click", ".profileImageSave", function (e) {
    var form_data = $("#profileImageSave")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "profile_imagesave");
    $.ajax({
      url: "../admin/ajax-call.php",
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
        if (response["msg"]["shop_logo"] !== undefined) {
          $(".shop_logo").html(response["msg"]["shop_logo"]);
        } else {
          $(".shop_logo").html("");
        }
        loading_hide(".save_loader_show", "save");
        if (response["data"] == "success") {
          showMessage(response.msg, "success");

          profileUpdateImage();
          var profile_image = $(".picture__img").attr("src");

          if (profile_image == undefined) {
            $(".profile-image").attr(
              "src",
              "../admin/assets/img/image_not_found.png"
            );
          } else {
            $(".profile-image").attr("src", profile_image);
          }

          $(".pro-zone__prompt").css("display", "block");
          $(".drop-zone__thumb").remove();
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".signUpsave", function (e) {
    e.preventDefault();

    var form_data = $("#savesignup")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_signup");
    $.ajax({
      url: "../admin/ajax-call.php",
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
          window.location.href = "analytics";
        }
      },
    });
  });

  $(document).on("keydown", "#savesignin input", function (event) {
    if (event.key === "Enter") {
      event.preventDefault();
      $(".signUpsave").click();
    }
  });

  $(document).on("click", ".productSave", function (event) {
    event.preventDefault();

    var form_data = $("#productinsert")[0];
    var form_data = new FormData(form_data);

    form_data.append("routine_name", "insert_products");
    var selectedTags = $(".multiple_tag").val();
    if (selectedTags !== null) {
      for (var i = 0; i < selectedTags.length; i++) {
        form_data.append("p_tag[]", selectedTags[i]);
      }
    }
    storedFiles.forEach(function (file, index) {
      form_data.append("subimage[]", file);
    });
    $.ajax({
      url: "../admin/ajax-call.php",
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
        if (response.msg && response.msg.productmain_image) {
          $(".productmain_image").html(response.msg.productmain_image);
        } else {
          $(".productmain_image").html("");
        }
        if (response.msg && response.msg.p_image) {
          $(".p_image").html(response.msg.p_image);
        } else {
          $(".p_image").html("");
        }
        response["msg"]["image_alt"] !== undefined
          ? $(".image_alt").html(response["msg"]["image_alt"])
          : $(".image_alt").html("");

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
          if (!response["updated_product_id"]) {
            $("#productinsert")[0].reset();
            resetThumbnail();
            $(".multiple_tag").val(null).trigger("change");
            $(".myFile").html("");
          } else {
            window.location.href = "product-list";
          }
          showMessage(response.msg, "success");
          window.location.href = "product-list";
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });
  $(document).on("click", ".customersave", function (event) {
    event.preventDefault();
    var form_data = $("#custemer_frm")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "add_customer");
    $.ajax({
      url: "../admin/ajax-call.php",
      method: "POST",
      dataType: "JSON",
      contentType: false,
      processData: false,
      data: form_data,
      beforeSend: function () {
        loading_show(".save_loader_show");
      },
      success: function (data) {
        var response = JSON.parse(data);
        loading_hide(".save_loader_show", "Save");
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

        response["msg"]["city"] !== undefined
          ? $(".city").html(response["msg"]["city"])
          : $(".city").html("");
        response["msg"]["state"] !== undefined
          ? $(".state").html(response["msg"]["state"])
          : $(".state").html("");

        response["msg"]["address"] !== undefined
          ? $(".address").html(response["msg"]["address"])
          : $(".address").html("");
        if (response["data"] == "success") {
          if (!response["updated_customer_id"]) {
            $("#custemer_frm")[0].reset();
            resetThumbnail();
            $(".myFile").html("");
          } else {
            window.location.href = "customer-list";
          }
          showMessage(response.msg, "success");
          window.location.href = "customer-list";
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".invoice ", function (event) {
    event.preventDefault();
    var form_data = $("#invoice_frm")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "invoice");
    form_data.append("total", $('input[name="total"]').val() || "0");
    form_data.append("subtotal", $('input[name="subtotal"]').val() || "0");

    form_data.append(
      "balance_due",
      $('input[name="balance_due"]').val() || "0"
    );
    const formData = {
      item: [],
      quantity: [],
      rate: [],
    };

    $(".attr").each(function () {
      formData.item.push($(this).find(".item_title input").val());
      formData.quantity.push($(this).find(".item_quantity input").val());
      formData.rate.push($(this).find(".item_rate input").val());
    });

    $.ajax({
      url: "../admin/ajax-call.php",
      method: "POST",
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
        if (response["msg"]["amount_paid"] !== undefined) {
          $(".ampunt_p").addClass("error");
        } else {
          $(".amount_paid").html("");
          $(".ampunt_p").removeClass("error");
        }
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

        response["msg"]["due_date"] !== undefined
          ? $(".due_date").html(response["msg"]["due_date"])
          : $(".due_date").html("");

        response["msg"]["balance_due"] !== undefined
          ? $(".balance_due").html(response["msg"]["balance_due"])
          : $(".balance_due").html("");

        response["msg"]["po_number"] !== undefined
          ? $(".po_number").html(response["msg"]["po_number"])
          : $(".po_number").html("");

        if (response.msg) {
          for (const [field, message] of Object.entries(response.msg)) {
            const fieldElement = $(`td[class*='${field}']`);
            fieldElement.addClass("error");
          }
        } else {
          alert("Data submitted successfully!");
        }
        if (response["data"] == "success") {
          if (!response["update_invoice_id"]) {
            $("#invoice_frm")[0].reset();
            resetThumbnail();
            $(".myFile").html("");
          }
          showMessage(response.msg, "success");
          $("td").removeClass("error");
          window.location.href = "invoice-list";
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  function confirmAndDelete(deleteId, routineName, type, onSuccess, fild_name) {
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
        data.delete_table = type;
        data.delete_id = deleteId;
        data.fild_name = fild_name;

        $.ajax({
          url: "../admin/ajax-call.php",
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

  function delete_product_image_response(deleteId) {
    $("[data-id='" + deleteId + "']")
      .closest(".position-relative")
      .remove();
  }

  function delete_product_form_image_response(deleteId) {
    $("[data-id='" + deleteId + "']")
      .closest(".drop-zone__thumb")
      .remove();
    if ($(".drop-zone__thumb").length === 0) {
      $(".pro-zone").show();
    }
  }

  function delete_product_main_image_response(deleteId) {
    $("[data-id='" + deleteId + "']")
      .closest(".modal")
      .find(".btn-close")
      .trigger("click");
    $(".modal-backdrop").removeClass("show");

    loadData("productlisting");
  }

  function delete_invoice_item_response(deleteId) {
    console.log("calling ");
    console.log(deleteId, " ....deleteId");
    $("[data-id='" + deleteId + "']")
      .closest("tr.attr")
      .remove();
    const rows = $("#attributes-body .attr");
    rows.each(function (index) {
      $(this)
        .find(".remove")
        .toggle(rows.length > 1);
    });
    updateSubtotal();
    // loadData("invoicelisting");
  }

  function updateSubtotal() {
    let subtotal = 0;
    $("#attributes-body .attr").each(function () {
      const amountText = $(this).find('input[name="amount[]"]').val();
      const amount = parseFloat(amountText) || 0;
      subtotal += amount;
    });
    const shippingCharges =
      parseFloat($('input[name="shipping_charges"]').val()) || 0;
    const amountPaid = parseFloat($('input[name="amount_paid"]').val()) || 0;
    const total = subtotal + shippingCharges;
    const balanceDue = total - amountPaid;
    $('input[name="subtotal"]').val(subtotal.toFixed(2));
    $('input[name="total"]').val(total.toFixed(2));
    $('input[name="balance_due"]').val(balanceDue.toFixed(2));

    if (balanceDue < 0) {
      $('input[name="balance_due"]').css("background-color", "#f8d7da");
      $('input[name="balance_due"]').css("color", "red");
    } else {
      $('input[name="balance_due"]').css("background-color", "");
      $('input[name="balance_due"]').css("color", "");
      $('input[name="balance_due"]').next("span.errormsg").text("");
    }
  }
  $(document).delegate(".delete", "click", function () {
    var deleteId = $(this).attr("data-id");
    var deleteType = $(this).attr("data-delete-type");
    var filde = $(this).attr("data-fild");

    var deleteMapping = {
      products: { routine: "deleteData", callback: listproduct },
      invoice: { routine: "deleteData", callback: listinvoice },
      customer: { routine: "deleteData", callback: listcustomer },
      blogs: { routine: "deleteData", callback: listblog },
      product_images: {
        routine: "deleteData",
        callback: function () {
          delete_product_image_response(deleteId);
        },
      },
      product_form_image: {
        routine: "deleteData",
        callback: function () {
          delete_product_form_image_response(deleteId);
        },
      },
      product_main_image: {
        routine: "product_main_image",
        callback: function () {
          delete_product_main_image_response(deleteId);
        },
      },
      invoice_item: {
        routine: "deleteData",
        callback: function () {
          delete_invoice_item_response(deleteId);
        },
      },
      users: { routine: "deleteData", callback: listuser },
      videos: { routine: "deleteData", callback: listvideo },
      banners: { routine: "deleteData", callback: listbanner },
      offers: { routine: "deleteData", callback: offerlist },
      topbar: { routine: "deleteData", callback: topbarlist },
      faqs: { routine: "deleteData", callback: listFAQ },
      famous_markets: { routine: "deleteData", callback: listfamousmarket },
      b_textile_catagorys: {
        routine: "deleteData",
        callback: listbrousetextile,
      },
    };

    if (deleteMapping[deleteType]) {
      var routine = deleteMapping[deleteType].routine;
      var callback = deleteMapping[deleteType].callback;

      confirmAndDelete(deleteId, routine, deleteType, callback, filde);
    } else {
      console.error("Delete type not found:", deleteType);
    }
  });

  $(document).on("click", ".videoSave", function (event) {
    event.preventDefault();

    var form_data = $("#videoinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_videos");
    $.ajax({
      url: "../admin/ajax-call.php",
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
        response["msg"]["video_title"] !== undefined
          ? $(".video_title").html(response["msg"]["video_title"])
          : $(".video_title").html("");
        response["msg"]["category"] !== undefined
          ? $(".category").html(response["msg"]["category"])
          : $(".category").html("");
        response["msg"]["youtube_shorts"] !== undefined
          ? $(".youtube_shorts").html(response["msg"]["youtube_shorts"])
          : $(".youtube_shorts").html("");
        response["msg"]["auto_genrate"] !== undefined
          ? $(".auto_genrate").html(response["msg"]["auto_genrate"])
          : $(".auto_genrate").html("");
        if (response["data"] == "success") {
          $("#videoinsert")[0].reset();
          showMessage(response.msg, "success");
          window.location.href = "video-list";
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".blogSave", function (event) {
    event.preventDefault();
    var $contentheader = CKEDITOR.instances["myeditor"];
    if ($contentheader != undefined) {
      CKEDITOR.instances["myeditor"].updateElement();
    }
    var form_data = $("#bloginsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_blog");
    $.ajax({
      url: "../admin/ajax-call.php",
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
        response["msg"]["blog_title"] !== undefined
          ? $(".blog_title").html(response["msg"]["blog_title"])
          : $(".blog_title").html("");
        response["msg"]["category"] !== undefined
          ? $(".category").html(response["msg"]["category"])
          : $(".category").html("");
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
            window.location.href = "blog-list";
          }
          showMessage(response.msg, "success");
          window.location.href = "blog-list";
        } else {
          showMessage(response.msg_error, "fail");
        }
      },
    });
  });

  $(document).on("click", ".bannerSave", function (event) {
    event.preventDefault();
    var form_data = $("#bannerinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_banner");
    $.ajax({
      url: "../admin/ajax-call.php",
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
        response["msg"]["myFile"] !== undefined
          ? $(".myFile").html(response["msg"]["myFile"])
          : $(".myFile").html("");
        response["msg"]["image_alt"] !== undefined
          ? $(".image_alt").html(response["msg"]["image_alt"])
          : $(".image_alt").html("");
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

  $("#search").on("keyup", function () {
    var search_text = $(this).val();
    var page = $(this).data("page");
    var routine_name = $("#search").data("routine");

    var page = $("#search").find(".page-link.active").data("page");
    var sortValue = $(".dropdown .dropdown-item.active").data("value");

    $.ajax({
      url: "../admin/ajax-call.php",
      type: "POST",
      dataType: "json",
      data: {
        sortValue: sortValue,
        search_text: search_text,
        routine_name: routine_name,
        page: page,
      },
      success: function (response) {
        if (typeof response === "string") {
          response = JSON.parse(response);
        }
        var pagination = response.pagination;
        var pagination_needed = response.pagination_needed;

        if (response.outcome != "") {
          if (response.outcome == "No data found") {
            $("#getdata").html(NO_DATA);
          } else {
            $("#getdata").html(response.outcome);
          }
        }
        if (pagination_needed) {
          $("#pagination").html(pagination).show();
        } else {
          $("#pagination").hide();
        }
      },
    });
  });

  $(document).on("click", "#dataPagination a", function (event) {
    event.preventDefault();
    var routine_name = $("#dataPagination").data("routine");

    var page = $(this).data("page");
    var search_text = $(".search-btn_1").val();
    var sortValue = $(".dropdown .dropdown-item.active").data("value");

    $.ajax({
      url: "../admin/ajax-call.php",
      type: "post",
      dataType: "json",
      data: {
        sortValue: sortValue,
        search_text: search_text,
        routine_name: routine_name,
        page: page,
      },
      success: function (data) {
        var data = JSON.parse(data);

        if (data.data === "success") {
          $("#getdata").html(data.outcome);
          $("#pagination").html(data.pagination);
        } else {
          $("#getdata").html(NO_DATA);
          $("#pagination").html("Pagination not found");
        }
      },
    });
  });

  $(document).on("click", "#flexSwitchCheckDefault", function () {
    var previousState = $(this).is(":checked");
    toggle_enabledisable(this, previousState);
  });

  function toggle_enabledisable(thisObj, previousState) {
    var table_name = $("#flexSwitchCheckDefault").val();
    var ischecked_value = $(thisObj).is(":checked") ? 1 : 0;

    $.ajax({
      url: "../admin/ajax-call.php",
      type: "POST",
      dataType: "json",
      data: {
        routine_name: "toggle_enabledisable",
        ischecked_value: ischecked_value,
        table_name: table_name,
      },
      success: function (response) {
        if (response.status === "error") {
          $(thisObj).prop("checked", previousState);
        }
      },
    });
  }

  $(document).on("click", ".marketSave", function (event) {
    event.preventDefault();

    var form_data = $("#f_marketinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_market");
    $.ajax({
      url: "../admin/ajax-call.php",
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

        response["msg"]["shop_name"] !== undefined
          ? $(".shop_name").html(response["msg"]["shop_name"])
          : $(".shop_name").html("");
        response["msg"]["review"] !== undefined
          ? $(".review").html(response["msg"]["review"])
          : $(".review").html("");

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

    var form_data = $("#b_textileCtgryinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_brousetxt");
    $.ajax({
      url: "../admin/ajax-call.php",
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

    var form_data = $("#offersinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_offers");
    $.ajax({
      url: "../admin/ajax-call.php",
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

    var $contentheader = CKEDITOR.instances["myeditor"];
    if ($contentheader != undefined) {
      CKEDITOR.instances["myeditor"].updateElement();
    }
    var form_data = $("#paragraphinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_paragraph");
    $.ajax({
      url: "../admin/ajax-call.php",
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

    var $contentheader = CKEDITOR.instances["myeditor"];
    if ($contentheader != undefined) {
      CKEDITOR.instances["myeditor"].updateElement();
    }
    var form_data = $("#faqinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_faq");
    $.ajax({
      url: "../admin/ajax-call.php",
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

  $(document).on("click", ".topbarSave", function (event) {
    event.preventDefault();
    var form_data = $("#topbarinsert")[0];
    var form_data = new FormData(form_data);
    form_data.append("routine_name", "insert_topbar");
    $.ajax({
      url: "../admin/ajax-call.php",
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

        response["msg"]["topbar_input1"] !== undefined
          ? $(".topbar_input1").html(response["msg"]["topbar_input1"])
          : $(".topbar_input1").html("");

        response["msg"]["topbar_input2"] !== undefined
          ? $(".topbar_input2").html(response["msg"]["topbar_input2"])
          : $(".topbar_input2").html("");

        if (response["data"] == "success") {
          $("#topbarinsert")[0].reset();
          resetThumbnail();
          showMessage(response.msg, "success");
          $(".shop_logo").html("");
          topbarlist();
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
      url: "ajax-call.php",
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      success: function (response) {
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
      url: "ajax-call.php",
      type: "POST",
      dataType: "json",
      contentType: false,
      processData: false,
      data: form_data,
      success: function (response) {
        var response = JSON.parse(response);
        if (response["data"] == "success") {
          showMessage(response["msg"], "success");
          window.location.href = "sign-in";
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
    var search_text = $(".search-btn_1").val();

    var page_name = $(this).closest(".filterDropdown").data("filter");
    var sortValue = $(this).data("value");
    var sortby = $(this).data("sortby");
    $("#dropdownMenuButton1").text(sortby);
    var routin_name =
      page_name == "bloglist"
        ? "bloglisting"
        : page_name == "productlist"
        ? "productlisting"
         : page_name == "customerlist"
        ? "customerlisting"
        : page_name == "videolist"
        ? "videolisting"
        : page_name == "allvideolist"
        ? "allvideolisting"
        : "invoicelisting";
    var tablename = $(this).closest(".dropdown-menu").data("table");
    $(".dropdown-item").each(function () {
      $(this).removeClass("active");
    });
    $(this).addClass("active");
    var page = $("#dataPagination").find(".page-link.active").data("page");
    $.ajax({
      url: "ajax-call.php",
      type: "POST",
      dataType: "json",
      data: {
        routine_name: routin_name,
        sortValue: sortValue,
        search_text: search_text,
        tablename: tablename,
        page: page,
      },
      success: function (response) {
        if (typeof response === "string") {
          response = JSON.parse(response);
        }
        var pagination = response.pagination;
        var pagination_needed = response.pagination_needed;

        if (response.outcome != "") {
          if (response.outcome == "No data found") {
            $("#getdata").html(NO_DATA);
          } else {
            $("#getdata").html(response.outcome);
          }
        }
        if (pagination_needed) {
          $("#pagination").html(pagination).show();
        } else {
          $("#pagination").hide();
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

$(document).on("click", ".picture__img", function () {
  $(this)
    .closest(".imageAppend")
    .find(".pro-zone .pro-zone__input")
    .trigger("click");
});

$(document).on("click", ".close-button_product", function (event) {
  event.stopPropagation();
  const fileName = $(this).data("name");
  storedFiles = storedFiles.filter((file) => file.name !== fileName);
  if ($(this).data("id") == undefined) {
    $(this).closest(".drop-zone__thumb").remove();
  }
  return false;
});
$(document).on("click", ".close-buttons_profile", function (event) {
  console.log("close-buttons_profile");
  event.stopPropagation();
  var closemainclass = $(this).closest(".form-control");
  closemainclass.find(".drop-zone__thumb").remove();
  closemainclass.find(".drop-zone").css("display", "flex");

  var invoiceId = $(".invoiceid").val();
  var customerId = $(".customerid").val();
  var blogId = $(".blogid").val();

  function clearImage(routineName, id, idValue) {
    $.ajax({
      url: "../admin/ajax-call.php",
      type: "POST",
      dataType: "json",
      data: { routine_name: routineName, [id]: idValue },
      success: function (response) {
        if (response.data === "success") {
          console.log(" image cleared successfully.");
        } else {
          console.log("Failed to clear image.");
        }
      },
    });
  }
  if (customerId) clearImage("clear_customer_image", "customer_id", customerId);
  if (invoiceId) clearImage("clear_invoice_image", "invoice_id", invoiceId);
  if (blogId) clearImage("clear_blog_image", "blog_id", blogId);
});

$(document).on("click", ".toggle-button", function () {
  var videoId = $(this).data("video-id");
  var ischecked_value = $(this).is(":checked") ? 1 : 0;

  $.ajax({
    url: "../admin/ajax-call.php",
    type: "POST",
    dataType: "json",
    data: {
      routine_name: "toggle_checkuncheck",
      ischecked_value: ischecked_value,
      video_id: videoId,
    },
    success: function (response) {},
  });
});

function check_toggle_btn(videoId) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: {
      routine_name: "check_toggle_btn",
      video_id: videoId,
    },

    success: function (response) {
      if (response["outcome"] !== undefined) {
        var check_status = response["outcome"]["toggle"];
        $("#checkbox_" + videoId).prop("checked", check_status == 1);
      } else {
      }
    },
  });
}

$(document).on("click", ".protoggle-button", function () {
  var productId = $(this).data("product-id");
  var ischecked_value = $(this).is(":checked") ? 1 : 0;

  $.ajax({
    url: "../admin/ajax-call.php",
    type: "POST",
    dataType: "json",
    data: {
      routine_name: "protoggle_checkuncheck",
      ischecked_value: ischecked_value,
      product_id: productId,
    },
    success: function (response) {},
  });
});

function check_toggle_btn(productId) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: {
      routine_name: "check_toggle_btn",
      product_id: productId,
    },

    success: function (response) {
      if (response["outcome"] !== undefined) {
        var check_status = response["outcome"]["toggle"];
        $("#checkbox_" + productId).prop("checked", check_status == 1);
      } else {
      }
    },
  });
}

$(document).on("click", ".usertoggle-button", function () {
  var userId = $(this).data("user-id");
  var ischecked_value = $(this).is(":checked") ? 1 : 0;

  $.ajax({
    url: "../admin/ajax-call.php",
    type: "POST",
    dataType: "json",
    data: {
      routine_name: "usertoggle_checkuncheck",
      ischecked_value: ischecked_value,
      user_id: userId,
    },
    success: function (response) {},
  });
});

$(document).on("click", ".choosePlan", function () {
  console.log("getPayment");
  var amount = $(this).data("amount");
  var plan_type = $(this).data("plan_type");
  $(".amount").val(amount);
  $(".plan_type").val(plan_type);
});

function check_toggle_btn(userId) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: {
      routine_name: "check_toggle_btn",
      user_id: userId,
    },

    success: function (response) {
      if (response["outcome"] !== undefined) {
        var check_status = response["outcome"]["toggle"];
        $("#checkbox_" + userId).prop("checked", check_status == 1);
      } else {
      }
    },
  });
}

$(document).on("click", ".getPayment", function (e) {
  console.log("getPayment");
  var paymentOption = "netbanking";
  var form_data = $("#getPayment")[0];
  var form_data = new FormData(form_data);
  form_data.append("paymentOption", "netbanking");
  form_data.append("routine_name", "paymentnow");
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    contentType: false,
    processData: false,
    data: form_data,
    beforeSend: function () {
      loading_show(".getPayment.save_loader_show");
    },
    success: function (response) {
      var response = JSON.parse(response);
      console.log(response, "   ...response");
      if (response.data == "success") {
        var orderID = response.order_number;
        var orderNumber = response.order_number;
        var options = {
          key: response.razorpay_key, // Enter the Key ID generated from the Dashboard
          amount: response.outcome.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
          currency: "INR",
          name: "Textile Market Hub", //your business name
          description: response.outcome.description,
          image: "./assets/img/admin_logo.png",
          order_id: response.outcome.order_number, //This is a sample Order ID. Pass
          handler: function (responseData) {
            // window.location.replace("payment-success.php?oid="+orderID+"&rp_payment_id="+response.razorpay_payment_id+"&rp_signature="+response.razorpay_signature);
            console.log(responseData, " ......responseData");
            var razorpay_payment_id = responseData.razorpay_payment_id
              ? responseData.razorpay_payment_id
              : "";
            var razorpay_signature = responseData.razorpay_signature
              ? responseData.razorpay_signature
              : "";
            var inserted_id = response.inserted_id ? response.inserted_id : "";
            $.ajax({
              url: "../admin/ajax-call.php",
              type: "post",
              dataType: "json",
              data: {
                routine_name: "update_success_payment",
                razorpay_signature: razorpay_signature,
                razorpay_payment_id: razorpay_payment_id,
                inserted_id: inserted_id,
              },
              success: function (response) {
                var response = JSON.parse(response);
                if (response.data == "success") {
                  loading_hide(".save_loader_show", "Done");
                  showMessage(response["msg"], "success");
                  window.location.replace("plans");
                } else {
                  showMessage(response["msg"], "fail");
                }
              },
            });
          },
          modal: {
            ondismiss: function () {
              console.log("Modal Dismiss");
              // window.location.replace("payment-success.php?oid="+orderID);
            },
          },
          prefill: {
            //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
            name: response.outcome.name, //your customer's name
            email: response.outcome.email,
            contact: response.outcome.mobile, //Provide the customer's phone number for better conversion rates
          },
          notes: {
            address: "Textile Market Hub",
          },
          config: {
            display: {
              blocks: {
                banks: {
                  name: "Pay using " + paymentOption,
                  instruments: [
                    {
                      method: paymentOption,
                    },
                  ],
                },
              },
              sequence: ["block.banks"],
              preferences: {
                show_default_blocks: true,
              },
            },
          },
          theme: {
            color: "#3399cc",
          },
        };
        var rzp1 = new Razorpay(options);
        rzp1.on("payment.failed", function (response) {
          console.log("payment failed");
          showMessage("payment failed", "fail");
          // window.location.replace("payment-failed.php?oid="+orderID+"&reason="+response.error.description+"&paymentid="+response.error.metadata.payment_id);
        });
        rzp1.open();
        e.preventDefault();
      } else {
        response["msg"]["billing_name"] !== undefined
          ? $(".name").html(response["msg"]["billing_name"])
          : $(".name").html("");
        response["msg"]["billing_email"] !== undefined
          ? $(".email").html(response["msg"]["billing_email"])
          : $(".email").html("");
        response["msg"]["billing_mobile"] !== undefined
          ? $(".phone_number").html(response["msg"]["billing_mobile"])
          : $(".phone_number").html("");
        loading_hide(".getPayment.save_loader_show", "Pay now");
      }
    },
  });
});

function getPaymentPlan() {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "get_payment_plan" },
    success: function (response) {
      var response = JSON.parse(response);
      console.log(response, "..response.plan_type");
      if (response.data == "success") {
        console.log(response.outcome.plan_type, ".....plan type");
        $(".btn[data-plan_type='" + response.outcome.plan_type + "']").prop(
          "disabled",
          true
        );
        $(".btn[data-plan_type='" + response.outcome.plan_type + "']").text(
          "Current plan"
        );
        $(".btn[data-plan_type='" + response.outcome.plan_type + "']").closest(".card").addClass('active');
        $(".btn[data-plan_type='" + response.outcome.plan_type + "']").closest(".card").find(".card-title").append('<span class="plan-tag py-1 px-2">Active</span>');
      }
    },
  });
}
document.addEventListener('DOMContentLoaded', function () {
  flatpickr("#date_range", {
      mode: "range", 
      dateFormat: "d-m-Y", 
      altFormat: "F j, Y",  
      onChange: function(selectedDates, dateStr, instance) {
        
          const start_date = selectedDates[0] ? formatDate(selectedDates[0]) : '';
          const end_date = selectedDates[1] ? formatDate(selectedDates[1]) : '';

          console.log("Start Date:", start_date);
          console.log("End Date:", end_date);

          $.ajax({
              url: "../admin/ajax-call.php", 
              type: "POST", 
              dataType: "json", 
              data: {
                  routine_name: "invoicelisting", 
                  start_date: start_date,
                  end_date: end_date   
              },
              success: function(response) {
                var response = JSON.parse(response);
                console.log(response, "... Response received");

                if (response.outcome != "") {
                  if (response.outcome == "No data found") {
                    $("#getdata").html(NO_DATA);
                  } else {
                    $("#getdata").html(response.outcome);
                  }
                }
              },
              
          });
      }
  });
  function formatDate(date) {
      const day = ('0' + date.getDate()).slice(-2);
      const month = ('0' + (date.getMonth() + 1)).slice(-2);
      const year = date.getFullYear();
      return `${day}-${month}-${year}`;
  }
});

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
$(document).on("click", ".popup-close-button", function () {
  console.log("click");
  $(this).closest(".user_msgactive").remove();
});
document.addEventListener("DOMContentLoaded", function () {
  function handleImagePreview(inputId, previewId) {
    const fileInput = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    if (fileInput) {
      fileInput.addEventListener("change", function () {
        const file = fileInput.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = "block";
          };
          reader.readAsDataURL(file);
        } else {
          preview.style.display = "none";
        }
      });
    }
  }
  handleImagePreview("shop_image_Input", "newpreview");
  handleImagePreview("shop_logo_image", "shop_logo_preview");
});

$(document).on("click", ".modal .btn-close", function () {
  console.log("modal");
  $(this).closest(".modal").find(".drop-zone .drop-zone__thumb").empty();
  $(".drop-zone .pro-zone__prompt").css("display", "block");
});

function get_invoicepdf(id) {
  $.ajax({
    url: "../admin/ajax-call.php",
    type: "post",
    dataType: "json",
    data: { routine_name: "getinvoicepdf", id: id },
    success: function (response) {
      var response = JSON.parse(response);
      console.log("sddd");
      console.log(response.outcome.bill_no);
      $("address[id='bill_no']").html(response.outcome.bill_no);
      $("address[id='ship_to']").html(response.outcome.ship_to);
      $("span[id='date']").html(response.outcome.date);
      $("span[id='terms']").html(response.outcome.terms);
      $("span[id='due_date']").html(response.outcome.due_date);
      $("span[id='po_number']").html(response.outcome.po_number);
      $("span[id='due_date']").html(response.outcome.due_date);
      $("span[id='total']").html(response.outcome.total);
      $("span[id='subtotal']").html(response.outcome.subtotal);
      $("span[id='amount_paid']").html(response.outcome.amount_paid);
      $("span[id='balance_due']").html(response.outcome.balance_due);
      // $("span[id='notes']").html(response.outcome.notes);
      (response.outcome.notes  !== "undefined" && response.outcome.notes  !== "") ? $("span[id='notes']").html(response.outcome.notes) : $("span[id='notes']").closest('.row').html("");
      // $("span[id='terms_condition']").html(response.outcome.terms_condition);
      (response.outcome.terms_condition  !== "undefined" && response.outcome.terms_condition  !== "") ? $("span[id='terms_condition']").html(response.outcome.terms_condition) : $("span[id='terms_condition']").closest('.row').html("");
      $("span[id='shipping_charges']").html(response.outcome.shipping_charges);
      $("p[id='invoice_no']").html(response.outcome.invoice_no);

      if (response.item_data) {
        $(".get_invoiceitems").html(response.item_data);
      }
    },
  });
}
$(document).on('change','#invoice_frm input[name="date"]', function () {
  const selectedDate = $(this).val(); // Get selected "Date"
  if (selectedDate) {
      $('input[name="due_date"]').attr('min', selectedDate);
      if ($('input[name="due_date"]').val() < selectedDate) {
          $('input[name="due_date"]').val('');
      }
  } else {
      $('input[name="due_date"]').removeAttr('min');
  }
});