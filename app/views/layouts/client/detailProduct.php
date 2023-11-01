 <!-- subnavBar -->
 <section id="subnavBar">
     <div class="container-md">
         <ul class="nav justify-content-center py-1 my-3  border-top border-bottom border-opacity-10" >

             <?php
             foreach ($categories as $category) {
                 $id = $category["id"];
                 $title = $category["title"];
                 $GLOBALS["id"] = $category["id"];
                 $GLOBALS["title"] = $category["title"];
                 ?>
                 <li class="nav-item ">
                     <a class="nav-link main-color <?php if ($categoryID==$id) echo "active"; ?>" href="<?php echo _WEB_ROOT; ?>/menu/category/<?php echo $id ?>"><?php echo $title; ?></a>
                 </li>
                 <?php
             }

             ?>
         </ul>
     </div>
 </section>


    <!-- page product -->
    <section id="page-product">
        <div class="container">
            <div class="row my-5">
                <div class="col-6">
                    <div class="product-image">
                        <img src="<?php echo _WEB_ROOT; ?>/public/assets/client/images/breads/menu-bread.jpg" alt="">
                    </div>
                </div>
                <div class="col-6">
                    <h3><?php echo $product['title']; ?></h3>
                    <p>2.7 $</p>
                    <div class="row">
                        <div class="col-4 col-md-2">
                            <input type="number" class="text-center js-quantity" id="item<?php echo $product['id']; ?>_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                        </div>

                        <div class="col-7 col-md-4">
                            <button class="btn menu-add-cart m-auto js-detailProduct" data-product-id="<?php echo $product['id']; ?>">
                                Add to Cart
                            </button>
                        </div>

                    </div>
                  

                    <div class="row mt-2 ps-3">
                    <p class="d-inline-flex gap-1">
                        <a class="btn btn-des-ing" data-bs-toggle="collapse" href="#descriptionCollapse" role="button" aria-expanded="false" aria-controls="descriptionCollapse" data-bs-target="#descriptionCollapse">
                        Description
                        </a>
                        <button class="btn btn-des-ing" type="button" data-bs-toggle="collapse" data-bs-target="#ingredientsCollapse" aria-expanded="false" aria-controls="ingredientsCollapse">
                        Ingredients
                        </button>
                    </p>
                    <div class="collapse" id="descriptionCollapse">
                        <div class="card card-body">
                        <?php echo $product["description"]; ?>
                        </div>
                    </div>
                    <div class="collapse" id="ingredientsCollapse">
                        <div class="card card-body">
                        <?php echo $product["ingredients"]; ?>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        </div>

    </section>



    <!-- list-prodcut-similar -->
    <section id="list-product">
        <div class="container-md">
            <h2 class="text-center fw-bold">Similar products you might like</h2>

            <div class="row my-4">
                <div class="col-12 col-md-4">
                    <div class="card mt-3 " data-product-id="2">
                        <div class="card-body text-center">
                            <h4 class="card-title">Sandwich</h4>
                            <p class="card-text">
                                Crusty and beautifully colored on the outside, buttery soft and chewy on the
                                inside, with a bit of butter
                            </p>

                            <div class="text-center">
                                <p>2.7 $</p>
                            </div>

                        </div>
                        <div class="menu-image">
                            <img src="<?php echo _WEB_ROOT; ?>/public/assets/client/images/breads/menu-bread.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="row text-center justify-content-around">
                                <div class="col-4">
                                    <input type="number" class="text-center form-control" id="item2_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                                </div>

                                <div class="col-7 text-end">
                                    <button class="btn menu-add-cart m-auto" >Add to Cart</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="show-more my-3">
                <a href="" class="">Show more</a>
            </div>
        </div>
    </section>


    <!-- slider inspire -->
    <section id="inspire">
        
    </section>



