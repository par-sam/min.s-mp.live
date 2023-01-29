<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $sestoken = isset($_SESSION["token"]) ? $_SESSION["token"] : (isset($_COOKIE["token"]) ? $_COOKIE["token"] : NULL);

        if ($sestoken) {
            require "db.php";
            $stmt = $pdo->prepare("UPDATE users SET token = NULL WHERE token = :token");
            $stmt->execute([
                "token" => $sestoken
            ]);

            session_destroy();
            setcookie("token", "", time() - 3600, "/");
            echo "success";
        }
    } else {
        header("HTTP/1.1 405 Method Not Allowed");
        exit;
    }