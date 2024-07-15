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

    

