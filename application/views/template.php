<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * views/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Poncho Corp.</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/css/AdminLTE.min.css">
  <!--  AdminLTE Skins. -->
  <link rel="stylesheet" href="/assets/css/skin-green.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Poncho&nbsp;Corp.</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

     <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          
        </div>
        <div class="pull-left info">
          <!-- Status -->
        </div>
      </div>

      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        
        <li class="sidebar-menu-item"><a href="/parts"><i class="fa fa-gear"></i><span>Parts</span></a></li>
        <li class="sidebar-menu-item"><a href="/assembly"><i class="fa fa-wrench"></i><span>Assembly</span></a></li>
        <li>
          <a href="#" id="historyToggle" data-toggle="collapse" data-target="#histToggle" class="collapsed">
            <i class="fa fa-history"></i>History<i id="histIcon" class="fa fa-chevron-down pull-right"></i>
          </a>
          <div class="collapse" id="histToggle">
            <ul class="nav nav-list">
              <li class="sidebar-menu-item"><a href="/history"><i class="fa fa-user"></i><span> All</span></a></li>
              <li class="sidebar-menu-item"><a href="/history/buy"><i class="fa fa-shopping-basket"></i><span> Buy</span></a></li>
              <li class="sidebar-menu-item"><a href="/history/sell"><i class="fa fa-dollar"></i><span> Sell</span></a></li>
              <li class="sidebar-menu-item"><a href="/history/build"><i class="fa fa-wrench"></i><span> Build</span></a></li>
              <li class="sidebar-menu-item"><a href="/history/recycle"><i class="fa fa-recycle"></i><span> Recycle</span></a></li>
            </ul>
          </div>
        </li>
        <li class="sidebar-menu-item"><a href="/manage"><i class="fa fa-files-o"></i><span>Manage</span></a></li>
        <li>
          <a href="#" id="sidebarToggle" data-toggle="collapse" data-target="#userToggle" class="collapsed">
            <i class="fa fa-user"></i>User Roles<i id="indicatorIcon" class="fa fa-chevron-down pull-right"></i>
          </a>
          <div class="collapse" id="userToggle">
            <ul class="nav nav-list">
              <li class="sidebar-menu-item userBtn" id="managerBtn"><a href="/"><i class="fa fa-user"></i><span> Manager</span></a></li>
              <li class="sidebar-menu-item userBtn" id="workerBtn"><a href="/"><i class="fa fa-user"></i><span> Worker</span></a></li>
            </ul>
          </div>
        </li>
      </ul>


      <!-- /.sidebar-menu -->
      </section>
  </aside>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      {content}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Poncho Corporation</a>.</strong> All rights reserved.
  </footer>

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 2.2.3 -->
  <script src="/assets/js/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- AdminLTE App -->
  <script src="/assets/js/app.min.js"></script>
  <!-- Landing Page JS -->
  <script src="assets/js/landing.js"></script>
  <!-- Manage Page JS -->
  <script src="assets/js/manage.js"></script>
  <!-- AJA JS Source -->
  <script src="/assets/js/aja.min.js"></script>
  <!-- Chart.js CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>
  </body>
</html>
