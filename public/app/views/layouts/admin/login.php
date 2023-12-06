
    <section id="login">
        <!-- <div class="container "> -->
            <form action="" method="post" class="form-login my-5 mx-auto">
                <h4 class="text-center my-3 fw-bold">Login Now</h4>
                <p class="error m-4">
                    <?php
                    if(isset($_SESSION['login_failed'])) {
                        echo $_SESSION["login_failed"];
                        unset($_SESSION['login_failed']);
                    }

                    if(isset($_SESSION['no_message'])) {
                        echo $_SESSION["no_message"];
                        unset($_SESSION['no_message']);
                    }
                    ?>
                </p>
                <div class="mx-3">
                  <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="enter username">
                  </div>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="enter password">
                  </div>
                  <div class="mb-3">
                        <input type="submit" class="btn btn-success submit">
                  </div>
                </div>
              </form>
        <!-- </div> -->
    </section>
