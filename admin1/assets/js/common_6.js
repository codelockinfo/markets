window.onload = function () {
  console.log("WINDOW ON LOAD");
  document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    console.log("drop-zone__input");
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

  function clearThumbnail(dropZoneElement) {
    const thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
    if (thumbnailElement) {
      thumbnailElement.innerHTML = "";
    }
  }

  function updateThumbnail(dropZoneElement, file, inputElement) {
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
};
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

// invoice add row
$(document).ready(function () {
  function addRow() {
    const row = $(".attr").first().clone(true, true);
    row.find("input").val("");
    row.find(".remove").show();
    row.find('.invoice-rowclose').removeAttr('data-id').removeClass('delete');
    $("#attributes-body").append(row);
    updateRowClasses();
    updateRemoveButtonVisibility();
    updateSubtotal();
  }
  function updateRowClasses() {
    $(".attr").each(function (index) {
      $(this)
        .find(".item_0, .quantity_0, .rate_0")
        .each(function () {
          let baseClass = "";
          if ($(this).hasClass("item_0")) {
            baseClass = "item";
          } else if ($(this).hasClass("quantity_0")) {
            baseClass = "quantity";
          } else if ($(this).hasClass("rate_0")) {
            baseClass = "rate";
          }

          if (baseClass) {
            $(this)
              .removeClass(function (_, className) {
                return (
                  className.match(/(^|\s)(item|quantity|rate)_\d+/g) || []
                ).join(" ");
              })
              .addClass(`${baseClass}_${index}`);
          }
          $(this)
            .find("input[name], span[name]")
            .each(function () {
              const originalName = $(this).attr("name");
              if (originalName) {
                const updatedName = originalName.replace(
                  /\[\d+\]/,
                  `[${index}]`
                );
                $(this).attr("name", updatedName);
              }
            });
        });
    });
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
// loder
$(window).on("load", function () {
  setTimeout(function () {
    $("#preloader").fadeOut();
    $("#status").fadeOut(1000);
  },5000); 
});

// multiple
document.querySelectorAll(".pro-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".pro-zone");
  const imageAppend = inputElement.closest(".imageAppend");

  dropZoneElement.addEventListener("click", () => inputElement.click());

  inputElement.addEventListener("change", () => {
    const fileArray = Array.from(inputElement.files);
    storedFiles = [...storedFiles, ...fileArray];
    storedFiles = storedFiles.filter(
      (file, index, self) =>
        index === self.findIndex((f) => f.name === file.name)
    );
    
    console.log("Merged Files p image:", storedFiles);
    updatePromptText(dropZoneElement, inputElement.files);


    fileArray.forEach((file) => {
      if (file.type.startsWith("image/")) {
        updateThumbnail(dropZoneElement, file, inputElement, imageAppend);
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
    e.preventDefault();
    const fileArray = Array.from(e.dataTransfer.files);
    storedFiles = [...storedFiles, ...fileArray];
    storedFiles = storedFiles.filter(
      (file, index, self) =>
        index === self.findIndex((f) => f.name === file.name)
    );

    
    updatePromptText(dropZoneElement, fileArray);

    fileArray.forEach((file) => {
      if (file.type.startsWith("image/")) {
        updateThumbnail(dropZoneElement, file, inputElement, imageAppend);
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

function updatePromptText(dropZoneElement, files) {
  const promptText = dropZoneElement.querySelector(".pro-zone__prompt");
  const filelabel = dropZoneElement.querySelector(".file-label");
  promptText.style.display = storedFiles.length > 0 ? "none" : "block";
  filelabel.style.display = storedFiles.length > 0 ? "block" : "none";
  if(storedFiles.length > 0 ){
    dropZoneElement.classList.add("col-6","col-lg-3","col-md-4");
  }else{
    dropZoneElement.classList.remove("col-6","col-lg-3","col-md-4");
  }
}

function updateThumbnail(dropZoneElement, file, inputElement, imageAppend) {
  let thumbnailContainer = dropZoneElement.querySelector(".drop-zone__thumb");

  if (!thumbnailContainer) {
    thumbnailContainer = document.createElement("div");
    thumbnailContainer.classList.add("drop-zone__thumb","col-6","col-lg-3","col-md-4");
    // imageAppend.appendChild(thumbnailContainer);
    dropZoneElement.parentNode.insertBefore(thumbnailContainer, dropZoneElement);

  }

  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const imgWrapper = document.createElement("div");
      imgWrapper.classList.add("img-wrapper");

      const img = document.createElement("img");
      img.src = e.target.result;
      img.classList.add("picture__img");

      const closeButton = document.createElement("button");
      closeButton.classList.add("close-button_product");
      closeButton.setAttribute('data-name', file.name);
      closeButton.innerText = "x";

      closeButton.addEventListener("click", (event) => {
        event.stopPropagation();
        const fileName = closeButton.getAttribute("data-name");
        storedFiles = storedFiles.filter((file) => file.name !== fileName);
        // thumbnailContainer.removeChild(imgWrapper);
        thumbnailContainer.remove();
        const fileListArray = Array.from(inputElement.files);
        fileListArray.splice(fileListArray.indexOf(file), 1);
        const dataTransfer = new DataTransfer();
        fileListArray.forEach((file) => dataTransfer.items.add(file));
        inputElement.files = dataTransfer.files;

        updatePromptText(dropZoneElement, inputElement.files);
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
