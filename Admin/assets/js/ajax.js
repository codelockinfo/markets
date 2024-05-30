"use strict";
var CLS_LOADER = '<svg viewBox="0 0 20 20" class="Polaris-Spinner Polaris-Spinner--colorInkLightest Polaris-Spinner--sizeSmall" aria-label="Loading" role="status"><path d="M7.229 1.173a9.25 9.25 0 1 0 11.655 11.412 1.25 1.25 0 1 0-2.4-.698 6.75 6.75 0 1 1-8.506-8.329 1.25 1.25 0 1 0-.75-2.385z"></path></svg>';
var CLS_DELETE = '<svg class="Polaris-Icon__Svg" viewBox="0 0 20 20"><path d="M16 6a1 1 0 1 1 0 2h-1v9a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V8H4a1 1 0 1 1 0-2h12zM9 4a1 1 0 1 1 0-2h2a1 1 0 1 1 0 2H9zm2 12h2V8h-2v8zm-4 0h2V8H7v8z" fill="#000" fill-rule="evenodd"></path></svg>';
var CLS_MINUS = '<svg class="Polaris-Icon__Svg" viewBox="0 0 80 80" focusable="false" aria-hidden="true"><path d="M39.769,0C17.8,0,0,17.8,0,39.768c0,21.956,17.8,39.768,39.769,39.768   c21.965,0,39.768-17.812,39.768-39.768C79.536,17.8,61.733,0,39.769,0z M13.261,45.07V34.466h53.014V45.07H13.261z" fill-rule="evenodd" fill="#DE3618"></path></svg>';
var CLS_PLUS = '<svg class="Polaris-Icon__Svg" viewBox="0 0 20 20" focusable="false" aria-hidden="true"><path d="M17 9h-6V3a1 1 0 1 0-2 0v6H3a1 1 0 1 0 0 2h6v6a1 1 0 1 0 2 0v-6h6a1 1 0 1 0 0-2" fill-rule="evenodd"></path></svg>';
var CLS_CIRCLE_MINUS = '<svg class="Polaris-Icon__Svg" viewBox="0 0 80 80" focusable="false" aria-hidden="true"><path d="M39.769,0C17.8,0,0,17.8,0,39.768c0,21.956,17.8,39.768,39.769,39.768   c21.965,0,39.768-17.812,39.768-39.768C79.536,17.8,61.733,0,39.769,0z M13.261,45.07V34.466h53.014V45.07H13.261z" fill-rule="evenodd" fill="#DE3618"></path></svg>';
var CLS_CIRCLE_PLUS = '<svg class="Polaris-Icon__Svg" viewBox="0 0 510 510" focusable="false" aria-hidden="true"><path d="M255,0C114.75,0,0,114.75,0,255s114.75,255,255,255s255-114.75,255-255S395.25,0,255,0z M382.5,280.5h-102v102h-51v-102    h-102v-51h102v-102h51v102h102V280.5z" fill-rule="evenodd" fill="#3f4eae"></path></svg>';

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    cname = (cname != undefined) ? cname : 'flash_message';
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) { 
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function flashNotice($message, $class) {
    $class = ($class != undefined) ? $class : '';
    
    var flashmessageHtml = '<div class="inline-flash-wrapper animated bounceInUp inline-flash-wrapper--is-visible ourFlashmessage"><div class="inline-flash ' + $class + '  "><p class="inline-flash__message">' + $message + '</p></div></div>';
    
    if ($('.ourFlashmessage').length) {
        $('.ourFlashmessage').remove();
    }
    $("body").append(flashmessageHtml);
    
    setTimeout(function () {
        if ($('.ourFlashmessage').length) {
            $('.ourFlashmessage').remove();
        }
    }, 3000);
}

function changeTab(evt, id) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("Polaris-Tabs_tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("Polaris-Tabs__Tab");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("Polaris-Tabs__Tab--selected", "");
    }
    document.getElementById(id).style.display = "block";
    evt.currentTarget.className += " Polaris-Tabs__Tab--selected";
}

function loading_show($selector) {
    $($selector).addClass("Polaris-Button--loading").html('<span class="Polaris-Button__Content"><span class="Polaris-Button__Spinner">' + CLS_LOADER + '</span><span>Loading</span></span>').fadeIn('fast').attr('disabled', 'disabled');
}

