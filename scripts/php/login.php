<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = isset($_POST["password"]) ? $_POST["password"] : NULL;
        $username = isset($_POST["username"]) ? $_POST["username"] : NULL;
        $remember = isset($_POST["remember"]) ? $_POST["remember"] : NULL;

        if (!$username || !$password) {
            echo "field_empty";
            exit;
        }

        require "db.php";
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([
            "username" => $username
        ]);
        $user = $stmt->fetch();

        if (!$user) {
            echo "id_incorrect";
            exit;
        }

        if (password_verify($password, $user["password"])) {
            session_start();
            $token = bin2hex(random_bytes(32));
            $stmt = $pdo->prepare("UPDATE users SET token = :token WHERE id = :id");
            $stmt->execute([
                "token" => $token,
                "id" => $user["id"]
            ]);
            if ($remember) {
                setcookie("token", $token, time() + 3600 * 24 * 30, "/");
            } else {
                $_SESSION["token"] = $token;
            }
            echo "success";
            exit;
        } else {
            echo "id_incorrect";
            exit;
        }
    } else {
        header("HTTP/1.1 405 Method Not Allowed");
        exit;
    }