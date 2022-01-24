<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    exit();
}

if (isset($_GET['page'])) {
    $page=$_GET['page'];
    if ($page=="accueil") $titre="Page d'accueil";
    if ($page=="intro") $titre="Introduction";
    if ($page=="s1") $titre="Slide 1";
    if ($page=="s2") $titre="Slide 2";
    if ($page=="s3") $titre="Slide 3";
    if ($page=="s4") $titre="Slide 4";
    if ($page=="s5") $titre="Slide 5";
    if ($page=="s6") $titre="Slide 6";
    if ($page=="s7") $titre="Slide 7";
    if ($page=="s8") $titre="Slide 8";
    if ($page=="s9") $titre="Slide 9";
    if ($page=="s10") $titre="Slide 10";
    if ($page=="s11") $titre="Slide 11";
    if ($page=="image") $titre="des images";
}
else {
    exit();
}

/////////////////////////////////////////////////
/// Partie avec connexion à la DB
include './assets/php/db_connect.php';
$conn = OpenCon();

if (isset($_GET['page']) or isset($_POST['page'])) {
    if ($page == "accueil") {
        $res = $conn->query("SELECT i.url, i.name FROM accueil a, image i WHERE a.image_id=i.id");
        $row = $res->fetch_assoc();
        $url = $row ['url'];
        $name = $row ['name'];
    }

    if ($page == "intro") {
        $res = $conn->query("SELECT i.url, text_fr, text_en, text_nl, question_fr, reponse1_fr, reponse2_fr, reponse3_fr, reponse4_fr,
        question_en, reponse1_en, reponse2_en, reponse3_en, reponse4_en, question_nl, reponse1_nl, reponse2_nl, reponse3_nl, reponse4_nl FROM intro a, image i WHERE a.image_id=i.id");
        $row = $res->fetch_assoc();
        $url = $row ['url'];
        $text_fr = utf8_encode($row['text_fr']);
        $text_en = utf8_encode($row['text_en']);
        $text_nl = utf8_encode($row['text_nl']);
        $quest_fr = utf8_encode($row['question_fr']);
        $rep1_fr = utf8_encode($row['reponse1_fr']);
        $rep2_fr = utf8_encode($row['reponse2_fr']);
        $rep3_fr = utf8_encode($row['reponse3_fr']);
        $rep4_fr = utf8_encode($row['reponse4_fr']);
        $quest_en = utf8_encode($row['question_en']);
        $rep1_en = utf8_encode($row['reponse1_en']);
        $rep2_en = utf8_encode($row['reponse2_en']);
        $rep3_en = utf8_encode($row['reponse3_en']);
        $rep4_en = utf8_encode($row['reponse4_en']);
        $quest_nl = utf8_encode($row['question_nl']);
        $rep1_nl = utf8_encode($row['reponse1_nl']);
        $rep2_nl = utf8_encode($row['reponse2_nl']);
        $rep3_nl = utf8_encode($row['reponse3_nl']);
        $rep4_nl = utf8_encode($row['reponse4_nl']);
    }

    if ($page == "image") {
        $res = $conn->query("SELECT id, url, name, disposition FROM image");
    }
}

CloseCon($conn);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link href="https://salukimakingcode.github.io/pack/pack.css" rel="stylesheet" />
    <script src="https://salukimakingcode.github.io/pack/pack.js"></script>
    <link href="./assets/css/style.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="description" content="Admin" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin- Vous êtes connecté</title>
</head>

<body id="admin">
<nav>
    <img src="./assets/img/Logo-onpp.png" alt="logo"/>
    <div><a href="admin.php?page=accueil">Accueil</a></div>
    <div><a href="admin.php?page=intro">Introduction</a></div>
    <div><a href="admin.php?page=s1">Slide 1</a></div>
    <div><a href="admin.php?page=s2">Slide 2</a></div>
    <div><a href="admin.php?page=s3">Slide 3</a></div>
    <div><a href="admin.php?page=s4">Slide 4</a></div>
    <div><a href="admin.php?page=s5">Slide 5</a></div>
    <div><a href="admin.php?page=s6">Slide 6</a></div>
    <div><a href="admin.php?page=s7">Slide 7</a></div>
    <div><a href="admin.php?page=s8">Slide 8</a></div>
    <div><a href="admin.php?page=s9">Slide 9</a></div>
    <div><a href="admin.php?page=s10">Slide 10</a></div>
    <div><a href="admin.php?page=s11">Slide 11</a></div>
    <div class="hr">&nbsp;</div>
    <div><a href="admin.php?page=image">Gestion des images</a></div>
</nav>

<main id="main">
<?php
if (isset($page)) {
    ?>
    <form action="admin.php" method="post">
        <input type="hidden" name="page" value="<?php echo $page;?>">
        <h1>Administration <?php echo $titre; ?></h1>
        <?php

        if ($page=="accueil") {
            ?>
                <div class="accueil">
                    <h2>Voici l'image que vous avez choisi pour l'accueil de l'application :</h2>
                    <img src="./assets/image/<?php echo $url; ?>" id="imageAccueil"/>
                    <div id="changeImageAccueil">
                        Choisir une autre image
                    </div>
                </div>
            <?php
        }

        if ($page=="intro") {
            ?>
            <div class="introduction">
                <h2>Voici l'image que vous avez choisi pour l'introduction :</h2>
                <img src="./assets/image/<?php echo $url; ?>" id="imageIntro"/>
                <div id="changeImageIntro">
                    Choisir une autre image
                </div>
                <h2>Texte d'accompagnement en français :</h2>
                <textarea id="fr">
                    <?php echo $text_fr; ?>
                </textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input type="text" class="questionInput" value="<?php echo $quest_fr; ?>"/>
                    <input type="text" class="reponse1" value="<?php echo $rep1_fr; ?>"/>
                    <input type="text" class="reponse2" value="<?php echo $rep2_fr; ?>"/>
                    <input type="text" class="reponse3" value="<?php echo $rep3_fr; ?>"/>
                    <input type="text" class="reponse4" value="<?php echo $rep4_fr; ?>"/>
                </div>


                <h2>Texte d'accompagnement en anglais :</h2>
                <textarea id="en">
                    <?php echo $text_en; ?>
                </textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input type="text" class="questionInput" value="<?php echo $quest_en; ?>"/>
                    <input type="text" class="reponse1" value="<?php echo $rep1_en; ?>"/>
                    <input type="text" class="reponse2" value="<?php echo $rep2_en; ?>"/>
                    <input type="text" class="reponse3" value="<?php echo $rep3_en;?>"/>
                    <input type="text" class="reponse4" value="<?php echo $rep4_en; ?>"/>
                </div>

                <h2>Texte d'accompagnement en néerlandais :</h2>
                <textarea id="nl">
                    <?php echo $text_nl; ?>
                </textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input type="text" class="questionInput" value="<?php echo $quest_nl; ?>"/>
                    <input type="text" class="reponse1" value="<?php echo $rep1_nl; ?>"/>
                    <input type="text" class="reponse2" value="<?php echo $rep2_nl; ?>"/>
                    <input type="text" class="reponse3" value="<?php echo $rep3_nl; ?>"/>
                    <input type="text" class="reponse4" value="<?php echo $rep4_nl; ?>"/>
                </div>

                <div class="center"><br/><input type="submit" value="modifier"/></div>
            </div>
            <?php
        }

        if ($page=="image") {
            echo "<div class='diapo'>";
            while ($donnees = $res->fetch_assoc()) {
            ?>
            <div class="imageDiapo">
                <div class="imageDiapoName"><?php echo $donnees['name']; ?></div>
                <div class="imageDiapoDisposition"><?php echo $donnees['disposition']; ?></div>
                <div class="imageDiapoImage"><img src="./assets/image/<?php echo $donnees['url']; ?>" class="imageDiapoImage<?php echo $donnees['disposition']; ?>"></div>
            </div>
            <?php
            }
            echo '</div>';
        }

        ?>
    </form>
    <?php
}
?>
</main>

<footer id="footer"></footer>

</body>

</html>