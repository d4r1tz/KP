<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <link rel="stylesheet" href="sidenav.css">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DISNAV SMG</title>
        <link rel = "icon" href = "https://media.geeksforgeeks.org/wp-content/cdn-uploads/gfg_200X200.png" type = "image/x-icon">

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        
        <style>body {font-family: 'Nunito'; font-size: 14px;}</style>
    </head>
    
    <body class="antialiased">
        <nav class="navbar bg-body-tertiary fixed-top">
            <!-- <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes"> -->
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="navbar bg-light">
                    <div class="container-fluid" style="display:flex; align-items: flex-start;">
                        <h1 class="navbar-brand">LOGBOOK TRAFFIC PELAYARAN</h1>
                    </div>
                </nav>
                <a href="logout.php" type="button" class="btn btn-danger">Logout</a>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav">
                            <!-- Kalo Aktif/Nonaktif ganti ni BOi -->
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php">LogBook Traffic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="indexkapal.php">Data Master Kapal</a>
                            </li>
                            <!-- Limit mau ganti aktif/nonaktif -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>


<!--    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="index.php">Logbook Pelayaran</a>
                <a href="indexKapal.php">Data Master Kapal</a>
                <a href="logout.php">Log Out</a>
            </div>

            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; MENU</span>
         
            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "300px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
            </script> -->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        </body>
</html>