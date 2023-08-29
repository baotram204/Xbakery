<?php
    require 'layouts/header.php'
?>

<header>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="product-page.css">
    <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
      />
</header>


    <!-- subnavBar -->
    <section id="subnavBar">
        <div class="container-md">
            <ul class="nav justify-content-center py-1 my-3  border-top border-bottom border-opacity-10" >
                <li class="nav-item ">
                    <a class="nav-link main-color active" href="#">Breads</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-color" href="#">Pastries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-color" href="#">Sandwiches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link main-color" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </section>



    <!-- page product -->
    <section id="page-product">
        <div class="container">
            <div class="row my-5">
                <div class="col-6">
                    <div class="product-image">
                        <img src="images/breads/menu-bread.jpg" alt="">
                    </div>
                </div>
                <div class="col-6">
                    <h3>Classic Boguette</h3>
                    <p>2.7 $</p>
                    <div class="row">
                        <div class="col-4 col-md-2">
                            <input type="number" class="text-center" id="item1_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                        </div>

                        <div class="col-7 col-md-4">
                            <button class="btn menu-add-cart m-auto" data-item-id="item1">Add to Cart</button>
                        </div>

                    </div>
                  

                    <div class="row mt-2">
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
                        Crusty and beautifully colored on the outside, buttery soft and chewy on the inside, with a bit of butter
                        </div>
                    </div>
                    <div class="collapse" id="ingredientsCollapse">
                        <div class="card card-body">
                        List of ingredients...
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
                    <div class="card mt-3" >
                        <div class="card-body text-center">
                            <h5 class="card-title">Classic Boguette</h5>
                            <p class="card-text">
                                Crusty and beautifully colored on the outside, buttery soft and chewy on the
                                inside, with a bit of butter
                            </p>
                            
                        </div>
                        <div class="menu-image">
                            <img src="images/breads/menu-bread.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <input type="number" class="text-center" id="item1_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                                </div>
                                <div class="col-9 text-end">
                                    <p>2.7 $</p>
                                </div>

                                <button class="btn menu-add-cart m-auto" data-item-id="item1">Add to Cart</button>

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-4">
                    <div class="card mt-3" >
                        <div class="card-body text-center">
                            <h5 class="card-title">Classic Boguette</h5>
                            <p class="card-text">
                                Crusty and beautifully colored on the outside, buttery soft and chewy on the
                                inside, with a bit of butter
                            </p>
                            
                        </div>
                        <div class="menu-image">
                            <img src="images/breads/menu-bread2.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <input type="number" class="text-center" id="item2_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                                </div>
                                <div class="col-9 text-end">
                                    <p>2.7 $</p>
                                </div>

                                <button class="btn menu-add-cart m-auto" data-item-id="item2">Add to Cart</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="card mt-3" >
                        <div class="card-body text-center">
                            <h5 class="card-title">Classic Boguette</h5>
                            <p class="card-text">
                                Crusty and beautifully colored on the outside, buttery soft and chewy on the
                                inside, with a bit of butter
                            </p>
                           
                        </div>
                        <div class="menu-image">
                            <img src="images/breads/menu-bread3.jpg" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <input type="number" class="text-center" id="item3_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                                </div>
                                <div class="col-9 text-end">
                                    <p>2.7 $</p>
                                </div>

                                <button class="btn menu-add-cart m-auto" data-item-id="item3">Add to Cart</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="show-more">
                <a href="" class="">Show more</a>
            </div>
        </div>
    </section>


    <!-- slider inspire -->
    <section id="inspire">
        
    </section>



    
<?php
    require 'layouts/footer.php'
?>