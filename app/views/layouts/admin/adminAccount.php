
    <!-- Add admin -->
    <section id="adminsAccount">
      <div class="container"> 
        <h2 class="text-center my-4 fw-bold">Admins Account</h2>
          <p class="success">
              <?php
              if(isset($_SESSION['add_admin_success'])) {
                  echo $_SESSION["add_admin_success"];
                  unset($_SESSION['add_admin_success']);
              }

              if(isset($_SESSION['delete_admin_success'])) {
                  echo $_SESSION["delete_admin_success"];
                  unset($_SESSION['delete_admin_success']);
              }

              if(isset($_SESSION['update_admin_success'])) {
                  echo $_SESSION["update_admin_success"];
                  unset($_SESSION['update_admin_success']);
              }
              ?>
          </p>
          <p class="error">
            <?php
              if(isset($_SESSION['add_admin_fail'])) {
                  echo $_SESSION["add_admin_fail"];
                  unset($_SESSION['add_admin_fail']);
              }

              if(isset($_SESSION['delete_admin_fail'])) {
                  echo $_SESSION["delete_admin_fail"];
                  unset($_SESSION['delete_admin_fail']);
              }
            if(isset($_SESSION['update_admin_fail'])) {
                echo $_SESSION["update_admin_fail"];
                unset($_SESSION['update_admin_fail']);
            }
              ?>
          </p>
        <!-- form -->
        <form action="" method="post" class="form-add-product my-5 mx-auto ">
          <h4 class="text-center my-3 fw-bold">Register New</h4>
          <div class="mx-3">

              <?php
              if(isset($_SESSION['wrong_password'])) {
                ?>
                  <div class="mb-3">
                      <div class="error"><?php echo $_SESSION['wrong_password']; ?></div>
                  </div>
                <?php
                  unset($_SESSION['wrong_password']);
              }
              ?>

            <div class="mb-3">
              <input type="text" name="username" class="form-control" placeholder="enter your username ">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="enter your password">
              </div>
            <div class="mb-3">
              <input type="password" name="re_password" class="form-control" placeholder="confirm your password">
            </div>
            <div class="mb-3">
              <input class="btn btn-success" type="submit" name="add_admin" value="Register Now"></input>
            </div>
          </div>
        </form>

        <!-- existing admins -->
        <div class="existingAdmins px-5">
          <div class="row">
              <?php
                foreach ($accountAdmins as $accountAdmin) {
                    ?>
                    <form class="col-3 my-2" method="post" action="">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">username: <?php echo $accountAdmin['username']; ?></h5>
                                <div class="row">
                                    <input class="" type="hidden" name="admin_id" value="<?php echo $accountAdmin['id']; ?>"></input>
                                    <div class="col-6">
                                        <input class="btn btn-danger" type="submit" name="delete" value="Delete"></input>
                                    </div>
                                    <div class="col-6">
                                        <a href="<?php echo _WEB_ROOT; ?>/admin/accountAdmin/updateAdmin/<?php echo $accountAdmin["id"];?>" class="btn btn-warning">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                }
              ?>
          </div>
        </div>

      </div>
    </section>