function loading_hide($selector, $buttonName, $buttonIcon) {
    if ($buttonIcon != undefined) {
        $buttonIcon = '<span class="Polaris-Button__Icon"><span class="Polaris-Icon">' + $buttonIcon + '</span></span>'
    } else {
        $buttonIcon = '';
    }
    $($selector).removeClass("Polaris-Button--loading").html('<span class="Polaris-Button__Content">' + $buttonIcon + '<span>' + $buttonName + '</span></span>').removeAttr("disabled");
}


function table_loader(selector, colSpan) {
    $(selector).html('<tr><td colspan="' + colSpan + '" style="text-align:center;"><div class="loader-spinner"><svg viewBox="0 0 44 44" class="Polaris-Spinner Polaris-Spinner--colorTeal Polaris-Spinner--sizeLarge" role="status"><path d="M15.542 1.487A21.507 21.507 0 0 0 .5 22c0 11.874 9.626 21.5 21.5 21.5 9.847 0 18.364-6.675 20.809-16.072a1.5 1.5 0 0 0-2.904-.756C37.803 34.755 30.473 40.5 22 40.5 11.783 40.5 3.5 32.217 3.5 22c0-8.137 5.3-15.247 12.942-17.65a1.5 1.5 0 1 0-.9-2.863z"></path></svg></div></td></tr>')
}

function redirect403() {
    window.location = "https://www.shopify.com/admin/apps";
}

var loadShopifyAJAX= null;
var js_loadShopifyDATA = function js_loadShopifyDATA(listingID, pageno) {
    if (loadShopifyAJAX && loadShopifyAJAX.readyState != 4) {
        loadShopifyAJAX.abort();
    }
    var searchKEY = $("#" + listingID + "SearchKeyword").val();
    var searchKEYLEN = (searchKEY != undefined) ? searchKEY.length : 0;
    if (searchKEYLEN == 0 || searchKEYLEN >= 3) {
        var shopifyApi = $('#' + listingID).attr('data-apiName');  
        var limit = $("#" + listingID + "limit").val();
        var from = $('#' + listingID).data('from');
        var routineNAME = 'take_' + from + '_shopify_data';
        var fields = $('#' + listingID).attr('data-fields');
        fields = (fields != undefined) ? fields : '*';
        var searchFields = $('#' + listingID).attr('data-search');
        pageno = (pageno != undefined) ? pageno : 1;
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
                pagination_method: js_loadShopifyDATA.name
            }, 
            beforeSend: function () {
                var listingTH = $('#' + listingID + ' thead tr th').length;
                table_loader("table#" + listingID + " tbody", listingTH);
            },  
            success:function(comeback){
                if (comeback['code'] != undefined && comeback['code'] == '403') {
                    redirect403();
                } else if (comeback['outcome'] == 'true') {
                    var tablehtml =  comeback['html'] !== undefined && comeback['html'] != '' ? comeback['html'] : '<td  colspan="10" class="nodata"> NO DATA FOUND </td>';
                    $('table#' + listingID + ' tbody').html(tablehtml);
                    $('#' + listingID + 'Pagination').html(comeback['pagination_html']);
                } else {
                }
            }
        });
    }
}

// DEMO FUNCTION CALLING ON LOAD
function demo(){
    // e.preventDefault();
    // var frmData = $(this).serialize();
    // frmData += '&' + $.param({"method_name": 'set_store_settings', 'shop': shop});
    $.ajax({
        url: "../admin/ajax_call.php",
        type: "post",
        dataType: "json",
        data: {"routine_name":"demo_function"},
        beforeSend: function () {
            // loading_show('save_loader_show');
        },
        success: function (response) {
            // if (response['code'] != undefined && response['code'] == '403') {
            //     redirect403();
            // } else if (response['result'] == 'success') {
            //     $("#errorsmsgBlock").hide();
            //     flashNotice(response['message']);
            // } else if (response['msg_contented'] != undefined && response['msg_manage'] != undefined) {
            //     $("#errorBlockInfo").html(response['msg_contented']);
            //     $("#errorBlockManage").html(response['msg_manage']);
            //     $("#errorsmsgBlock").show();
            //     $("html, body").animate({scrollTop: 0}, "slow");
            // } else {
            //     flashNotice(response['message']);
            // }
            // loading_hide('save_loader_show', 'Save');
        }
    });
}


$(document).ready(function() {
    demo(); // CALLING ON LOAD FOR TESTING
    alert("fd");
});