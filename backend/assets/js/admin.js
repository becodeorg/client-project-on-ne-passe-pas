if (document.getElementById("changeImageAccueil")) {
    document.getElementById("changeImageAccueil").addEventListener("click", () => {
        load("./assets/php/image_accueil.php", "showImage");
        document.getElementById("modale").style.display = "flex";
    });
}

document.querySelectorAll(".changeImageSlide").forEach( (elem) =>
    elem.addEventListener("click", ()=> {
    load("./assets/php/image_slide.php?slide=" + elem.id, "showImage");
    document.getElementById("modale").style.display="flex";
}));

document.querySelectorAll(".changeImageIntro").forEach( (elem) =>
    elem.addEventListener("click", ()=> {
        load("./assets/php/image_intro.php?slot=" + elem.id, "showImage");
        document.getElementById("modale").style.display="flex";
    }));

document.querySelectorAll(".imageActionButtonUpdate").forEach( (elem) =>
    elem.addEventListener("click", ()=> {
        load("./assets/php/image_update.php?id=" + elem.id, "showImage");
        document.getElementById("modale").style.display="flex";
    }));

function updateImageAccueil(id) {
    window.location.href="admin.php?page=accueil&update_image_accueil=1&id=" + id;
}

function updateImageSlide(slide, id) {
    window.location.href="admin.php?page=" + slide + "&update_image_slide=1&id=" + id;
}

function updateImageIntro(slot, id) {
    window.location.href="admin.php?page=intro&update_image_intro=1&slot=" + slot + "&id=" + id;
}

function updateImage() {
    let e = document.getElementById("disposition");
    let form = {
        name : document.getElementById("name").value,
        disposition : e.options[e.selectedIndex].value,
        id : document.getElementById('id').value
    }
    fetch("./assets/php/update_image_now.php", {cache: "reload", method: "POST", body: JSON.stringify(form)})
        .then(response => response.text())
        .then(saveData => {
            window.location.href="admin.php?page=image";
        })
        .catch(err => console.log(err))
}