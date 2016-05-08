<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Reviews</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/feedbackScript.js"></script>

</head>
<body>

<!--Main container div -->
<div class="container main center col-lg-10 col-md-10 col-sm-12 col-xs-12">

    <!--main heading-->
    <h1 class="pg-heading">Reviews</h1>

    <!--Main Panel-->
    <div class="panel">

        <!--Panel Header-->
        <div class="panel-heading">

            <!--Panel Header row start-->
            <div class="row">
                <!--sub-heading Heading column-->
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 underline">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <h3 id="business_name"></h3>
                        <span id="total_avg_rating"></span>
                    </div>

                </div> <!--sub-heading column end tag -->

                <!--column Navigation icons start -->
                <div class="col-lg-5 col-md-5 col- c-6 col-xs-12">
                    <div class="nav col-sm-12 nav-icon">
                        <span class="display-block" id="business_address"></span>
                        <span class="display-block" id="business_phone"></span>
                    </div>


                </div> <!--column navigation icon ends-->
            </div> <!--panel header row end tag-->

        </div> <!--End of panel header tag-->

        <!--Panel Body -->
        <div class="panel-body">

            <div class="row reviews">

                <div id="courseColHeadings" class="row top record-row col-sm-12" style="border-bottom: 2px solid #d6d6d6">

                    <center><h4>Feedback</h4></center>
                </div>

                <div id="displayReviews"></div>


            </div>

            <div class="center" style="text-align:center;">
                <span id="button_prev_page" role="button" class="glyphicon glyphicon-chevron-left" onclick="javaScript:getFeedback(prev)"
                      style="padding: 25px; font-size: 20px"></span>
                <span id="button_next_page" role="button" class="glyphicon glyphicon-chevron-right" onclick="javaScript:getFeedback(next)"
                      style="padding: 25px; font-size: 20px"></span>
            </div>

        </div> <!--panel body ending tag-->

    </div> <!--Main panel ending tag-->

</div> <!--main container div ending tag -->

<!--Edit popup editor starting tag-->
</html>