console.log("common.js");

// drag & drop js

document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");
    dropZoneElement.addEventListener("click", (e) => {
      inputElement.click();
    });
    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateThumbnail(dropZoneElement, inputElement.files[0]);
      }
    });
    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
        dropZoneElement.classList.add("drop-zone--over");
    });
    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("drop-zone--over");
      });
    });
    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();
        if (e.dataTransfer.files.length) {
          inputElement.files = e.dataTransfer.files;
          updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
        }
      dropZoneElement.classList.remove("drop-zone--over");
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
    thumbnailElement.dataset.label = file.name;
    // Show thumbnail for image files
    if (file.type.startsWith("image/")) {
      const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;
      const img = document.createElement("img");
      img.src = readerTarget.result;
      img.classList.add("picture__img");
      const closeButton = document.createElement("button");
      closeButton.classList.add("close-button");
      closeButton.innerText = 'x';
      thumbnailElement.innerHTML = "";
      thumbnailElement.appendChild(img);
      thumbnailElement.appendChild(closeButton);
      // console.log(thumbnailElement);
      // console.log(thumbnailElement.closest(".mb-3").html());
      // thumbnailElement.closest(".mb-3").find(".myFile").html('');
    });

      reader.readAsDataURL(file);
    } 
    else {
      thumbnailElement.style.backgroundImage = null;
    }
  }

// multi select js in product form page


$(document).ready(function() {
  
  $(".js-select2").select2();

  
  $(".js-select2-multi").select2();
  $(".js-select2-multi").val('Saree').trigger('change');
  
  $(".large").select2({
    dropdownCssClass: "big-drop",
  });
  
});




  