<?php
    $errors = array(
        "fname" => "",
        "lname" => "",
        "email" => "",
        "attend" => "",
        "tshirt" => "",
        "file" => "",
        "terms" => ""
    );
    $error_num = 0;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $form = array(
            "fname" => $_POST["firstName"] ,
            "lname" => $_POST["lastName"] ?? "",
            "email" => $_POST["email"] ?? "",
            "attend" => $_POST["attend"] ?? NULL,
            "tshirt" => $_POST["tshirt"],
            "abstract" => $_FILES["abstract"]["name"] ?? "",
            "terms" => isset($_POST["terms"]) ? true : false
        );

        if($form["fname"] == ""){
            $errors["fname"] = "First name is required!";
        }
        if($form["lname"] == ""){
            $errors["lname"] = "Last name is required!";
        }
        if($form["email"] == ""){
            $errors["email"] = "Email is required!";
        }
        if($form["attend"] == NULL){
            $errors["attend"] = "You need to attend at least one event!";
        }
        if($form["terms"] == false){
            $errors["terms"] = "You need to accept the terms & conditions!";
        }
        if($form["tshirt"] == "P"){
            $errors["tshirt"] = "You need to select a size!";
        }

        if($form["abstract"] == ""){
            $errors["file"] = "Please upload your abstract!";
        }
        else{
            if($_FILES["abstract"]["size"] > 3*1024*1024){
                $errors["file"] = "The uploaded file is too big"; 
            }
            else{
                if($_FILES["abstract"]["type"] != "application/pdf"){
                    $errors["file"] = "The uploaded file isn't a pdf";
                }
                else{
                    move_uploaded_file($_FILES["abstract"]["tmp_name"], "uploads/" . $_FILES["abstract"]["name"]);
                }
            }
        }
        foreach($errors as $err){
            if($err != ""){
                $error_num++;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazi 5</title>
</head>
<body>
    <h3>Online conference registration</h3>

    <form method="post" action="index.php" enctype="multipart/form-data">
        <label for="fname"> First name:
            <input type="text" name="firstName">
        </label>
        <p><?php echo $errors["fname"]; ?></p>
        <label for="lname"> Last name:
            <input type="text" name="lastName">
        </label>
        <p><?php echo $errors["lname"]; ?></p>
        <label for="email"> E-mail:
            <input type="text" name="email">
        </label>
        <p><?php echo $errors["email"]; ?></p>
        <label for="attend"> I will attend:<br>
            <input type="checkbox" name="attend[]" value="Event1">Event 1<br>
            <input type="checkbox" name="attend[]" value="Event2">Event2<br>
            <input type="checkbox" name="attend[]" value="Event3">Event2<br>
            <input type="checkbox" name="attend[]" value="Event4">Event3<br>
        </label>
        <p><?php echo $errors["attend"]; ?></p>
        <label for="tshirt"> What's your T-Shirt size?<br>
            <select name="tshirt">
                <option value="P">Please select</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </label>
        <p><?php echo $errors["tshirt"]; ?></p>
        <label for="abstract"> Upload your abstract<br>
            <input type="file" name="abstract" accept="application/pdf"/>
        </label>
        <p><?php echo $errors["file"]; ?></p>
        <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
        <p><?php echo $errors["terms"]; ?></p>
        <input type="submit" name="submit" value="Send registration"/>
    </form>

    <?php 
        if($error_num == 0 && isset($form)){ ?>
            <p>First Name: <?php echo $form["fname"] ?></p>
            <p>Last Name: <?php echo $form["lname"] ?></p>
            <p>Email: <?php echo $form["email"] ?></p>
            <p>Attending events:</p>
            <ul>
                <?php
                    foreach($form["attend"] as $att){
                        echo "<li> $att </li>";
                    }
                ?>
            </ul>
            <p>T-shirt size: <?php echo $form["tshirt"]; ?></p>
            <iframe src="uploads/<?php echo $form["abstract"]?>"  width="100%" height="500px" frameborder="0"></iframe>
       <?php }
    ?>


</body>
</html>
