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
    <title>AdminLTE 3 | Projects</title>

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

<body class="hold-transition sidebar-mini"  ng-app="myApp" ng-controller="myController" ng-init="getPackages()">
    <!-- Site wrapper -->
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
                            <h1>All Orders</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Orders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th >
                                        Order ID
                                    </th>
                                    <th>
                                        Order Date
                                    </th>
                                    <th>
                                       Total USD Amount
                                    </th>
                                    <th>
                                      Payment Type
                                    </th>
                                    <th  class="text-center">
                                      Payment Amount
                                    </th>
                                    <th  class="text-center">
                                      Is Payed
                                    </th>
                                    <th  class="text-center">
                                        View Details
                                    </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="package in packages">
                                    <td>
                                    {{package.order_id}}
                                    </td>
                                    <td>
                                        <a>
                                         {{package.order_date}}
                                        </a>
                                        <br />
                                        <small>
                                        
                                        </small>
                                    </td>
                                    <td>
                                    {{package.total_price}}
                                    </td>
                                    <td class="project_progress">
                                      
                                       
                                        {{package.paytment_type}}
                                     
                                    </td>
                                    <td class="project-state">
                                        {{package.amount}}
                                    </td>
                                    <td class="project-state">
                                        {{package.is_payed}}
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="view-order.php?order_id={{package.order_id}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                    
                                    </td>
                                </tr>
                              
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

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
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <script>
                var app = angular.module('myApp', []);
                app.controller('myController', function($scope, $http, $window, $location) {
                    //start controller
                    
                    $scope.getPackages = () => {
                        console.log("asd");
                        $http.get("Functions/getOrders.php")
                            .then(function(response) {
                                console.log(response.data);
                                // console.log(response.data);
                                $scope.packages = response.data
                            });
                    }
                });
                </script>

</body>

</html>