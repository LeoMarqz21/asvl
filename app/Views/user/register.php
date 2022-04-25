

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="shortcut icon" href="<?=base_url()?>/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto ">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Registrarme</h3>

                <?php session(); ?>
                <?php
                  $session = \Config\Services::session();
                  echo $session->getFlashdata('unsaved');
                  echo $session->getFlashdata('register');
                ?>
                
                <form action="<?=base_url()?>/user/verifyRegister" method="post">

                  <div class="form-group">
                    <label>Nombre Completo *</label>
                    <input type="text" name="fullname" value="<?=old('fullname')?>" class="form-control p_input" title="rell" required />
                    <span class="text-danger" style="font-size:12px;" >
                      <?php echo session('errors.fullname'); ?>
                  </span>
                  </div>

                  <div class="form-group">
                    <label>Nombre de usuario *</label>
                    <input type="text" value="<?=old('username')?>" name="username" class="form-control p_input" required />
                    <span class="text-danger" style="font-size:12px;" >
                    <?php echo session('errors.username'); ?>
                  </span>
                  </div>

                  <div class="form-group">
                    <label>Contraseña *</label>
                    <input type="password" value="<?=old('password')?>" name="password" class="form-control p_input" required />
                    <span class="text-danger" style="font-size:12px;" >
                    <?php echo session('errors.password'); ?>
                  </span>
                  </div>
                  
                  <div class="form-group">
                    <label>Confirmar contraseña *</label>
                    <input type="password" value="<?=old('pass_confirm')?>" name="pass_confirm" class="form-control p_input" required />
                    <span class="text-danger" style="font-size:12px;" >
                    <?php echo session('errors.pass_confirm'); ?>
                  </span>
                  </div>
                  
                  <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Registrarme</button>
                  </div>
                  
                  <p class="sign-up text-center">Tienes una cuenta?<a href="<?=base_url()?>/user/login"> Inicia Sesión</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <script src="<?=base_url()?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="<?=base_url()?>/assets/js/off-canvas.js"></script>
    <script src="<?=base_url()?>/assets/js/hoverable-collapse.js"></script>
    <script src="<?=base_url()?>/assets/js/misc.js"></script>
    <script src="<?=base_url()?>/assets/js/settings.js"></script>
    <script src="<?=base_url()?>/assets/js/todolist.js"></script>

    
  </body>
</html>