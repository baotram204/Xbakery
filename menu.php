<?php
    require 'layouts/header.php'
?>

<header>
    <link rel="stylesheet" href="menu.css">
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

    <!--filter -->
    <section id="filter">
        <div class="container-md">
            <h1 class="menu-content text-center ">Breads</h1>

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
                                    <div class="col-10">Entertaining</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <div class="col-10">Everyday</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item top-border" href="#">
                                    <div class="row">
                                    <div class="col-8">
                                        <button class="btn dropdown-item" onclick="clearSelection('occasion')">Clear</button>
                                    </div>
                                    <div class="col-4">
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
                                    <div class="col-10">Dairy friendly</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <div class="col-10">Egg friendly</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <div class="col-10">Nut friendly</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <div class="col-10">Soy friendly</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <div class="col-10">Vegan friendly</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item top-border" href="#">
                                    <div class="row">
                                    <div class="col-8">
                                        <button class="btn dropdown-item" onclick="clearSelection('dietary')">Clear</button>
                                    </div>
                                    <div class="col-4">
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
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <div class="col-10">Low-price first</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <div class="col-10">Expensive first</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
                                    </div>
                                    </div>
                                </a></li>
                                <li><a class="dropdown-item option" href="#">
                                    <div class="row">
                                    <div class="col-10">Novelties</div>
                                    <div class="col-2">
                                        <input type="checkbox" class="checkbox">
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



    <!-- list-prodcut-catalog -->
    <section id="list-product">
        <div class="container-md">
            <div class="row my-4">
                
                <div class="col-12 col-md-4">
                    <div class="card mt-3" >
                        <div class="card-body text-center">
                            <h4 class="card-title">Classic Boguette</h4>
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
                            <h4 class="card-title">Classic Boguette</h4>
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
                            <h4 class="card-title">Classic Boguette</h4>
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

            
        </div>
    </section>


<?php
    require 'layouts/footer.php'
?>