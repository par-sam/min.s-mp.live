<?php
    require "../scripts/php/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-MP.live | Informations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex flex-col text-center items-center">
    <h1 class="text-5xl font-bold mt-10">S-MP.live</h1>
    <div class="flex mt-2 items-center">
        <p class="text-2xl font-bold">Version:</p>
        <p class="font-semibold text-xl ml-2">D-1.0.1 <?=badge("min")?></p>
    </div>
    <p class="text-5xl font-bold mt-10">Informations</p>
    <p id="introduction" class="text-4xl font-bold mt-4">Introduction</p>
    <p class="text-xl font-semibold mt-2 w-5/6 xl:w-1/2"><span class="text-blue-800">S-MP.live</span> ("La plateforme") est un site web permettant la gestion d'un établissement scolaire.<br><br><span class="font-bold">- Pour les étudiants:</span> <span class="text-blue-800">S-MP.live</span> vous permet de consulter votre horaire, accéder à vos documents, vos notes, bulletins et informations scolaires diverses, discuter avec vos professeurs et vos condisciples ainsi créer, partager et modifier des documents.<br><br><span class="font-bold">- Pour les professeurs:</span> La plateforme vous permet de mettre en ligne vos contrôles et préparations à venir, de créer des groupes d'élèves afin de leur transmettre des documents et des annonces importantes et d'encoder leurs résultats.<br><br><span class="font-bold">- Pour les éducateurs, directeurs, administrateur:</span> Enregistrer et gérez les élèves, professeurs ou employés de votre école sur votre plateforme dédiée. Transmettez leur des informations importantes via les messages directs et annonces de l'école. Configurez la plateforme en fonction de vos besoins.</p>

    <p id="introduction" class="text-4xl font-bold mt-4">Protection des données</p>
    <p class="text-xl font-semibold mt-2 w-5/6 xl:w-1/2"><span class="text-blue-800">S-MP.live</span> n'utilise vos informations personnelles que dans l'ensemble de ses plateformes (Site Web & API). Les informations auxquelles nous avons accès sont: <span class="italic font-normal">Nom d'utilisateur, mot de passe (chiffré), adresse mail, nom complet, date de naissance, établissement scolaire, classe, notes personnelles, documents</span>.<br><br>Vos mots de passes sont chiffrés et ne sont ni visible par les administrateurs de votre plateforme ni par l'équipe <span class="text-blue-800">S-MP.live</span>.<br><br>Vos notes et fichiers<span class="font-bold align-top text-sm">1</span> sont chiffrés. Leur contenu n'est donc visible que par vous, les personnes avec lesquelles ceux-ci sont partagés ainsi que les développeurs responsables. Ils ne sont ni visibles par les administrateurs de votre plateforme ni par le reste de l'équipe <span class="text-blue-800">S-MP.live</span></p>
</body>
</html>