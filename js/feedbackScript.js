const next = "next";
const prev = "prev";
const first = "first";

var currentPage = 0;
var reviewsPerPage = 10;
$(document).ready(function() {
    currentPage = 0;
    getFeedback(first);

});


var getFeedback = function (pageRequest) {

    var offset = 0;

    if (pageRequest == next) {
        offset = reviewsPerPage * (currentPage + 1);
        $('#button_prev_page').show();
    } else if (pageRequest == prev){
        offset = reviewsPerPage * (currentPage - 1);
        $('#button_next_page').show();
    } else if (pageRequest == first) {
        offset = 0;
        $('#button_prev_page').hide();
    }

    var displayReviews = reviewsPerPage;
    var threshold = 1;
    var google = 1;
    var internal = 1;

    var res = 0;
    $.ajax({
        type: "POST",
        url: 'includes/ajax_service.php',
        data: {
            fn: 'getFeedback',
            parms: {
                offset: offset,
                noOfReviews: displayReviews,
                internal: internal,
                google: google,
                threshold: threshold
            }
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function (data) {

            if ('errorMessage' in data){

                if (pageRequest == next){
                    $('#button_next_page').hide();
                } else if(pageRequest == prev){
                    $('#button_prev_page').hide();
                }

                return
            }

            if (pageRequest == next){
                currentPage++;
            } else if(pageRequest == prev && offset > 0){
                currentPage--;
            } else {
                currentPage = 0;
                $('#button_prev_page').hide();
            }

            populateReviews(data.reviews);
            populateCompanyDetails(data.business_info);

        }
    });
    return res;
};


var populateCompanyDetails = function (data) {
    $('#business_name').html(data.business_name);
    $('#total_avg_rating').html("Average Rating: " + data.total_rating.total_avg_rating);
    $('#business_address').html(data.business_address);
    $('#business_phone').html("Phone: " + data.business_phone);
};

var populateReviews = function (data) {
    var revHtml = '';

    for (var i = 0; i < data.length; i++) {

        revHtml +=
            "<div class='row record-row col-sm-12'> " +
                "<div class='col-lg-2 col-md-2 col-sm-2 col-xs-2'> " +
                    "<span id='customer_name' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>" + data[i].customer_name + "</span> " +
                    "<span id='review_from' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>From: " + getReviewFrom(data[i].review_from) + "</span> " +
                    "<span id='date_of_submission' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>" + data[i].date_of_submission + "</span> " +
                "</div> " +
                "<div class='col-lg-10 col-md-10 col-sm-10 col-xs-10'> " +
                    "<span id='rating' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>" + getRating(data[i].rating) + "</span> " +
                "<span id='description' class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>" + data[i].description + "</span> " +
                "</div> " +
            "</div>";

    }

    $('#displayReviews').html(revHtml);

};

var getRating = function (rating) {
    var html = '';


    for (var i = 0 ; i < rating; i++) {
        html += "<span class='glyphicon glyphicon-star' style='color: gold'></span>";
    }
    return html;
};

var getReviewFrom = function (revFrom) {

    switch (revFrom) {
        case '0': {
            return 'internal';
        }
        case '1':{
            return 'yelp';
        }
        case '2':{
            return 'google';
        }
        default:{
            return '';
        }
    }


};