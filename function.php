<?php

    session_start();

    if(isset($_SESSION['products'])){



        function calculatAllQtt(){
            $totalQtt = 0;
            foreach($_SESSION['products'] as $product){

    
                $totalQtt += $product['qtt'];
    
            }
    
            echo $totalQtt;
        }




    }
echo calculatAllQtt();

header("location:index.php");