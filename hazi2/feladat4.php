<?php
    //tomb referencia szerint átadva, hogy az eredeti érték változzon
    function atalakit(array &$tomb, string $tipus) : void
    {
        //használandó függvény nevének eldöntése, kis- nagybetű megkűlönböztetése nélkül
        $fnctn = strcasecmp($tipus, 'kisbetus') == 0 ? 'strtolower' : (strcasecmp($tipus , 'nagybetus') == 0 ? 'strtoupper' : -1);

        //ha tipus -1 akkor hibás adat
        if($tipus == -1) {
            throw new Exception("Nem létezik ilyen függvény");
        }

        foreach($tomb as &$value) {
            //elmentett függvénynév használata a megfelelő függvény meghívásához
            $value = $fnctn($value);
        }
    }

    $szinek = array('A' => 'Kek' , 'B' => 'Zold', 'c' => 'Piros');

    atalakit($szinek, 'nagybetus');
    print_r($szinek);

    atalakit($szinek, 'kisbetus');
    echo "<br>";
    print_r($szinek);