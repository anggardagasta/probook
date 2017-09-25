<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="arillo is responsive html real estate theme">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Probook</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,800' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body id="top">

<!-- begin:navbar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-top">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}"><span><strong>Pro</strong>Book</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-top">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Property <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{URL::to('search_list')}}">Search (List View)</a></li>
                    </ul>
                </li>
                <li><a href="#modal-signin" class="signin" data-toggle="modal" data-target="#modal-signin">Sign in</a>
                </li>
                <li><a href="#" class="signup" data-toggle="modal" data-target="#modal-signup">Sign up</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>
<!-- end:navbar -->

@yield('content')

<!-- begin:subscribe -->
<div id="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-2 col-sm-8 col-xs-12">
                <h3>Get Newsletter Update</h3>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" placeholder="Enter your mail">
                    <span class="input-group-btn">
                <button class="btn btn-warning btn-lg" type="submit"><i class="fa fa-envelope"></i></button>
              </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:subscribe -->

<!-- begin:footer -->
<div id="footer">
    <div class="container">
        <div class="row">

            <!-- begin:copyright -->
            <div class="row">
                <div class="col-md-12 copyright">
                    <p>Copyright &copy; 2017 Anggarda. All Right Reserved.</p>
                    <a href="#top" class="btn btn-warning scroltop"><i class="fa fa-angle-up"></i></a>
                    <ul class="list-inline social-links">
                        <li><a href="#" class="icon-twitter" rel="tooltip" title="" data-placement="bottom"
                               data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icon-facebook" rel="tooltip" title="" data-placement="bottom"
                               data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icon-gplus" rel="tooltip" title="" data-placement="bottom"
                               data-original-title="Gplus"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- end:copyright -->

        </div>
    </div>
    <!-- end:footer -->

    <!-- begin:modal-signin -->
    <div class="modal fade" id="modal-signin" tabindex="-1" role="dialog" aria-labelledby="modal-signin"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Sign in</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <label for="emailAddress">Email address</label>
                            <input type="email" class="form-control input-lg" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control input-lg" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="forget"> Keep me logged in
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Don't have account ? <a href="#modal-signup" data-toggle="modal" data-target="#modal-signup">Sign
                            up here.</a></p>
                    <input type="submit" class="btn btn-warning btn-block btn-lg" value="Sign in">
                </div>
            </div>
        </div>
    </div>
    <!-- end:modal-signin -->

    <!-- begin:modal-signup -->
    <div class="modal fade" id="modal-signup" tabindex="-1" role="dialog" aria-labelledby="modal-signup"
         aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Sign up</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <input type="email" class="form-control input-lg" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" placeholder="Confirm Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="agree"> Agree to our <a href="#">terms of use</a> and <a
                                        href="#">privacy policy</a>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Already have account ? <a href="#modal-signin" data-toggle="modal" data-target="#modal-signin">Sign
                            in here.</a></p>
                    <input type="submit" class="btn btn-warning btn-block btn-lg" value="Sign up">
                </div>
            </div>
        </div>
    </div>
    <!-- end:modal-signup -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="js/gmap3.min.js"></script>
    <script src="js/jquery.easing.js"></script>
    <script src="js/jquery.jcarousel.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.backstretch.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
