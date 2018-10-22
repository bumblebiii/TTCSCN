<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fashe</title>

    <!-- Bootstrap core CSS-->
    <link href="public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="public/admin/css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="?mod=admin">Nguyễn Văn Luân</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link " href="?mod=login&act=Logout" id="userDropdown" role="button">
            Đăng xuất <i class="fas fa-sign-out-alt"></i>
          </a>
          
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="?mod=admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class="menu">Bảng điều khiển</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="?mod=admin&act=customer">
            <i class="fas fa-user-alt"></i>
            <span class="menu">Quản lý người dùng</span>
          </a>
        </li>
        <?php 
          if ($_SESSION['user']['ROLE']==1) {
            echo '<li class="nav-item ">
                    <a class="nav-link" href="?mod=admin&act=employee">
                      <i class="fas fa-user-alt"></i>
                      <span class="menu">Quản lý nhân viên</span>
                    </a>
                  </li>';
          }
         ?>
        <li class="nav-item ">
          <a class="nav-link" href="?mod=admin&act=product">
            <i class="fas fa-user-alt"></i>
            <span class="menu">Quản lý sản phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?mod=admin&act=listBill">
            <i class="fas fa-fw fa-chart-area"></i>
            <span class="menu">Danh sách hóa đơn</span></a>
        </li>
      </ul>

      <div id="content-wrapper">
        <div class="container-fluid">