<?php
  $img = base_url() . '/assets/images/faces/face15.jpg';
    if(is_null($active_login['image_user']) == false)
    {
      //
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>|LM|ASVL|</title>
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="shortcut icon" href="<?= base_url()?>/favicon.png" />

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo text-white text-decoration-none" href="<?=base_url()?>/">|LM|ASVL|</a>
          <a class="sidebar-brand brand-logo-mini text-white text-decoration-none" href="<?=base_url()?>/">|LM|</a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="<?=$img?>" alt="">
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?=$active_login['username_user']?></h5>
                  <span>Bienvenido jefe</span>
                </div>
              </div>

              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="<?=base_url()?>/user/edit" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Editar mi Perfil</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-divider"></div>
                <a href="<?=base_url()?>/user/logout" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Cerrar Sessión</p>
                  </div>
                </a>
              </div>


            </div>
          </li>

          <li class="nav-item nav-category">
            <span class="nav-link">Menu</span>
          </li>

          <li class="nav-item menu-items" >
            <a class="nav-link" href="<?=base_url()?>/">
              <span class="menu-icon">
                <i class="mdi mdi-home"></i>
              </span>
              <span class="menu-title">Inicio</span>
            </a>
          </li>
          
          <li class="nav-item menu-items ">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="true" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-plus-box text-success"></i>
              </span>
              <span class="menu-title">Crear nuevo recurso</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item ">
                    <a href="<?=base_url()?>/link/create" class="nav-link" >
                      <span class="menu-icon">
                        <i class="mdi mdi-link-variant text-primary"></i>
                      </span>
                      <span class="menu-title">Nuevo Enlace</span>
                    </a>
                  </li>

                <li class="nav-item ">
                    <a href="<?=base_url()?>/category" class="nav-link" >
                      <span class="menu-icon">
                      <i class="mdi mdi-file-tree text-info"></i>
                      </span>
                      <span class="menu-title">Nueva Categoria</span>
                    </a>
                </li>

              </ul>
            </div>
          </li>
          
          <li class="nav-item menu-items" >
            <a class="nav-link" href="<?=base_url()?>/more/index">
              <span class="menu-icon">
              <i class="mdi mdi-view-grid"></i>
              </span>
              <span class="menu-title">Herramientas utiles</span>
            </a>
          </li>
      
          <li class="nav-item menu-items ">
            <a class="nav-link" href="<?=base_url()?>/more/about">
              <span class="menu-icon">
                <i class="mdi mdi-information text-warning"></i>
              </span>
              <span class="menu-title">Acerca de la app</span>
            </a>
          </li>

          <li class="nav-item menu-items ">
            <a class="nav-link" href="<?=base_url()?>/more/contact">
              <span class="menu-icon">
                <i class="mdi mdi-contacts text-primary"></i>
              </span>
              <span class="menu-title">Contactame</span>
            </a>

          </li>
        </ul>
      </nav>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini text-white" href="<?=base_url()?>/">|LM|ASVL|</a>
          </div>

          <div class="navbar-menu-wrapper flex-grow d-flex justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <!-- <ul class="navbar-nav w-100" >
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input type="text" class="form-control" placeholder="Search products">
                </form>
              </li>
            </ul> -->
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown d-none d-lg-block">
                <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-toggle="dropdown" aria-expanded="false" href="#">+ Crear nuevo recurso</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                  <h6 class="p-3 mb-0">Opciones</h6>
                  <div class="dropdown-divider"></div>
                  <a href="<?=base_url()?>/link/create" class="dropdown-item preview-item ">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-mdi mdi-link-variant text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Nuevo Enlace</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?=base_url()?>/category/index" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-file-tree text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1">Nueva Categoria</p>
                    </div>
                  </a>
                  
                </div>
              </li>
              
              
              

              <li class="nav-item dropdown">
               
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    
                    <img class="img-xs rounded-circle" src="<?=$img?>" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?=$active_login['username_user']?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>

                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Mi Perfil</h6>
                  <div class="dropdown-divider"></div>
                  <a href="<?=base_url()?>/user/edit" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Editar mi Perfil</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="<?=base_url()?>/user/logout" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Cerrar Sessión</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          <h2 class="text-muted"><?=$title?></h2>

         