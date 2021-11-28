 <?php
   require_once('db.php');

   $db = new Db();

   $products = $db->getProducts();

 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
 </head>
 <body>
    <br>
    <a href="./controller.php?action=refresh">Refresh database</a>
    <br>
    <a href="./form.php">New Product</a>
    <table border="1">
       <thead>
          <th>id</th>
          <th>title</th>
          <th>price</th>
          <th>description</th>
          <th>image</th>
          <th>delete</th>
          <th>Update</th>
       </thead>
      <?php
         foreach($products as $product){
            echo "<tr> <td> $product[id]</td>";
            echo "<td> $product[title]</td>";
            echo "<td> $$product[price]</td>";
            echo "<td> $product[descr]</td>";
            echo "<td><img src='$product[img]' width='100px' /></td>";
            echo "<td> <a href='./controller.php?action=delete&id=$product[id]'>Delete</a></td>";
            echo "<td> <a href='./form.php?action=update&id=$product[id]'>Update</a></td></tr>";
         }
      ?>
    </table>
 </body>
 </html>
