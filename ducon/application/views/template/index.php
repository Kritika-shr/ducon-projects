<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register/Login Example</title>
    <!-- jQuery -->
   <script type="text/javascript" src="<?php echo base_url();?>app/lib/jquery.js" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>app/lib/bootstrap.min.js"></script>
    <!--Angular Js-->
    <script src="<?php echo base_url();?>app/lib/angular/angular.min.js"></script>
    <script src="<?php echo base_url();?>app/lib/angular/angular-route.js"></script>
    <script src="<?php echo base_url();?>app/js/app.js"></script>
    <script src="<?php echo base_url();?>app/js/register.js"></script>
    <script src="<?php echo base_url();?>app/js/contact.js"></script>
    <script src="<?php echo base_url();?>app/js/services/authentication.js"></script>
   <script src="//code.angularjs.org/1.4.0/angular-cookies.js"></script>
   
   
 
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>app/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>app/css/landing-page.css" rel="stylesheet">
    <!--MyCSS-->
    <link href="<?php echo base_url();?>app/css/mystyle.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>app/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<header>
      <nav ng-include="'<?php echo base_url();?>app/template/nav.html'"></nav>
</header>
    
<main ng-view>
</main>


</body>
</html>