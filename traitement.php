<?php

    session_start();

    if(isset($_GET['action'])){

        switch($_GET['action']){
            case "add": if(isset($_POST['submit'])){

                $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST,"price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST,"qtt",FILTER_VALIDATE_INT);
        
                if($name && $price && $qtt){
        
                    $product=[
                        "name" => $name,
                        "price" => $price,
                        "qtt" =>  $qtt,
                        "total" => $price*$qtt
                    ];
        
                    $_SESSION['products'][] = $product;
                }
        
            }
                break;
            case "delete":
                $index = $_GET['id'];
                unset($_SESSION['products'][$index]);
                header("location:recap.php");exit;
                break;
            case "clear" : unset($_SESSION['products']);
                header("location:recap.php");exit;
                break;
            case "up-qtt":
                $index=$_GET['id'];
                $_SESSION['products'][$index]['qtt']++;
                header("location:recap.php");exit;
                break;
            case "down-qtt":
                $index=$_GET['id'];
                if($_SESSION['products'][$index]['qtt']>0){
                    $_SESSION['products'][$index]['qtt']--;
                    header("location:recap.php");exit;
                    break;
                }else{
                    
                    unset($_SESSION['products'][$index]);
                    header("location:recap.php");exit;
                    break;

                }
        }
    }

    header("location:index.php");