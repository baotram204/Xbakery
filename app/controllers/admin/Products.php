<?php

namespace app\controllers\admin;

use core\Controller;

class Products extends Controller
{
    private $model_product;
    private $model_category;
    protected array $data=[];

    public function index() {
        $this->data['content'] = "\layouts\admin\products";
        $this->data["page_title"] = "Products";

        $this->getInforCategory();
        $this->loadProduct();

        //render view
        $this->render('\layouts\admin\admin_layout', $this->data);

    }

    function loadProduct() {
        //get information of products
        $this->model_product = $this->model('Product');
        $dataProducts = $this->model_product->getListProducts();

        $this->data["sub_content"]["products"] =$dataProducts;

    }

    // when add product
    public function addProduct() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $img_name = "";
            if(!empty($_FILES['img']['tmp_name']) && is_uploaded_file($_FILES['img']['tmp_name'])) {
                $img_name = $_FILES['img']['name'];

                $ext = explode('.', $img_name);
                $ext = end($ext);
                $img_name = "Food_Category_" . rand(000, 999) . '.' . $ext;

                $cource_path = $_FILES['img']['tmp_name'];
                $destination_path = _DIR_ROOT . "\public\assets\admin\images\\" . $img_name;

                $upload = move_uploaded_file($cource_path, $destination_path);
                if (!$upload) {
                    die("Upload failed");
                }
            } else {
                $img_name = "";
            }

            $infor = array(
                'title' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'image_name' => $img_name,
                'category_id' => $_POST['category'],
                'ingredients' => $_POST['ingredients']
            );

            $this->model_product = $this->model('Product');
            $dataProduct = $this->model_product->pushProduct($infor);
            if ($dataProduct) {
                header('Location: '._WEB_ROOT.'/admin/products');
                exit;
            }
        } else {
            //when doesn't send post
        }
    }

    // when delete product with id
    public function deleteProduct($id){
        $this->model_product = $this->model('Product');
        $dataProduct = $this->model_product->deleteProduct($id);
        if ($dataProduct) {
            header('Location: '._WEB_ROOT.'/admin/products');
            exit;
        }
    }

    // when update product
    public function updateProduct($id) {
        $this->getInforCategory();
        $dataProduct = $this->getInforProduct($id);

        if (isset($_POST['update'])) {
            $img_name_curr = $dataProduct['image_name'];
            $img_name_new = "";
            if(!empty($_FILES['img']['tmp_name']) && is_uploaded_file($_FILES['img']['tmp_name']) && $_FILES['img']['name']!= '') {
                $img_name_new = $_FILES['img']['name'];
                $ext = explode('.', $img_name_new);
                $ext = end($ext);
                $img_name_new = "Food_Category_" . rand(000, 999) . '.' . $ext;

                $cource_path = $_FILES['img']['tmp_name'];
                $destination_path = _DIR_ROOT . "\public\assets\admin\images\\" . $img_name_new;

                $upload = move_uploaded_file($cource_path, $destination_path);
                if (!$upload) {
                    die("Upload failed");
                }
            } else {
                $img_name_new = $img_name_curr;
            }

            $title = ($_POST['name'] == '') ? $dataProduct['title'] : $_POST['name'] ;
            $description = ($_POST['description'] == '') ? $dataProduct['description'] : $_POST['description'] ;
            $ingredients = ($_POST['ingredients'] == '') ? $dataProduct['ingredients'] : $_POST['ingredients'] ;
            $price = ($_POST['price'] == '') ? $dataProduct['price'] : $_POST['price'] ;
            $category = ($_POST['product_category'] == '') ? $dataProduct['category_id'] : $_POST['product_category'] ;

            $infor = array(
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'image_name' => $img_name_new,
                'category_id' => $category,
                'ingredients' => $ingredients
            );

            $this->model_product = $this->model('Product');
            $condition = "item_id='$id'";
            $checkUpdate = $this->model_product->updateProduct($infor, $condition);

            if ($checkUpdate) {
                echo '<script>window.history.go(-2);</script>';
                exit();
            } else {
                echo "Update failed";
            }
        } elseif (isset($_POST['go_back'])) {
            echo '<script>window.history.go(-2);</script>';
            exit();
        }

    }


    public function getInforProduct($id) {
        $this->model_product = $this->model('Product');
        $dataProduct = $this->model_product->getListProducts($id);

        $this->data['content'] = "\layouts\admin\updateProduct";
        $this->data["sub_content"]["product"] = $dataProduct;
        $this->data["page_title"] = "Update Product";

        $this->render('\layouts\admin\admin_layout', $this->data);
        return $dataProduct;
    }

    public function getInforCategory() {
        //get information of categories
        $this->model_category = $this->model('Category');
        $dataCategories = $this->model_category->getListCategories();

        $this->data["sub_content"]["categories"] =$dataCategories;
    }
}
