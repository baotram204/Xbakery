
<!-- products -->
<section id="products">
    <div class="container">
        <p class="success m-4">
            <?php
            if(isset($_SESSION['add_product_success'])) {
                echo $_SESSION["add_product_success"];
                unset($_SESSION['add_product_success']);
            }
            if(isset($_SESSION['delete_product_success'])) {
                echo $_SESSION["delete_product_success"];
                unset($_SESSION['delete_product_success']);
            }
            if(isset($_SESSION['update_product_success'])) {
                echo $_SESSION["update_product_success"];
                unset($_SESSION['update_product_success']);
            }
            ?>
        </p>

        <p class="error m-4">
            <?php
            if(isset($_SESSION['add_product_fail'])) {
                echo $_SESSION["add_product_fail"];
                unset($_SESSION['add_product_fail']);
            }
            if(isset($_SESSION['delete_product_fail'])) {
                echo $_SESSION["delete_product_fail"];
                unset($_SESSION['delete_product_fail']);
            }
            if(isset($_SESSION['update_product_fail'])) {
                echo $_SESSION["update_product_fail"];
                unset($_SESSION['update_product_fail']);
            }
            ?>
        </p>
        <!-- form -->
        <form action="<?php echo _WEB_ROOT; ?>/admin/products/addProduct" method="post" class="form-add-product my-5 mx-auto" enctype="multipart/form-data">
            <h4 class="text-center my-3 fw-bold">Add Product</h4>
            <div class="mx-3">
                <div class="mb-3">
                    <input type="text" class="form-control" name="name" placeholder="enter product name">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="price" placeholder="enter product price" pattern="[0-9]+([\.][0-9]+)?" title="Please enter a valid decimal number">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="description" placeholder="enter description">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="ingredients" placeholder="enter ingredients">
                </div>
                <div class="mb-3">
                    <select class="form-select" aria-label="Default select example" name="category">
                        <option selected>Select category--</option>
                        <?php
                        foreach ($categories as $category) {
                            $id = $category["id"];
                            $title = $category["title"];
                        ?>
                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="img">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-success submit" value="Add Product"></input>
                </div>
            </div>
        </form>
        <!-- existing products -->
        <div class="existingProducts px-5">
            <div class="row">
                <?php
                    foreach ($products as $product){
                    ?>
                        <div class="col-4">
                            <div class="card my-2">
                                <div class="image">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/assets/admin/images/<?php echo $product["image_name"]; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $product["title"]; ?></h5>
                                    <div class="card-text">
                                        <div class="fw-bold my-1">Price</div>
                                        <p><?php echo $product["price"]; ?></p>
                                    </div>
                                    <div class="card-text">
                                        <div class="fw-bold my-1">Descriptions</div>
                                        <p><?php echo $product["description"]; ?></p>
                                    </div>
                                    <div class="card-text">
                                        <div class="fw-bold my-1">Ingredients</div>
                                        <p><?php echo $product["ingredients"]; ?></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="<?php echo _WEB_ROOT; ?>/admin/products/updateProduct/<?php echo $product["id"];?>" class="btn btn-warning">Edit</a>
                                        </div>
                                        <div class="col-6">
                                            <a href="<?php echo _WEB_ROOT; ?>/admin/products/deleteProduct/<?php echo $product["id"];?>" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>
