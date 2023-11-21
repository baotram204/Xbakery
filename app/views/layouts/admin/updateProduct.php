<!-- update products -->
<section id="updateProduct">
    <div class="container">
        <!-- form -->
        <form action="" method="post" class="form-update-product my-5 mx-auto" enctype="multipart/form-data">
            <h4 class="text-center my-3 fw-bold">Update Product</h4>
            <div class="mx-3">
                <div class="mb-3">
                    <p class="px-1">Update Name</p>
                    <input type="text" name="name" class="form-control"  placeholder="<?= $product['title'] ?>">
                </div>
                <div class="mb-3">
                    <p class="px-1">Update Price</p>
                    <input type="text" name="price" class="form-control" pattern="[0-9]+([\.][0-9]+)?" title="Please enter a valid decimal number" placeholder="<?= $product['price'] ?>">
                </div>
                <div class="mb-3">
                    <p class="px-1">Update Description</p>
                    <input type="text" name="description" class="form-control" placeholder="<?= $product['description'] ?>">
                </div>
                <div class="mb-3">
                    <p class="px-1">Update Ingredients</p>
                    <input type="text" name="ingredients" class="form-control" placeholder="<?= $product['ingredients'] ?>">
                </div>
                <div class="mb-3">
                    <p class="px-1">Update Category</p>
                    <select class="form-select" aria-label="Default select example" name="product_category">
                        <option>Select category--</option>
                        <?php
                        foreach ($categories as $category) {
                            $id = $category["id"];
                            $title = $category["title"];
                            ?>
                            <option <?php echo ($id === $product['category_id'])? "selected" : "" ?> value="<?php echo $id; ?>"><?php echo $title; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <p class="px-1">Update Image</p>
                    <input name="img" type="file" class="form-control" placeholder="<?= $product['image_name'] ?>">
                </div>
                <div class="mb-3">
                    <p class="px-1">Current Image</p>
                    <?php
                    if ($product['image_name'] !='' ) {
                        ?>
                        <img src="<?php echo _WEB_ROOT;?>/public/assets/admin/images/<?php echo $product['image_name']; ?>" alt="" width="150px">
                        <?php
                    } else {
                        echo "<div class='error'> Image not Added. </div>";
                    }
                    ?>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <input type="submit" name="update" class="btn btn-success" value="Update"></input>
                    </div>
                    <div class="col-6">
                        <input type="submit" name="go_back" class="btn btn-warning" value="Go back"></input>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
