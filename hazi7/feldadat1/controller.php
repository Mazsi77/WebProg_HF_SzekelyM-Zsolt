<?php
    require_once('api.php');
    require_once('db.php');
    
    if(isset($_GET['action'])){
        $db = new Db();
        $action = $_GET['action'];
        switch ($action){
            case 'refresh':
                $api = new Api();

                $products = $api->getProducts();
                $db->deleteAll();

                foreach($products as $product){
                    $db->createProduct($product->title, $product->description, $product->price, $product->image);
                }

                header('Location: ./index.php');
            break;
            case 'delete':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                
                if($id == '' ){
                    die("Id not found");
                }
                $db->deleteProduct($id);

                header('Location: ./index.php');
            break;
            case 'create': 
                $title = isset($_GET['title']) ? $_GET['title'] : '';
                $descr = isset($_GET['descr']) ? $_GET['descr'] : '';
                $price = isset($_GET['price']) ? $_GET['price'] : '';
                $img = isset($_GET['img']) ? $_GET['img'] : '';

                if($title == '' || $descr == '' || $price == '' || $img == '' ){
                    die("Üres mezők nem megengedettek!");
                }
                
                $db->createProduct($title, $descr, $price, $img);
                header('Location: ./index.php');
            break;
            case 'update':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
                $title = isset($_GET['title']) ? $_GET['title'] : '';
                $descr = isset($_GET['descr']) ? $_GET['descr'] : '';
                $price = isset($_GET['price']) ? $_GET['price'] : '';
                $img = isset($_GET['img']) ? $_GET['img'] : '';

                if($id == '' || $title == '' || $descr == '' || $price == '' || $img == '' ){
                    die("Üres mezők nem megengedettek!");
                }
                $db->updateProduct($id, $title, $descr, $price, $img);
                header('Location: ./index.php');
            break;
            default:
                die("something went wrong");
        }
    }