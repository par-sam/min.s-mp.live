<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    $module = isset($_GET["module"]) ? $_GET["module"] : NULL;
    
    require "scripts/php/functions.php";
    require "scripts/php/db.php";

    $sestoken = isset($_SESSION["token"]) ? $_SESSION["token"] : (isset($_COOKIE["token"]) ? $_COOKIE["token"] : NULL);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = :token");
    $stmt->execute([
        "token" => $sestoken
    ]);
    $user = $stmt->fetch();

    if(!$user) {
        header("Location: login");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-MP (min)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="scripts/style.css">
    <link href="https://unpkg.com/css.gg/icons/all.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <!-- <div class="absolute bottom-0 flex justify-center items-center w-screen h-10 bg-blue-500 text-white font-bold">
        <i class="gg-danger mr-2"></i>
        Version&nbsp;<span class="bg-gray-900 font-medium font-mono px-1 rounded-lg">développement</span>
    </div> -->
    <div id="notif" class="hidden absolute items-center p-2 w-full md:w-auto bottom-0 md:right-0 bg-white md:rounded-xl shadow">
        <img id="notif_icon" src="../data/images/check.png" class="w-10 h-10">
        <div class="flex flex-col ml-2">
            <p id="notif_title" class="text-xl font-bold">NOTIF_TITLE</p>
            <p id="notif_content" class="text-base font-medium">NOTIF_CONTENT</p>
        </div>
    </div>
<?php
    switch($module) {
        case "horaire":
            require "pages/horaire.php";
            break;
        case "profile":
            require "pages/profile.php";
            break;
        case "notes":
            require "pages/notes.php";
            break;
        default :
            require "pages/home.php";
            break;
    }
?>
    <div id="cookies_box" class="hidden absolute px-10 flex flex-col xl:flex-row m-auto xl:bottom-0 w-full h-full bg-white xl:h-14 justify-center items-center text-center shadow">
        <img class="w-32 h-32 xl:w-10 xl:h-10 transition transform hover:scale-105" src="../data/images/cookies.png">
        <p class="text-lg font-medium mt-4 xl:mt-0 xl:ml-4">Ce site utilise des cookies nécessaires à son bon fonctionnement. En continuant votre navigation, vous acceptez l'utilisation de ces cookies.</p>
        <button id="cookies_accept" class="bg-green-500 text-white font-semibold rounded-lg px-4 py-2 mt-4 xl:mt-0 xl:ml-4 transform transition hover:scale-105">J'ai compris</button>
        <a href="information#cookies" class="text-gray-600 underline mt-2 xl:mt-0 xl:ml-4 transform transition hover:scale-105 cursor-pointer">En savoir plus</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="scripts/index.js"></script>
</body>
</html>