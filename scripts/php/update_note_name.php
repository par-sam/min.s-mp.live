<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require "db.php";
        session_start();
        $stmt = $pdo->prepare("SELECT users FROM notes WHERE id = :id");
        $stmt->execute([
            "id" => $_POST["id"]
        ]);
        $users = $stmt->fetch()["users"];
        $users = json_decode($users, true);

        $stmt = $pdo->prepare("SELECT id FROM users WHERE token = :token");
        $stmt->execute([
            "token" => isset($_SESSION["token"]) ? $_SESSION["token"] : (isset($_COOKIE["token"]) ? $_COOKIE["token"] : "")
        ]);
        $user_id = $stmt->fetch()["id"];

        if (in_array($user_id, $users)) {
            $stmt = $pdo->prepare("UPDATE notes SET title = :title WHERE id = :id");
            $stmt->execute([
                "title" => $_POST["title"],
                "id" => $_POST["id"]
            ]);
            echo "success";
        } else {
            echo "Cette note ne vous appartiens pas !";
        }
    } else {
        header("HTTP/1.1 405 Method Not Allowed");
        exit();
    }