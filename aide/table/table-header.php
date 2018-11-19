<?php 
session_start();
if($_SESSION['user_type'] != 'M' || $_SESSION['user_type'] == NULL){
	header("Location: error-404.php");
}

$worker_name = $_SESSION['name_of_user'];
$worker_id = $_SESSION['worker_id'] ;

define("BASE_URL","/swdo");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>SWDMS - Canaman </title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- bootstrap-datetimepicker -->
    <link href="../../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<!-- Logo Icon -->
	<link rel="shortcut icon" href="../images/favicon3.ico">
	<!-- Datatables -->
    <link href="../../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>


    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../../calendar/calendar.php" class="site_title">&nbsp;&nbsp;<img src="../images/favicon3.ico"><span> SWDMS</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $worker_name; ?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="../calendar/calendar.php"><i class="fa fa-home"></i> Home </a>
                  </li>
				  <li><a href="table/service_registry.php"><i class="fa fa-suitcase"></i> Service Registry </a>
                  </li>
				  <li><a href="table/index.php"><i class="fa fa-user"></i> Client Registry </a>
                  </li>
				  <li><a href="../general_reports.php"><i class="fa fa-table"></i> General Reports </a>
                  </li>
				  <li><a href="http://swdms-announcement.000webhostapp.com/login.php" target="_blank" ><i class="fa fa-globe"></i> Manage Announcement</a>
				  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
			<p style="text-align: center;" >SWDMS - Canaman &copy</p>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                 <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/user.png" alt=""><?php echo $worker_name; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                      <a href="../profile/index.php">
                        <i class="fa fa-user pull-right"></i>
                        <span>Profile</span>
                      </a>
                    </li>
                    <li>
                      <a href="table/activity-log.php">
                        <i class="fa fa-clock-o pull-right"></i>
                        <span>Activity Log</span>
                      </a>
                    </li>
					<li>
                      <a href="table/deleted-list.php">
                        <i class="fa fa-trash pull-right"></i>
                        <span>Deleted list</span>
                      </a>
                    </li>
                    <li>
					  <a href="javascript:;">
					   <i class="fa fa-question-circle pull-right"></i>
					   <span>Help</span>
					  </a>
					</li>
                    <li><a data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
				  
				  <!-- Start Logout Modal -->
				  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Notice:</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Are you sure to log out?</h4>
                          <p>Be sure to save all your works before clicking log out button.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                          <a type="button" class="btn btn-danger" href="../../logout.php">Log out</a>
                        </div>

                      </div>
                    </div>
                  </div>
				  <!-- End Logout Modal -->
				  
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
		<!-- Modal -->
		<div id="modalHomeEvents" class="modal fade" role="dialog">
			<div class="modal-dialog">

		<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header" style="height:50px;">
					<h4 class="modal-title" id="myModalLabel2">Please choose a service:</h4>
				</div>
				<div class="modal-body">
				<div class="container">
				<h4>AICS:</h4>
				<div class="list-group">
					<a type="button" class="list-group-item" href="../filled/choose-burial.php?client_id=" id="link1">Burial Assistance</a>
					<a type="button" class="list-group-item" href="../filled/choose-educational.php?client_id=" id="link2">Educational Assistance</a>
					<a type="button" class="list-group-item" href="../filled/choose-food.php?client_id=" id="link3">Food Assistance</a>
					<a type="button" class="list-group-item" href="../filled/choose-medical.php?client_id=" id="link4">Medical Assistance</a>
					<a type="button" class="list-group-item" href="../filled/choose-transportation.php?client_id=" id="link5">Transportation Assistance</a>
				</div>
				<div class="list-group">
				<h4>Others:</h4>
					<a type="button" class="list-group-item" href="../filled/choose-cicl.php?client_id=" id="link6">Children in Conflict with the Law</a>
					<a type="button" class="list-group-item" href="../filled/choose-livelihood.php?client_id=" id="link10">Livelihood Assistance</a>
					<a type="button" class="list-group-item" href="../filled/choose-scsr.php?client_id=" id="link15">Social Case Study</a>
					<a type="button" class="list-group-item" href="../filled/choose-pre-marriage.php?client_id=" id="link11">Pre-marriage Counselling</a>
					<a type="button" class="list-group-item" href="../filled/choose-rloa.php?client_id=" id="link14">Referral to other Agencies</a>
					<a type="button" class="list-group-item" href="../filled/choose-indigency.php?client_id=" id="link9">Certificate of Indigency</a>
					<a type="button" class="list-group-item" href="../filled/choose-dascpd.php?client_id=" id="link7">Assistance for Death Aid of Senior Citizen & PWD</a>
					<a type="button" class="list-group-item" href="../filled/choose-solo-parent.php?client_id=" id="link13">Solo Parent ID</a>
					<a type="button" class="list-group-item" href="../filled/choose-pwd.php?client_id=" id="link12">Person With Disability ID</a>
					<a type="button" class="list-group-item" href="../filled/choose-dwyna.php?client_id=" id="link8">Welfare of Socially Disadvantaged Women, Youth & Other Needy Adult</a>
				</div>
				</div>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-default" data-dismiss="modal" onclick="myFunctionss()" >Cancel</a> <!-- data-dismiss="modal" <button onclick="myFunctionss()">Try it</button> -->
				</div>
				</div>

			</div>
		</div>
		<!-- End Modal-->
		<style>
		
		input {
			text-transform: capitalize;
		}
		
		table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
		overflow-x: auto;
		}
		.error {
		color: #FF0000;
		}
		</style>
		