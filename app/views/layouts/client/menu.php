
 <!-- category -->
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

    <!--filter -->
    <section id="filter">
        <div class="container-md">
            <h1 class="menu-content text-center "><?php echo (!empty($categoryID))?$titleCategory:"Breads" ?></h1>

            <div class="menu-filter">
                <div class="row mb-2">
                    <div class="col-8 col-md-10">Filter by:</div>   
                    <div class="col-4 col-md-2 text-end">
                        <button class="btn dropdown-item" onclick="clearFilters()">Clear filters</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                What's the occasion?
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <label class="col-10" for="entertaining">Entertaining</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="entertaining" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <label class="col-10" for="everyday">Everyday</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="everyday" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item top-border" href="#">
                                    <div class="row">
                                    <div class="col-6">
                                        <button class="btn dropdown-item" onclick="clearSelection('occasion')">Clear</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn dropdown-item" onclick="applySelection('occasion')">Apply</button>
                                    </div>
                                    </div>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dietary preference 
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <label class="col-10" for="dairy">Dairy friendly</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="dairy" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <label class="col-10" for="egg">Egg friendly</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="egg" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <label class="col-10" for="nut">Nut friendly</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="nut" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <label class="col-10" for="soy">Soy friendly</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="soy" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <label class="col-10" for="vegan">Vegan friendly</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="vegan" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item top-border" href="#">
                                    <div class="row">
                                    <div class="col-6">
                                        <button class="btn dropdown-item" onclick="clearSelection('dietary')">Clear</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn dropdown-item" onclick="applySelection('dietary')">Apply</button>
                                    </div>
                                    </div>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 col-md-9 sortBy">Sort by:</div>
                    <div class="col-6 col-md-3">
                    <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Recommended
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item option" id="test" href="#">
                                    <div class="row">
                                    <label class="col-10" for="low-price">Low-price first</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="low-price" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                        <label class="col-10" for="expensive">Expensive first</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="expensive" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <label class="col-10" for="novelties">Novelties</label>
                                    <div class="col-2">
                                        <input type="checkbox" id="novelties" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                
                                <li><a class="dropdown-item top-border" href="#">
                                    <div class="row">
                                    <div class="col-6">
                                        <button class="btn dropdown-item" onclick="clearSelection('sort')">Clear</button>
                                    </div>
                                    <div class="col-6">
                                        <button class="btn dropdown-item" onclick="applySelection('sort')">Apply</button>
                                    </div>
                                    </div>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </section>

<script>

    document.querySelector("#test").onclick = (e) => {
        console.log(e.target);
    }

</script>

    <!-- list-prodcut-catalog -->
    <section id="list-product">
        <div class="container-md">
            <div class="row my-4">

                <?php

                    foreach ($products as $product) {
                        ?>
                        <div class="col-12 col-md-4">
                            <div class="card mt-3" data-product-id="<?php echo$product["id"];?>" >
                                <div class="card-body text-center">
                                    <h4 class="card-title"><?php echo $product["title"]; ?></h4>
                                    <p class="card-text"><?php echo $product["description"]; ?></p>

                                    <div class="text-center">
                                        <p><?php echo $product["price"]; ?> $</p>
                                    </div>

                                </div>
                                <div class="menu-image">
                                    <img src="<?php echo _WEB_ROOT; ?>/public/assets/client/images/breads/menu-bread.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="row text-center justify-content-around">
                                        <div class="col-4">
                                            <input type="number" class="text-center form-control" id="item<?php echo $product["id"]; ?>_quantity" value="1" min="1"  onwheel="event.preventDefault()">
                                        </div>

                                        <div class="col-7 text-end">
                                            <button class="btn menu-add-cart m-auto" >Add to Cart</button>
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
    </section>


