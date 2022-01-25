document.getElementById("boutonLogIn").addEventListener("click", () => {
    let login=document.getElementById("login").value;
    let password=document.getElementById("password").value;
    let url = "./assets/php/connect.php?login=" + login + "&pass=" + password;
        fetch(url, {cache: "reload"})
            .then(response => response.text())
            .then(repos => {
                if (repos==="notok") alerte("Impossible de se connecter : le login ne correspond pas au mot de passe.");
                if (repos==="okgo") window.location.href="admin.php?page=accueil";
            })
            .catch(err => console.log(err))
})

