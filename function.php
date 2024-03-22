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


    if(isset($_GET['testQTT'])){
       $tQTT = calculatAllQtt();

    }

;
// header("location:index.php");