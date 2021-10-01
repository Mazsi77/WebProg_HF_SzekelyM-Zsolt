<?php

    $tomb = array(5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200');

    foreach($tomb as $elem) {
        echo "$elem tipusa: " . gettype($elem) . ' Numerikus: ' . (is_numeric($elem) ? 'Igen' : 'Nem') . '<br>';
    }