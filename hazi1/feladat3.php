<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hazi-3</title>
    <style>
        td, th{
            border: 1px solid black;
            padding: .3em;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <?php 
                for( $i = 1; $i<=10; $i++){
                    echo "<th>$i</th>";
                }
            ?>
        </thead>
        <tbody>
            <?php 
                for( $i = 1; $i<=10; $i++){
                    echo "<tr>";
                    for( $j = 1; $j<=10; $j++){
                        echo "<td>" . number_format(($i / $j), 2) . "</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>