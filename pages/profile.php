<?php
    
?>

<div class="flex flex-col xl:flex-row w-screen h-screen bg-gray-200">
    <?php require("elements/sidebar.php") ?>
    <div class="flex flex-col w-full h-full xl:items-center xl:justify-center">
        <div class="flex w-full h-full xl:h-auto xl:w-auto xl:bg-white rounded-xl items-center justify-center xl:justify-start xl:shadow p-4">
            <img class="w-32 h-32 rounded-full shadow border-4 xl:transition xl:transform xl:hover:scale-105" src="../data/users/avatars/<?=$user["id"]?>.png">
            <div class="flex flex-col justify-center ml-4">
                <p class="text-2xl font-bold"><?=$user["name"]?></p>
                <p class="text-xl font-bold"><?=$user["class"]?></p>
                <div class="flex mt-2">
<?php               foreach(json_decode($user["ranks"], true) as $rank) { ?>
                        <p class="text-xl font-bold mr-2 bg-<?=$rank["color"]?> rounded-md px-2 text-white uppercase"><?=$rank["name"]?></p>
<?php               } ?>
                </div>
            </div>
    </div>
        <button id="disconnect" class="bg-red-700 rounded-t-md xl:rounded-b-md text-white font-semibold p-2 mt-4 transition transform hover:scale-105">Se déconnecter</button>
    </div>
</div>