<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VECOM</title>
    <!-- <link rel="icon" href="./img/admin-icon.png" type="image/icon type"> -->
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <!-- <link href="img/favicon.ico" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
     
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->

    <!-- <link rel="stylesheet" href="MDB5/css/mdb.min.css"> -->

 
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <!-- <script src="jquery/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-default@4/default.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <style>
        /* Apply warning border and box shadow to input, select, and checkbox elements when focused */
        .focus-warning:focus {
            border-color: #ffc107 !important; /* Warning color for the border */
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25); /* Warning color for the box shadow */
        }

        /* Make sure select elements also get the focus style */
        .custom-select.focus-warning:focus {
            border-color: #ffc107 !important; /* Warning color for the border */
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25); /* Warning color for the box shadow */
        }

        /* Apply to checkbox */
        .form-check-input:focus {
            border-color: #ffc107 !important; /* Warning color for the border */
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25); /* Warning color for the box shadow */
        }
        .swal2-icon-content{
            font-size: 1em;
        }
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }
    </style>
<?php session_start(); ?>
</head>
<body class="bg-light">