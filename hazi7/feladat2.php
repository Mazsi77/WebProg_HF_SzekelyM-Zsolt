<?php
     
     $url = 'https://fakestoreapi.com/carts/user/1';
     $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_HTTPGET, true);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     $response_json = curl_exec($ch);
     curl_close($ch);
     $carts = json_decode($response_json);

     $totals = array();

     foreach($carts as $cart){
          $total = 0;
         foreach($cart->products as $prod){
               $url = "https://fakestoreapi.com/products/$prod->productId";
               $ch = curl_init($url);
               curl_setopt($ch, CURLOPT_HTTPGET, true);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               $resp = json_decode(curl_exec($ch));
               curl_close($ch);

               $total += $resp->price * $prod->quantity;
         }
         echo "Cart: $cart->id total: $total <br>";
     }


     