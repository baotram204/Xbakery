
    <!-- placed orders -->
    <section id="placedOrders">
        <div class="container py-4">
            <h2 class="text-center mb-4 fw-bold">Orders</h2>
            <p class="success m-4">
                <?php
                if(isset($_SESSION['delete_order_success'])) {
                    echo $_SESSION["delete_order_success"];
                    unset($_SESSION['delete_order_success']);
                }
                if(isset($_SESSION['update_order_success'])) {
                    echo $_SESSION["update_order_success"];
                    unset($_SESSION['update_order_success']);
                }
                ?>
            </p>
            <p class="error m-4">
                <?php
                if(isset($_SESSION['delete_order_fail'])) {
                    echo $_SESSION["delete_order_fail"];
                    unset($_SESSION['delete_order_fail']);
                }
                if(isset($_SESSION['update_order_fail'])) {
                    echo $_SESSION["update_order_fail"];
                    unset($_SESSION['update_order_fail']);
                }
                ?>
            </p>
            <div class="row">
                <?php
                if (count($customerOrderInfors) == 0) {
                    echo "<div class='error'>No order yet.</div>";
                } else {
                    foreach ($customerOrderInfors as $customerOrderInfor) {
                        ?>
                        <div class="col-3 cardOrder p-3 my-2 h-100">
                            <form action="" method="post">
                                <div class="d-flex">
                                    user id :
                                    <p class="ms-2"><?php echo $customerOrderInfor['id']; ?></p>
                                </div>
                                <div class="d-flex">
                                    name :
                                    <p class="ms-2"><?php echo $customerOrderInfor['customer']['name']; ?></p>
                                </div>
                                <div class="d-flex">
                                    phone :
                                    <p class="ms-2"><?php echo $customerOrderInfor['customer']['phone']; ?></p>
                                </div>
                                <div class="d-flex">
                                    address :
                                    <p class="ms-2"><?php echo $customerOrderInfor['customer']['address']; ?></p>
                                </div>
                                <div class="d-flex">
                                    products:
                                    <p class="ms-2">
                                        <?php
                                        foreach ($customerOrderInfor['products'] as $product){
                                            echo $product['name'] . ' (' . $product['quantity'] . ') ';
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="d-flex">
                                    total price :
                                    <p class="ms-2"><?php echo $customerOrderInfor['total_money']; ?></p>
                                </div>
                                <div class="d-flex">
                                    messages :
                                    <p class="ms-2"><?php echo $customerOrderInfor['customer']['comment']; ?> </p>
                                </div>
                                <div class="d-flex">
                                    payment method :
                                    <p class="ms-2"><?php echo $customerOrderInfor['payment']; ?> </p>
                                </div>
                                <select class="form-select" aria-label="Default select example" name="category">
                                    <option <?php echo (($customerOrderInfor['status'])=='Pending')? "selected" : "" ?>>Pending</option>
                                    <option <?php echo (($customerOrderInfor['status'])=='Processing')? "selected" : "" ?>>Processing</option>
                                    <option <?php echo (($customerOrderInfor['status'])=='Shipped')? "selected" : "" ?>>Shipped</option>
                                    <option <?php echo (($customerOrderInfor['status'])=='Delivered')? "selected" : "" ?>>Delivered</option>
                                    <option <?php echo (($customerOrderInfor['status'])=='Cancelled')? "selected" : "" ?>>Cancelled</option>
                                    <option <?php echo (($customerOrderInfor['status'])=='Refunded')? "selected" : "" ?>>Refunded</option>
                                </select>
                                <div class="row my-3">
                                    <input type="hidden" name="product-id" value="<?php echo $customerOrderInfor['id']; ?>">
                                    <div class="col-6">
                                        <input type="submit" name="update" class="btn btn-success" value="Update"></input>
                                    </div>
                                    <div class="col-6">
                                        <input type="submit" name="delete" class="btn btn-danger" value="Delete"></input>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
