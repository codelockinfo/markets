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

window.onload = function () {
  document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");
    const promptElement = dropZoneElement.querySelector(".pro-zone__prompt");

    if (!promptElement) {
      console.error("pro-zone__prompt element is missing");
      return;
    }

    dropZoneElement.addEventListener("click", () => {
      if (!inputElement.disabled) {
        inputElement.click();
      }
    });
    console.log(inputElement);
    console.log("LLLLLLLLLLLLLLLLLLLLLLLLLL");
    inputElement.addEventListener("change", (e) => {
      console.log("inputelement change");
      if (inputElement && inputElement.files && inputElement.files.length > 0) {
        const file = inputElement.files[0];
        if (file.type.startsWith("image/")) {
          clearThumbnail(dropZoneElement);
          updateThumbnail(dropZoneElement, file, inputElement);
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
        promptElement.style.display = "block";
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
          clearThumbnail(dropZoneElement);
          updateThumbnail(dropZoneElement, file, inputElement);

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
};

function clearThumbnail(dropZoneElement) {
  const thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
  if (thumbnailElement) {
    thumbnailElement.innerHTML = "";
  }
}

function updateThumbnail(dropZoneElement, file, inputElement) {
  console.log("updateThumbnail");
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
      console.log("Load");
      const img = document.createElement("img");
      img.src = e.target.result;
      img.classList.add("picture__img");
      const closeButton = document.createElement("button");
      closeButton.classList.add("close-button");
      closeButton.innerText = "x";

      closeButton.addEventListener("click", (event) => {
        event.stopPropagation();

        thumbnailElement.innerHTML = "";
        inputElement.value = "";
        inputElement.disabled = false;
        promptElement.style.display = "block";
      });

      // Append image and close button to thumbnail element
      thumbnailElement.appendChild(img);
      thumbnailElement.appendChild(closeButton);

      // Hide the prompt
      promptElement.style.display = "none";
    });

    reader.readAsDataURL(file);
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

$(document).ready(function () {
  function addRow() {
    const row = $(".attr").first().clone(true, true);
    row.find("input").val("");
    row.find(".remove").show();
    $("#attributes-body").append(row);
    updateRemoveButtonVisibility();
    updateSubtotal();
  }

  function removeRow(button) {
    button.closest("tr.attr").remove();
    updateRemoveButtonVisibility();
    updateSubtotal();
  }

  function updateRemoveButtonVisibility() {
    const rows = $("#attributes-body .attr");
    rows.each(function (index) {
      $(this)
        .find(".remove")
        .toggle(rows.length > 1);
    });
  }

  function calculateAmount(row) {
    const quantity =
      parseFloat(row.find('input[name="quantity[]"]').val()) || 0;
    const rate = parseFloat(row.find('input[name="rate[]"]').val()) || 0;
    const amount = quantity * rate;
    row.find('input[name="amount[]"]').val(amount.toFixed(2));
    updateSubtotal();
  }

  function updateSubtotal() {
    let subtotal = 0;
    $("#attributes-body .attr").each(function () {
      const amountText = $(this).find('input[name="amount[]"]').val();
      const amount = parseFloat(amountText) || 0;
      subtotal += amount;
    });

    const amountPaid = parseFloat($('input[name="amount_paid"]').val()) || 0;
    const balanceDue = subtotal - amountPaid;

    $('input[name="subtotal"]').val(subtotal.toFixed(2));
    $('input[name="total"]').val(subtotal.toFixed(2));
    $('input[name="balance_due"]').val(balanceDue.toFixed(2));
  }

  $(".add")
    .off("click")
    .on("click", function () {
      addRow();
    });

  $("#attributes-body").on("click", ".remove", function () {
    removeRow($(this));
  });

  $("#attributes-body").on(
    "input",
    'input[name="quantity[]"], input[name="rate[]"]',
    function () {
      const row = $(this).closest("tr");
      calculateAmount(row);
    }
  );

  $('input[name="amount_paid"]').on("input", function () {
    document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
      const dropZoneElement = inputElement.closest(".drop-zone");
      const promptElement = dropZoneElement.querySelector(".pro-zone__prompt"); //dropjon

      dropZoneElement.addEventListener("click", () => {
        console.log("dropZoneElement click");
        if (!inputElement.disabled) {
          inputElement.click();
        }
      });
      inputElement.addEventListener("change", (e) => {
        console.log("change");
        if (inputElement.files.length) {
          const file = inputElement.files[0];
          if (file.type.startsWith("image/")) {
            clearThumbnail(dropZoneElement);
            updateThumbnail(dropZoneElement, file, inputElement);

            promptElement.style.display = "none";
          } else {
            Swal.fire({
              icon: "error",
              title: "Failure",
              text: "Only PNG, JPG, JPEG, GIF files are allowed!",
            });
            inputElement.value = "";
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
        console.log("dropZoneElement drop");
        const file = e.dataTransfer.files[0];
        if (file && file.type.startsWith("image/")) {
          inputElement.files = e.dataTransfer.files;
          clearThumbnail(dropZoneElement);
          updateThumbnail(dropZoneElement, file, inputElement);

          promptElement.style.display = "none";
        } else {
          Swal.fire({
            icon: "error",
            title: "Failure",
            text: "Only PNG, JPG, JPEG, GIF files are allowed!",
          });
          inputElement.value = "";
        }
        dropZoneElement.classList.remove("drop-zone--over");
      });
    });
    function clearThumbnail(dropZoneElement) {
      const thumbnailElement =
        dropZoneElement.querySelector(".drop-zone__thumb");

      if (thumbnailElement) {
        thumbnailElement.innerHTML = "";
      }
    }

    function updateThumbnail(dropZoneElement, file, inputElement) {
      console.log("updateThumbnail   jjj");
      let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
      const promptElement = dropZoneElement.querySelector(".pro-zone__prompt");

      if (promptElement) {
        promptElement.style.display = "none";
      }
      if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop-zone__thumb");
        dropZoneElement.appendChild(thumbnailElement);
      }

      thumbnailElement.innerHTML = "";

      if (file.type.startsWith("image/")) {
        const reader = new FileReader();
        reader.addEventListener("load", (e) => {
          console.log("load dosc");
          const img = document.createElement("img");
          img.src = e.target.result;
          img.classList.add("picture__imgs");

          const closeButton = document.createElement("button");
          closeButton.classList.add("close-button");
          closeButton.innerText = "x";

          closeButton.addEventListener("click", () => {
            thumbnailElement.innerHTML = "";
            inputElement.value = "";
            inputElement.disabled = false;
            if (!dropZoneElement.querySelector(".pro-zone__prompt")) {
              promptElement.style.display = "block";
            }
          });

          thumbnailElement.appendChild(img);
          thumbnailElement.appendChild(closeButton);
        });

        reader.readAsDataURL(file);
      }
    }
    updateSubtotal();
  });

  updateRemoveButtonVisibility();
  updateSubtotal();
});

// duantity js
$(".increment-btn").click(function (e) {
  e.preventDefault();
  var inc_value = $(this).closest(".product_data").find(".qty-input").val();
  var value = parseInt(inc_value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  $(this).closest(".product_data").find(".qty-input").val(value);
  console.log("After increment: ", value);
});

$(".decrement-btn").click(function (e) {
  e.preventDefault();
  var dec_value = $(this).closest(".product_data").find(".qty-input").val();
  var value = parseInt(dec_value, 10);
  value = isNaN(value) ? 0 : value;
  console.log("Before decrement: ", value);
  if (value > 1) {
    value--;
    $(this).closest(".product_data").find(".qty-input").val(value);
    console.log("After decrement: ", value);
  }
});
// loder
$(window).on("load", function () {
  $("#preloader").fadeOut();
  $("#status").fadeOut(1000);
});
// multiple
document.querySelectorAll(".pro-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".pro-zone");

  dropZoneElement.addEventListener("click", () => inputElement.click());

  inputElement.addEventListener("change", (e) => {
    console.log("ooooooooooooooo");
    const promptText = dropZoneElement.querySelector(".pro-zone__prompt");

    if (inputElement.files.length > 0) {
      promptText.style.display = "none";
    } else {
      promptText.style.display = "block";
    }

    const fileArray = Array.from(inputElement.files);
    fileArray.forEach((file, index) => {
      if (file.type.startsWith("image/")) {
        updateThumbnail(dropZoneElement, file, index, inputElement);
      } else {
        Swal.fire({
          icon: "error",
          title: alertTitle("fail"),
          text: "Only PNG, JPG, JPEG, GIF files are allowed!",
        });
        inputElement.value = "";
      }
    });
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
  });

  dropZoneElement.addEventListener("drop", (e) => {
    console.log("--------------------------");
    e.preventDefault();
    const promptText = dropZoneElement.querySelector(".pro-zone__prompt");

    if (e.dataTransfer.files.length > 0) {
      promptText.style.display = "none";
    } else {
      promptText.style.display = "block";
    }

    const fileArray = Array.from(e.dataTransfer.files);
    fileArray.forEach((file, index) => {
      if (file.type.startsWith("image/")) {
        updateThumbnail(dropZoneElement, file, index, inputElement);
      } else {
        Swal.fire({
          icon: "error",
          title: alertTitle("fail"),
          text: "Only PNG, JPG, JPEG, GIF files are allowed!",
        });
      }
    });
  });
});

function updateThumbnail(dropZoneElement, file, index, inputElement) {
  console.log("updatethumbnail");
  let thumbnailContainer = dropZoneElement.querySelector(".drop-zone__thumb");

  if (!thumbnailContainer) {
    thumbnailContainer = document.createElement("div");
    thumbnailContainer.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailContainer);
  }

  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      console.log("hjdsdsjdsjdhsjdhjsd");
      const imgWrapper = document.createElement("div");
      imgWrapper.classList.add("img-wrapper");

      const img = document.createElement("img");
      img.src = e.target.result;
      img.classList.add("picture__img");

      const closeButton = document.createElement("button");
      closeButton.classList.add("close-button");
      closeButton.innerText = "x";

      closeButton.addEventListener("click", (event) => {
        event.stopPropagation();
        thumbnailContainer.removeChild(imgWrapper);
        if (thumbnailContainer.childElementCount === 0) {
          const promptText = dropZoneElement.querySelector(".pro-zone__prompt");
          promptText.style.display = "block";
        }
        const fileListArray = Array.from(inputElement.files);
        fileListArray.splice(index, 1);
        const dataTransfer = new DataTransfer();
        fileListArray.forEach((file) => dataTransfer.items.add(file));
        inputElement.files = dataTransfer.files;
      });

      imgWrapper.appendChild(img);
      imgWrapper.appendChild(closeButton);
      thumbnailContainer.appendChild(imgWrapper);
    });

    reader.readAsDataURL(file);
  }
}

$(document).on("change", ".addcategory", function () {
  if ($(this).is(":checked")) {
    $(".categoryinput").removeClass("hidecategory");
  } else {
    $(".categoryinput").addClass("hidecategory");
  }
});
