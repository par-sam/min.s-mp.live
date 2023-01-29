<?php
    require "../scripts/php/functions.php";
    require "../scripts/php/db.php";

    session_start();

    $sestoken = isset($_SESSION["token"]) ? $_SESSION["token"] : (isset($_COOKIE["token"]) ? $_COOKIE["token"] : NULL);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE token = :token");
    $stmt->execute([
        "token" => $sestoken
    ]);
    $user = $stmt->fetch();

    if ($user) {
        header("Location: ..");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-MP (min) | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../scripts/style.css">
    <link rel="icon" type="image/png" href="../data/images/icon_back.png" />
</head>
<body class="flex w-screen h-screen bg-gray-200 justify-center items-center">
    <div id="notif" class="hidden absolute items-center p-2 w-full md:w-auto bottom-0 md:right-0 bg-white md:rounded-xl shadow">
        <img id="notif_icon" src="../data/images/check.png" class="w-10 h-10">
        <div class="flex flex-col ml-2">
            <p id="notif_title" class="text-xl font-bold">NOTIF_TITLE</p>
            <p id="notif_content" class="text-base font-medium">NOTIF_CONTENT</p>
        </div>
    </div>
    <div class="flex w-5/6 xl:w-3/5 h-5/6 bg-white rounded-xl shadow text-center">
        <div class="hidden xl:flex flex-col justify-center items-center w-1/2 h-full bg-blue-500 rounded-l-xl text-white">
            <h1 class="text-5xl font-bold">S-MP.live</h1>
            <p class="text-xl">D-1.0.1 (min)</p>
        </div>
        <div class="flex flex-col justify-center items-center w-full xl:w-1/2 h-full">
            <img src="../data/images/icon.png" class="w-32 h-32 rounded-full border-4 shadow" alt="S-MP.live">
            <p class="text-3xl font-bold mt-2">Connexion</p>
            <input name="username" id="login_username_input" class="w-5/6 xl:w-1/2 h-10 rounded-lg border-2 border-gray-300 shadow px-2 mt-10 outline-none focus:border-blue-500" type="text" placeholder="Nom d'utilisateur">
            <input name="password" id="login_password_input" class="w-5/6 xl:w-1/2 h-10 rounded-lg border-2 border-gray-300 shadow px-2 mt-2 outline-none focus:border-blue-500" type="password" placeholder="Mot de passe">
            <div class="flex w-5/6 xl:w-1/2 items-center mt-2">
                <input name="remember" id="login_remember_input" class="w-5 h-5 rounded-lg border-2 border-gray-300 shadow px-2 outline-none focus:border-blue-500" type="checkbox">
                <p class="ml-2">Se souvenir de moi</p>
            </div>
            <button id="login_button" class="w-40 h-10 rounded-lg bg-blue-500 shadow px-2 mt-10 outline-none transform transition hover:scale-105 text-white font-semibold">Connexion</button>
        </div>
    </div>
    
    <div id="cookies_box" class="hidden absolute px-10 flex flex-col xl:flex-row m-auto xl:bottom-0 w-full h-full bg-white xl:h-14 justify-center items-center text-center shadow">
        <img class="w-32 h-32 xl:w-10 xl:h-10 transition transform hover:scale-105" src="../data/images/cookies.png">
        <p class="text-lg font-medium mt-4 xl:mt-0 xl:ml-4">Ce site utilise des cookies nécessaires à son bon fonctionnement. En continuant votre navigation, vous acceptez l'utilisation de ces cookies.</p>
        <button id="cookies_accept" class="bg-green-500 text-white font-semibold rounded-lg px-4 py-2 mt-4 xl:mt-0 xl:ml-4 transform transition hover:scale-105">J'ai compris</button>
        <a href="../information#cookies" class="text-gray-600 underline mt-2 xl:mt-0 xl:ml-4 transform transition hover:scale-105 cursor-pointer">En savoir plus</a>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="../scripts/index.js"></script>
</body>
</html>