function loading_show($selector) {
    $($selector).addClass("loading").html('<i class="fas fa-circle-notch fa-spin"></i>').fadeIn('fast').attr('disabled', 'disabled');
}

function loading_hide($selector, $buttonName, $buttonIcon) {
  if ($buttonIcon != undefined) {
        $buttonIcon = '<i class="fas fa-circle-notch fa-spin"></i>'
  } else {
      $buttonIcon = $buttonName
  }
  $($selector).removeClass("loading").html($buttonIcon).removeAttr("disabled");
}

$(document).ready(function() {
    
    function showMessage(msg, type) {  
        var alertTitle = (type === "success") ? "Success" : (type === "fail") ? "Failure" : "Error";
        Swal.fire({
            title: alertTitle, 
            text: msg,
            icon: (type === "fail") ? "error" : type, 
            timer: 5000,
            timerProgressBar: true,
            showConfirmButton: false
          });
    }
    
    console.log("CLient ajax call");
    $('.contactForm').click(function(){
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
                loading_show('save_loader_show');
            },
            success: function (response) {
                var response = JSON.parse(response);
                loading_hide(".save_loader_show", "Submit Now");
                console.log(response);
                response["msg"]["name"] !== undefined ? $(".name").html (response["msg"]["name"]) : $(".name").html("");
                response["msg"]["email"] !== undefined ? $(".email").html (response["msg"]["email"]) : $(".email").html("");
                response["msg"]["message"] !== undefined ? $(".message").html (response["msg"]["message"]) : $(".message").html("");
                if(response['data'] == "success"){
                    showMessage(response.msg, "success");
                    $(".client_contact_form")[0].reset();    
                } 
            }
        });
    });

});

function loadData(routineName, elementId) {
    console.log(routineName + " on load");
    $.ajax({
        url: "../client1/ajax_call.php",
        type: 'post',
        dataType: "json",
        data: {"routine_name": routineName},
        success: function (response) {
            var response = JSON.parse(response);
            $("#" + elementId).append(response.outcome); 
            console.log("----");
            console.log(response.outcome);
        },
        error: function(xhr, status, error) {
            console.error("Error occurred:", error);
        }
    });
}

    function latestbanner() {
        loadData('bannershow', 'getdata');
    }

    function famousmarket() {
        loadData('famousmarketshow', 'getmarket'); 
    }
    function offersshow() {
        loadData('offershow', 'getoffer'); 
    }
    function paragraphs() {
        loadData('paragraphshow', 'getparagraph'); 
    }
    function videos() {
        loadData('videoshow', 'getvideo'); 
    }
    function FAQshow() {
        loadData('FAQshow', 'accordionExample'); 
    }
    function reviewshow() {
        loadData('reviewshow', 'getreview'); 
    }
    function productshowclientside() {
        loadData('productshowclientside', 'getproduct'); 
    }

    

