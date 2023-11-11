
<!--update admin-->
<section id="adminsAccount">
    <div class="container">
        <h2 class="text-center my-4 fw-bold">Admins Account</h2>
        <p class="error">
            <?php
            if(isset($_SESSION['update_admin_fail'])) {
                echo $_SESSION["update_admin_fail"];
                unset($_SESSION['update_admin_fail']);
            }
            ?>
        </p>
        <!-- form -->
        <form action="" method="post" class="form-add-product my-5 mx-auto ">
            <h4 class="text-center my-3 fw-bold">Update Admin</h4>
            <div class="mx-3">
                <?php
                if(isset($_SESSION['error_password'])) {
                    ?>
                    <div class="mb-3">
                        <div class="error"><?php echo $_SESSION['error_password']; ?></div>
                    </div>
                    <?php
                    unset($_SESSION['error_password']);
                }
                ?>
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="<?php echo $accountAdmin['username'];?>">
                </div>
                <div class="mb-3">
                    <input type="password" name="current_password" class="form-control" placeholder="enter your current password">
                </div>
                <div class="mb-3">
                    <input type="password" name="new_password" class="form-control" placeholder="enter your new password">
                </div>
                <div class="mb-3">
                    <input type="password" name="re_password" class="form-control" placeholder="confirm your new password">
                </div>
                <div class="mb-3">
                    <input class="btn btn-success" type="submit" name="update" value="Update"></input>
                </div>
            </div>
        </form>
    </div>
</section>
