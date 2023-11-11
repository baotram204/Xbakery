
    <!-- Home  -->
    <section id="home">
      <div class="container py-4">
        <h2 class="text-center mb-4 fw-bold">DashBoard</h2>
          <p class="success m-4">
              <?php
              if(isset($_SESSION['login'])) {
                  echo $_SESSION["login"];
                  unset($_SESSION['login']);
              }
              ?>
          </p>

        <div class="row">
          <div class="col-4">
            <div class="card p-2">
              <h5 class="text-center m-3"><?php echo $information["product"] ?></h5>
              <div class="subtitle p-2">Products</div>
              <a href="<?php echo _WEB_ROOT;?>/admin/products" class="btn btn-success my-3">See Products</a>
            </div>
          </div>

          <div class="col-4">
              <div class="card p-2">
                <h5 class="text-center m-3"><?php echo ($information["totalMoney"] == '') ? "0" : $information["totalMoney"];?> $</h5>
                <div class="subtitle p-2">Total Money Completes</div>
                <a href="<?php echo _WEB_ROOT;?>/admin/orders" class="btn btn-success my-3">See Orders </a>
              </div>
          </div>

          <div class="col-4">
              <div class="card p-2">
                <h5 class="text-center m-3"><?php echo $information["order"] ?></h5>
                <div class="subtitle p-2">Total Order</div>
                <a href="<?php echo _WEB_ROOT;?>/admin/orders" class="btn btn-success my-3">See Orders</a>
              </div>
          </div>

        </div>
      </div>
    </section>