$(document).ready(function() {
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
                // loading_show('save_loader_show');
            },
            success: function (response) {
                var response = JSON.parse(response);
                console.log(response);
                response["msg"]["name"] !== undefined ? $(".name").html (response["msg"]["name"]) : $(".name").html("");
                response["msg"]["email"] !== undefined ? $(".email").html (response["msg"]["email"]) : $(".email").html("");
                response["msg"]["message"] !== undefined ? $(".message").html (response["msg"]["message"]) : $(".message").html("");
            }
        });
    });

});
function loadData(routineName) {
    console.log(routineName + " on load");
    $.ajax({
        url: "../client1/ajax_call.php",
        type: 'post',
        dataType: "json",
        data: {"routine_name": routineName}, // Correctly pass the routineName parameter
        success: function (response) {
            var response = JSON.parse(response);
            $("#getdata").html(response.outcome);
        }
    });
}

function latestbanner() {
    loadData('bannershow');
}  