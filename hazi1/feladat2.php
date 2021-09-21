<?php
    function szamalogep (float $szam1, float $szam2, string $op): float
    {

        switch ($op) {
            case '+' :
                return $szam1 + $szam2;
                break;
            case '-' : 
                return $szam1 - $szam2;
                break;
            case '*' :
                return $szam1 * $szam2; 
                break;
            case '/' :
                return $szam1 / $szam2;
                break;
            default: 
                throw new Exception('Hibás operátor!', 0);
        }
        
    }

    echo szamalogep(3, 4, '*');
?>