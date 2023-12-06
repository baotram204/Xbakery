  <div class="all-content">

        <!-- navBar -->
        <section id="navbar">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                      <a class="navbar-brand me-5" onclick="setActiveLink(this)" href="<?php echo _WEB_ROOT; ?>/index.php">MEMORIES</a>

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon custom-color"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="setActiveLink(this)" href="<?php echo _WEB_ROOT; ?>/about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="setActiveLink(this)" href="<?php echo _WEB_ROOT; ?>/menu">Menu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" onclick="setActiveLink(this)" href="<?php echo _WEB_ROOT; ?>/contact">Contact</a>
                                    </li>

                                </ul>

                                <form class="d-flex" role="search">
                                    <input id="searchInput" class="form-control me-lg-5 " type="search" placeholder="Search" aria-label="Search">
                                </form>

                                <a href="<?php echo _WEB_ROOT; ?>/shoppingCart/showCart" onclick="setActiveLink(this)" class="">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </a>

                            </div>

                    </div>
                </nav>
            </div>
        </section>