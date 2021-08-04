<?php 
session_start();

if(isset($_SESSION['admin_email']) &&  isset($_SESSION['isLoggedin']) ){

}
else{
  header('Location: login.php');
exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.js" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="hold-transition sidebar-mini" ng-app="myApp" ng-controller="myController">
    <div class="wrapper">
        <!-- Navbar -->
      <?php require_once('./layout/header.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once('./layout/sidebar.php'); ?> 

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>General Form</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">General Form</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">ADD A CARD DETAILS</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" ng-submit="addcard()">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Enter Card Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Card Price"
                                                ng-model="cardprice" required>
                                        </div>
                                      
                                        <div class="form-group">
                                            <label>Enter Actual Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Actual Price"
                                                ng-model="actualprice" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Card Color</label>
                                            <select class="form-control" ng-model="cardcolor" name="" id="" required>
                                            <option value="" >Select Card Color</option>    
                                            <option value="black" >Black</option>
                                                <option value="brown" >Brown</option>
                                                <option value="green" >Green</option>
                                                <option value="blue" >Blue</option>
                                            </select>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Card Type</label>
                                            <select class="form-control" ng-model="cardtype" name="" id="" required>
                                            <option value="" >Select Card Type</option>    
                                                <option value="visa" >Visa</option>
                                                <option value="mastercard" >Master</option>
                                              
                                            </select>
                                          
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Card Currency</label>
                                            <select class="form-control" ng-model="cardcurr" name="" id="" required>
                                            <option value="" >Select  Card Currency</option>    
                                                <option value="USD" >USD</option>
                                                <option value="CAD" >CAD</option>
                                              
                                            </select>
                                          
                                        </div>



                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                </form>
                            </div>
                            <!-- /.card -->





                            <!-- Control Sidebar -->
                            <aside class="control-sidebar control-sidebar-dark">
                                <!-- Control sidebar content goes here -->
                            </aside>
                            <!-- /.control-sidebar -->
                        </div>
                        <!-- ./wrapper -->

                        <!-- jQuery -->
                        <script src="plugins/jquery/jquery.min.js"></script>
                        <!-- Bootstrap 4 -->
                        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                        <!-- bs-custom-file-input -->
                        <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
                        <!-- AdminLTE App -->
                        <script src="dist/js/adminlte.min.js"></script>
                        <!-- AdminLTE for demo purposes -->
                        <script src="dist/js/demo.js"></script>
                        <!-- Page specific script -->
                        <!-- <script>
$(function () {
  bsCustomFileInput.init();
});
</script> -->
                        <script>
                        var app = angular.module('myApp', []);
                        app.controller('myController', function($scope, $http, $window) {

                      
                     
                            $scope.addcard = () => {
                              
                              

                                $http.post(
                                    "Functions/cardadd.php", {
                                        'cardprice': $scope.cardprice,
                                        'cardtype': $scope.cardtype,
                                        'actualprice': $scope.actualprice,
                                        'cardcolor': $scope.cardcolor,
                                        'cardcurr': $scope.cardcurr
                                        

                                    }
                                ).then(function(response) {
                                    $scope.response = response.data;
                                    console.log($scope.response);
                                    if ($scope.response == "added error") {
                                        swal({
                                            title: "Error",
                                            text: "",
                                            icon: "warning",
                                        });
                                    } else if ($scope.response == "Added") {



                                        swal({
                                            title: "Card Updated Successfull",
                                            text: "",
                                            icon: "success",
                                            buttons: true,
                                            dangerMode: true,
                                        })




                                    }


                                });
                            } //Function End
                            //



                        });
                        </script>

</body>

</html>