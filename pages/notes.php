<?php
    $stmt = $pdo->prepare("SELECT * FROM notes");
    $stmt->execute();
    $notes_s = $stmt->fetchAll();

    $notes = [];

    foreach($notes_s as $note) {
        $users = json_decode($note["users"], true);
        array_push($notes, [
            "id" => $note["id"],
            "name" => $note["title"],
            "users" => $users,
            "users_count" => count($users)
        ]);
    }
?>

<div class="flex flex-col xl:flex-row w-screen h-screen bg-gray-200">
    <?php require("elements/sidebar.php") ?>
    <div class="flex flex-col w-full h-full items-center overflow-y-scroll">
        <p class="text-3xl font-bold mt-4">Vos notes</p>
        <div class="flex flex-col w-full mt-4 px-10">
<?php       foreach($notes as $note) { ?>
                <div class="flex w-full bg-white rounded-xl shadow h-20 mb-4 items-center px-4">
                    <img class="w-12 h-12" src="../data/images/note.png">
                    <div class="flex justify-between w-full">
                        <div class="flex flex-col ml-4">
                            <note_name id="<?=$note["id"]?>" class="text-xl font-bold" contenteditable="true"><?php echo $note["name"] ?></note_name value="<?=$note["id"]?>">
                            <p class="text-sm"><?= $note["users_count"] > 1 ? "Note partagée avec " . $note["users_count"] . " utilisateur" . ($note["users_count"] > 2 ? "s" : "") : "Note personnelle" ?></p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-xl underline text-blue-500 transform transition hover:scale-105 cursor-pointer">Voir</p>
                            <p class="text-xl underline text-blue-500 ml-4 transform transition hover:scale-105 cursor-pointer">Editer</p>
                        </div>
                    </div>
                </div>
<?php       } ?>
        </div>
    </div>
</div>