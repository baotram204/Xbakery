<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/style.css">

    <?php
        if(!empty($page_title)) {
            switch ($page_title) {
                case "Menu":
                    ?>
                    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/menu.css">
                    <?php
                    break;
                case "Detail Product":
                    ?>
                    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/menu.css">
                    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/product-page.css">
                    <link
                            rel="stylesheet"
                            type="text/css"
                            href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
                    />
                    <?php
                    break;
                case "Shopping Cart":
                    ?>
                    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/shopping-cart.css">
                    <?php
                    break;

                default :
                    break;
            }
        }

    ?>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title><?php echo (!empty($page_title))?$page_title:'Xbakery'; ?></title>
</head>
<body>
    <?php
        $this->render('\blocks\client\header');
        $this->render($content, $sub_content);
        $this->render('\blocks\client\footer');

    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/client/js/main.js"></script>
    <?php
        if(!empty($page_title)) {
            switch ($page_title) {
                case "Menu":
                    ?>
                    <script src="<?php echo _WEB_ROOT; ?>/public/assets/client/js/menu.js"></script>
                    <?php
                    break;

                case "Detail Product":
                    ?>
                    <script src="<?php echo _WEB_ROOT; ?>/public/assets/client/js/product-page.js"></script>
                    <script src="<?php echo _WEB_ROOT; ?>/public/assets/client/js/menu.js"></script>
                    <?php
                    break;
                case "Shopping Cart":
                    ?>
                    <script src="<?php echo _WEB_ROOT; ?>/public/assets/client/js/shopping-cart.js"></script>
                    <?php
                    break;
                default :
                    break;
            }
        }
    ?>



</body>
</html>
