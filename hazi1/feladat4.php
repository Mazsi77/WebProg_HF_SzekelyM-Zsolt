<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazi-4</title>
    <style>
        .sakk{
            width: 20px;
            height: 20px;
            border: none;
        }
        .fekete{
            background-color: black;
        }
        .feher{
            background-color: white;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <?php 
                $colors = array('feher', 'fekete');
                for($i = 1; $i<=8; $i++){
                    echo "<tr>";
                    for($j = 1; $j <= 8; $j++){
                        $num= ($i+$j)%2;
                        echo "<td class='$colors[$num] sakk'> </td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>