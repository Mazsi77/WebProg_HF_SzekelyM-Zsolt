<?php
    session_start();
    
    if(isset($_GET['beirtSzam'])){

        $szam = $_GET['beirtSzam'];
        $generaltSzam;
        $szoveg = '';

        if(!isset($_SESSION['szam'])){
            $generaltSzam = rand(1,10);
            $_SESSION['szam'] = $generaltSzam;
        }
        else{
            $generaltSzam = $_SESSION['szam'];
        }

        switch($generaltSzam <=> $szam){
            case -1:
                $szoveg = " nagyobb mint a keresett szám!";
            break;
            case 1:
                $szoveg = " kisebb mint a keresett szám!";
            break;
            case 0:
                $szoveg = " egyenlő a keresett számmal!";
                unset($_SESSION['szam']);
            break;
        }

        echo "<h3> $szam" . $szoveg;
        
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
    <label for="beirtSzam">Szam:</label>
    <input type="number" name="beirtSzam" min="1" max="10" required>
    <input type="submit" value="Próbálkozás">
</form>

