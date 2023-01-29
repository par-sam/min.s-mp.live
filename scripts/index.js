let nav_menu = document.getElementById("nav_menu")
let nav_btn = document.getElementById("nav_btn")
let nav_menu_close = document.getElementById("nav_menu_close")
let notif = document.getElementById("notif")
let notif_title = document.getElementById("notif_title")
let notif_content = document.getElementById("notif_content")
let notif_icon = document.getElementById("notif_icon")
let disconnect = document.getElementById("disconnect")
let cookies_accept = document.getElementById("cookies_accept")

if (cookies_box) {
    if (!document.cookie.includes("cookies_accepted=true")) {
        cookies_box.style.display = "flex"
    }

    cookies_accept.addEventListener("click", function() {
        cookies_box.style.display = "none"
        let expiration_date = new Date();
        expiration_date.setFullYear(expiration_date.getFullYear() + 1)
        document.cookie = "cookies_accepted=true; path=/; expires=" + expiration_date.toUTCString()
    })
}

if (nav_menu) {
    nav_btn.addEventListener("click", function(){
        fadeIn(nav_menu, "flex", 100)
    })

    nav_menu_close.addEventListener("click", function(){
        fadeOut(nav_menu, "none", 100)
    })

    if (disconnect) {

        disconnect.addEventListener("click", function(){
            disconnect.disabled = true;
            disconnect.classList.add("bg-gray-500")

            $.ajax({
                url: "../scripts/php/disconnect.php",
                type: "POST",
                success: function(data) {
                    console.log(data)
                    if (data == "success") {
                        notif_title.innerHTML = "Déconnecté !"
                        notif_content.innerHTML = "Vous êtes maintenant déconnecté."
                        notif_icon.src = "../data/images/check.png"
                        fadeIn(notif, "flex", 100)

                        setTimeout(function() {
                            location.reload();
                        }, 2000)
                    } else {
                        disconnect.disabled = false
                        disconnect.classList.remove("bg-gray-500")

                        notif_title.innerHTML = "Erreur !"
                        notif_content.innerHTML = "Une erreur est survenue."
                        notif_icon.src = "../data/images/cross.png"
                        fadeIn(notif, "flex", 100)

                        setTimeout(function() {
                            fadeOut(notif, "none", 100)
                        }, 2000)
                    }
                }
            })
        })
    }
}

let login_username_input = document.getElementById("login_username_input")
let login_password_input = document.getElementById("login_password_input")
let login_button = document.getElementById("login_button")
let login_remember_input = document.getElementById("login_remember_input")

if (login_button) {
    login_button.addEventListener("click", function () {
        let username = login_username_input.value
        let password = login_password_input.value
        let remember = login_remember_input.checked
        login_button.disabled = true;
        login_button.classList.add("bg-gray-500")

        $.ajax({
            url: "../scripts/php/login.php",
            type: "POST",
            data: {
                username: username,
                password: password,
                remember: remember
            },
            success: function (data) {
                switch (data) {
                    case "success":
                        notif_title.innerHTML = "Connecté !"
                        notif_content.innerHTML = "Vous êtes maintenant connecté."
                        notif_icon.src = "../data/images/check.png"
                        fadeIn(notif, "flex", 100)

                        setTimeout(function () {
                            location.reload()
                        }, 1000)
                        break;
                    case "id_incorrect":
                        login_button.disabled = false
                        login_button.classList.remove("bg-gray-500")

                        notif_title.innerHTML = "Erreur"
                        notif_content.innerHTML = "Nom d'utilisateur ou mot de passe incorrect."
                        notif_icon.src = "../data/images/cross.png"
                        fadeIn(notif, "flex", 100)

                        setTimeout(function () {
                            fadeOut(notif, 100)
                        }, 2000)
                        break;
                    case "field_empty":
                        login_button.disabled = false
                        login_button.classList.remove("bg-gray-500")

                        notif_title.innerHTML = "Erreur"
                        notif_content.innerHTML = "Veuillez remplir tous les champs."
                        notif_icon.src = "../data/images/cross.png"
                        fadeIn(notif, "flex", 100)

                        setTimeout(function () {
                            fadeOut(notif, 100)
                        }, 2000)
                        break;
                    default:
                        login_button.disabled = false
                        login_button.classList.remove("bg-gray-500")
                        
                        notif_title.innerHTML = "Erreur"
                        notif_content.innerHTML = "Une erreur est survenue."
                        notif_icon.src = "../data/images/cross.png"
                        fadeIn(notif, "flex", 100)

                        setTimeout(function () {
                            fadeOut(notif, 100)
                        }, 2000)
                        break;
                }
            }
        })
    })
}

let notes_name = document.getElementsByTagName("note_name")

if (notes_name.length > 0) {
    for (let i = 0; i < notes_name.length; i++) {
        notes_name[i].addEventListener("focusout", function(){
            let note_name = notes_name[i].innerHTML;
            let note_id = notes_name[i].id;

            $.ajax({
                url: "../scripts/php/update_note_name.php",
                type: "POST",
                data: {
                    title: note_name,
                    id: note_id
                },
                success: function(data) {
                    switch(data) {
                        case "success":
                            notif_title.innerHTML = "Nom changé"
                            notif_content.innerHTML = "Vous aviez changé le nom de la note en \"" + note_name + "\"."
                            notif_icon.src = "../data/images/check.png"
                            fadeIn(notif, "flex", 100)

                            setTimeout(function() {
                                fadeOut(notif, 100)
                            }, 3000)
                            break;
                        default:
                            notif_title.innerHTML = "Erreur"
                            notif_content.innerHTML = data
                            notif_icon.src = "../data/images/cross.png"
                            fadeIn(notif, "flex", 100)

                            setTimeout(function() {
                                fadeOut(notif, 100)
                            }, 2000)
                            break;
                    }
                }
            })
        })
    }
}

function fadeIn(element, display, time) {
    element.style.display = display
    element.style.opacity = 0
    let i = 0
    let timer = setInterval(function(){
        i += 0.1
        element.style.opacity = i
        if(i >= 1){
            clearInterval(timer)
        }
    } , time / 10)
}

function fadeOut(element, time) {
    let i = 1
    let timer = setInterval(function(){
        i -= 0.1
        element.style.opacity = i
        if(i <= 0){
            clearInterval(timer)
            element.style.display = "none"
        }
    } , time / 10)
}