<?php
    $stmt = $pdo->prepare("SELECT * FROM configuration");
    $stmt->execute();
    $config = $stmt->fetch();
?>

<div class="flex flex-col xl:flex-row w-screen h-screen bg-gray-200">
    <?php require("elements/sidebar.php") ?>
    <div class="flex flex-col w-full h-full items-center justify-center text-center">
        <p class="text-5xl font-bold"><?=isset($config["school_name"]) ? $config["school_name"] : "S-MP.live"?></p>
        <p class="flex text-2xl font-bold mt-2"><?=isset($config["home_content"]) ? $config["home_content"] : "Version:&nbsp;<span class=\"font-medium flex items-center\">D-1.0.1&nbsp;".badge("min")."</span>" ?></p>
    </div>
    <a href="../information" class="underline text-gray-600 m-2 absolute right-0 bottom-0 xl:top-0">Informations</a>
</div>