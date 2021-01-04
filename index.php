<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .carousel-inner>.item>img {
            width: 100%;
            height: 600px;
            color: chartreuse;
            margin: auto;
        }

        #reg_login>a>img {
            width: 150px;
            height: 50px;
            margin-top: -190px;
            margin-left: 1150px;
        }

        .hrmsheader {
            margin: 0px;
            padding: 0px;
            height: 110px;
        }
        #hrms-text{position:absolute;z-index:1;width:70%;height:120px;top:15px;}
    </style>
</head>

<body>

    <div class="container-fluid row hrmsheader">
        <img src="img/back9.jpeg" style="width:100%;height:150px;" />
        <img src="img/hrms8.png" id="hrms-text" />
        <div id="reg_login">
            <a href="login.php"><img src="img/login_button3.png" alt="login" /></a>
        </div>
    </div>



    <div class="container-fluid row">
        <div id="mycarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
            <ul class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
            </ul>
            <div class="carousel-inner" role="listbox">

                <div class="item active">
                    <img src="img/car3.jpg">
                    <div class="carousel-caption">
                        <h2 style="color:black;">We recruit for attitude and train for skill</h2>
                    </div>
                </div>
                <div class="item">
                    <img src="img/car2.jpg">
                    <div class="carousel-caption">
                        <h2 style="color:black;">Resources are hired to give results, not reasons</h2>
                    </div>
                </div>

            </div>

            <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
            <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>

    <div class="container-fluid row">
        <div class="col-md-6">
            <img src="img/sfd.png" alt="hrms1.png" style="width:100%;height:100%;" />
        </div>

        <div class="col-md-6" style="padding-left:10px;margin-top:20px;">
            <p class="text-muted text-justify" style="font-size:20px;">Human resources are the part of management. Human resources are the people who work for the organisation to organize the human or employees. Human resource is real employee management who emphasis on those employees asserts of the company. Human resource manage the people in term of motivation, assignment selection, labor law compliance, performance tracker, training, professional development. Human resources are the key to scheduling &amp; managing the interview. Human resources descries the risk &amp; give maximum ROI (Return on Investment).</p>
            <p class="text-muted text-justify" style="font-size:20px;">Human resources are sometimes refer as a human capital. As with other business asserts, the goal is to make effective use of employee. Human resource is helping employees to develop people. HR can create a relation with the employee &amp; also create healthy relationship with the team. Human resource supports the new employees to feel comfortable at work place. Human resources are also helping people to solve the internal issue to create healthy environment.</p>
        </div>
    </div>

</body>

</html>


