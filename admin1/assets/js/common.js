
// drag & drop js

// function showMessage(msg, type) {
//   var alertTitle = (type === "success") ? "Success" : (type === "fail") ? "Failure" : "Error";
//   Swal.fire({
//       title: alertTitle,
//       text: msg,
//       icon: (type === "fail") ? "error" : type,
//       timer: 5000,
//       timerProgressBar: true,
//       showConfirmButton: false
//    });
// }

document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");
  // dropZoneElement.addEventListener("click", (e) => {
  //   inputElement.click();
  // });
  // var alertTitle = (type) => (type === "success") ? "Success" : (type === "fail") ? "Failure" : "Error";
  dropZoneElement.addEventListener("click", () => inputElement.click());

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      const file = inputElement.files[0];
      if (file.type.startsWith("image/")) {
        console.log("changefile" + file);
        updateThumbnail(dropZoneElement, file);
      } else {
        Swal.fire({
          icon: "error",
          title: alertTitle("fail"),
          text: "Only PNG, JPG, JPEG, GIF files are allowed!",
        });
        // inputElement.value = "";  // Clear the input
      }
      // updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });
  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    // dropZoneElement.classList.add("drop-zone--over");
  });
  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();
    if (e.dataTransfer.files.length) {
      // const file = e.dataTransfer.files[0];
      if (file.type.startsWith("image/")) {
        // inputElement.files = e.dataTransfer.files;
        // console.log("dropfile" + file );
        // updateThumbnail(dropZoneElement, file);
        // var form_data = $("form")[0];
        // form_data.append('file', file);
      } else {
        Swal.fire({
          icon: "error",
          title: alertTitle("fail"),
          text: "Only PNG, JPG, JPEG, GIF files are allowed!",
        });
        // inputElement.value = "";  // Clear the input
      }
      // inputElement.files = e.dataTransfer.files;
      // updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }
    // dropZoneElement.classList.remove("drop-zone--over");
  });
});
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }
  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }
  // thumbnailElement.dataset.label = file.name;
  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;
      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture__img");
      const closeButton = document.createElement("button");
      closeButton.classList.add("close-button","d-none");
      closeButton.innerText = "x";
      closeButton.addEventListener("click", () => {
        thumbnailElement.innerHTML = "";
        thumbnailElement.classList.remove("drop-zone__thumb");
        thumbnailElement.innerHTML =
          '<span class="drop-zone__prompt">Drop file here or click to upload</span>';
      });
      thumbnailElement.innerHTML = "";
      thumbnailElement.appendChild(img);
      thumbnailElement.appendChild(closeButton);
      $(".myFile").text("");
      console.log(thumbnailElement);
      console.log(thumbnailElement.closest(".mb-3"));
      thumbnailElement.closest(".mb-3").find(".myFile").html("");
    });

    reader.readAsDataURL(file);
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

// multi select js in product form page

$(document).ready(function () {
  var jsselect2multiple = $(".js-select2-multi");
  var jsselect2multiplecategories = $(".js-select2-multi_categories");
  if (jsselect2multiple.length > 0) {
    $(".js-select2-multi").select2({
      placeholder: "Select products",
      createTag: function (params) {
        var term = $.trim(params.term);
        if (term === "") {
          return null;
        }
        return {
          id: term,
          text: term,
          newTag: true,
        };
      },
    });
  }
  if (jsselect2multiplecategories.length > 0) {
    $(".js-select2-multi_categories").select2({
      placeholder: "Select a category",
      createTag: function (params) {
        var term = $.trim(params.term);
        if (term === "") {
          return null;
        }
        return {
          id: term,
          text: term,
          newTag: true,
        };
      },
    });
  }
});

// dropdown active add & remove js

$(document).on("click", ".navigation ul li", function () {
  $(this).addClass("active").siblings().removeClass("active");
});

// invoice page add remove functionality

var row = $(".attr");

function addRow() {
  row.clone(true, true).appendTo("#attributes");
}

function removeRow(button) {
  button.closest("tr.attr").remove();
}

$("#attributes .attr:first-child").find(".remove").hide();

$(".add").on("click", function () {
  addRow();
  if ($("#attributes .attr").length > 1) {
    $(".remove").show();
  }
});
$(".remove").on("click", function () {
  if ($("#attributes .attr").size() == 1) {
    $(".remove").hide();
  } else {
    removeRow($(this));

    if ($("#attributes .attr").size() == 1) {
      $(".remove").hide();
    }
  }
});

// duantity js

$(document).ready(function () {
  $(".increment-btn").click(function (e) {
    e.preventDefault();

    var inc_value = $(this).closest(".product_data").find(".qty-input").val();
    var value = parseInt(inc_value, 10);
    value = isNaN(value) ? 0 : value;
    if (value < 10) {
      value++;
      $(this).closest(".product_data").find(".qty-input").val(value);
    }
  });

  $(".decrement-btn").click(function (e) {
    e.preventDefault();

    var dec_value = $(this).closest(".product_data").find(".qty-input").val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
      value--;
      $(this).closest(".product_data").find(".qty-input").val(value);
    }
  });
});
