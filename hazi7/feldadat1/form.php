<?php
   
    $action = 'create';
    $product = '';

    if(isset($_GET['action'])){
        $action = $_GET['action'] == 'update' ? 'update' : 'create';
    }

    if($action == 'update'){
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if($id != ''){
            require_once('db.php');

            $db = new Db();
            $product = $db->getProduct($id);

            if(gettype($product) != 'array' ){
                die("Product not found!");
            }
        }
        else{
            die('No id found');
        }
        
    }
?>

<form action="./controller.php?" method="get">
    <input type="hidden" name="action" value="<?php echo $action?>">
    <?php if($action == 'update'): ?>
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
    <?php endif; ?>
    
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?php echo $action == 'update' ? $product['title'] : ''; ?>">
    <label for="descr">Description</label>
    <input type="text" name="descr" id="descr" value="<?php echo $action == 'update' ? $product['descr'] : ''; ?>">
    <label for="price">Price</label>
    <input type="number" min = "0.01" step ='0.01' name="price" id="price" value="<?php echo $action == 'update' ? $product['price'] : ''; ?>">
    <label for="img">Image</label>
    <input type="text" name="img" id="img" value="<?php echo $action == 'update' ? $product['img'] : ''; ?>">
    
    <input type="submit" value="<?php echo $action == 'update' ? 'Update product' : 'Add product'; ?>">
</form>


