 <!-- navBar -->
    <section id="navBar">
        <div class="container d-flex justify-content-between align-items-center">
            <h3 class="title fst-italic">AdminPanel</h3>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="<?php echo _WEB_ROOT; ?>/admin/home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo _WEB_ROOT; ?>/admin/products">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo _WEB_ROOT; ?>/admin/orders">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo _WEB_ROOT; ?>/admin/accountAdmin">Admins</a>
                </li>
            </ul>
            <a href="<?php echo _WEB_ROOT;?>/admin/logout" class="logout fw-bold">Logout</a>

        </div>
    </section>