<!-- Home -->
<section id="home">
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo _WEB_ROOT; ?>/public/assets/client/images/homepage.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> Freshly baked everyday</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> Freshly baked everyday</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> Freshly baked everyday</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<!--Gallery -->
<section id="gallery">
    <div class="container">
        <div class="header-content my-5">Since 2002 we've been serving our customer the best quality freshly baked French food, traditionally
            made and presented with care
        </div>

        <h1 class="my-5">Categories</h1>

        <div class="row my-4">
            <?php
                foreach ($gallery_product as $item) {
                    $category_id = $item['category_id'];
                    $item_id = $item['item_id'];
                    $title = $item['title'];
                    ?>
                    <div class="col-12 col-md-6">
                        <div class="category">
                            <a href="<?php echo _WEB_ROOT; ?>/menu/category/<?php echo $category_id;  ?>" class="image">
                                <img src="<?php echo _WEB_ROOT; ?>/public/assets/client/images/<?php echo $title;?>/main-<?php echo $title;?>.jpg" alt="">
                            </a>

                            <div class="content d-flex justify-content-between my-4">
                                <h3> <?php echo $title; ?></h3>
<!--                                <p>15 products</p>-->
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>


        </div>
    </div>


</section>

