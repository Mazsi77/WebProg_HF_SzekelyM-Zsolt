<?php
    function SpongeCase(string $string = ""): string
    {
        $string = str_split(strtolower($string));
        //char darab (space nelkul)
        $db = 0;
        //karakterek szama
        $i = 0;

        foreach( $string as $ch){
            if($ch != ' '){
                if($db%2 == 0){
                    $string[$i] = strtoupper($string[$i]);
                }
                $db++;
            }
            $i++;

        }

        return implode('', $string);
    }

    echo SpongeCase('Kecske ment a kisKErtbe')
?>