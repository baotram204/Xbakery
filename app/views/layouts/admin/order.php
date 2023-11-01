
    <!-- placed orders -->
    <section id="placedOrders">
        <div class="container py-4">
            <h2 class="text-center mb-4 fw-bold">DashBoard</h2>
            <div class="row ">
                <form action="" method="post">
                    <div class="col-4 cardOrder p-4" data-product-id=''>
                        <div class="d-flex">
                            user id :
                            <p class="ms-2">1</p>
                        </div>
                        <div class="d-flex">
                            placed on :
                            <p class="ms-2">2023-10-21</p>
                        </div>
                        <div class="d-flex">
                            mail :
                            <p class="ms-2">baptram17@gmail.com</p>
                        </div>
                        <div class="d-flex">
                            phone :
                            <p class="ms-2">0708162384</p>
                        </div>
                        <div class="d-flex">
                            address :
                            <p class="ms-2">31 Ngo Be</p>
                        </div>
                        <div class="d-flex">
                            products:
                            <p class="ms-2"> banhmi(1), pizza(2), cookies(3), cookies(3), cookies(3), cookies(3), cookies(3)</p>
                        </div>
                        <div class="d-flex">
                            total price :
                            <p class="ms-2">25 $</p>
                        </div>
                        <div class="d-flex">
                            payment method :
                            <p class="ms-2">cash </p>
                        </div>
                        <select class="form-select" aria-label="Default select example" name="category">
                            <option selected>Select category--</option>
                            <?php
                            foreach ($categories as $category) {
                                ?>
                                <option value="<?php echo $category['id']; ?>"><?php echo $category['title'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <div class="row my-3">
                            <div class="col-6">
                                <input type="submit" name="update" class="btn btn-success" value="Update"></input>
                            </div>
                            <div class="col-6">
                                <input type="submit" name="delete" class="btn btn-danger" value="Delete"></input>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </section>
