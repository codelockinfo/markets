$(document).ready(function() {
    console.log("CLient ajax call");
    $('.contactForm').click(function(){
        console.log("contactForm");
        $.ajax({
            url: "../client1/ajax_call.php",
            type: "post",
            dataType: "json",
            data: {"routine_name":"conatct_form"},
            beforeSend: function () {
                // loading_show('save_loader_show');
            },
            success: function (response) {
                console.log(response);
                // loading_hide('save_loader_show', 'Save');
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