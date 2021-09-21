<?php
    $napok = array("hétfő", "kedd", "szerda", "csütörtök", "péntek", "szombat", "vasárnap");
    echo $napok[date('w')-1];
?>