<?php
    $stmt = $pdo->prepare("SELECT * FROM horaire WHERE class = :class");
    $stmt->execute([
        "class" => $user["class"]
    ]);
    $horaire = $stmt->fetch();
    $horaire = $horaire ? (json_decode($horaire["json"], true)) : NULL;
?>

<div class="flex flex-col xl:flex-row w-screen h-screen bg-gray-200">
    <?php require("elements/sidebar.php") ?>
    <div class="flex w-full h-full xl:items-center xl:justify-center">
        <div class="flex w-full h-full xl:h-auto xl:w-auto xl:bg-white rounded-xl xl:items-center justify-center shadow p-4">
<?php
            if (!$horaire) {
                echo "<p class='text-xl font-bold'>Aucun horaire n'est disponible pour le moment</p>";
                exit;
            };
            $hours = $horaire["hours"];
            $days = $horaire["days"];
            $colors = $horaire["colors"];

            echo "<div class=\"flex flex-col\">";
                echo "<div class=\"flex justify-center items-center bg-gray-900 text-center text-white w-24 h-10 rounded-tl-xl\">Heures</div>";
                foreach($hours as $key => $hour) {
                    echo "<div class=\"flex justify-center items-center bg-gray-600 text-center text-white w-24 h-20\">$hour</div>";
                }
            echo "</div>";

            echo "<div class=\"flex w-52 md:w-96 xl:w-auto overflow-x-scroll scroll-hide\">";
                foreach($days as $key => $day) {
                    echo "<div class=\"flex flex-col\">";
                        echo "<div class=\"flex justify-center items-center bg-gray-600 text-center text-white w-52 h-10\">$key</div>";

                        foreach($hours as $key => $hour) {
                            $text = "";
                            $color = "gray-200";
                            if (isset($day[$key])) {
                                $text = $day[$key]["name"];
                                $color = isset($colors[$day[$key]["name"]]) ? $colors[$day[$key]["name"]] : "gray-200";
                                if (isset($day[$key]["local"])) {
                                    $text .= "<br>" . $day[$key]["local"];
                                }
                                if (isset($day[$key]["teacher"])) {
                                    $text .= "<br>" . $day[$key]["teacher"];
                                }
                            }
                            echo "<div class=\"flex justify-center items-center bg-$color text-center w-52 h-20 border border-black px-2\">$text</div>";
                        }

                    echo "</div>";
                }
            echo "</div>";
?>
        </div>
    </div>
</div>