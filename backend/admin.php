<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login']=='') {
    exit();
}

if (isset($_GET['page']) or isset($_POST['page'])) {
    if (isset($_GET['page'])) $page=$_GET['page'];
    else $page=$_POST['page'];
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

        if (isset($_POST['page'])) {
            $text_fr = filter_var ($_POST['text_fr'], FILTER_SANITIZE_STRING);
            $text_en = filter_var ($_POST['text_en'], FILTER_SANITIZE_STRING);
            $text_nl = filter_var ($_POST['text_nl'], FILTER_SANITIZE_STRING);
            $text2_fr = filter_var ($_POST['text2_fr'], FILTER_SANITIZE_STRING);
            $text2_en = filter_var ($_POST['text2_en'], FILTER_SANITIZE_STRING);
            $text2_nl = filter_var ($_POST['text2_nl'], FILTER_SANITIZE_STRING);
            $quest_fr = filter_var ($_POST['quest_fr'], FILTER_SANITIZE_STRING);
            $rep1_fr = filter_var ($_POST['rep1_fr'], FILTER_SANITIZE_STRING);
            $rep2_fr = filter_var ($_POST['rep2_fr'], FILTER_SANITIZE_STRING);
            $rep3_fr = filter_var ($_POST['rep3_fr'], FILTER_SANITIZE_STRING);
            $rep4_fr = filter_var ($_POST['rep4_fr'], FILTER_SANITIZE_STRING);
            $quest_en = filter_var ($_POST['quest_en'], FILTER_SANITIZE_STRING);
            $rep1_en = filter_var ($_POST['rep1_en'], FILTER_SANITIZE_STRING);
            $rep2_en = filter_var ($_POST['rep2_en'], FILTER_SANITIZE_STRING);
            $rep3_en = filter_var ($_POST['rep3_en'], FILTER_SANITIZE_STRING);
            $rep4_en = filter_var ($_POST['rep4_en'], FILTER_SANITIZE_STRING);
            $quest_nl = filter_var ($_POST['quest_nl'], FILTER_SANITIZE_STRING);
            $rep1_nl = filter_var ($_POST['rep1_nl'], FILTER_SANITIZE_STRING);
            $rep2_nl = filter_var ($_POST['rep2_nl'], FILTER_SANITIZE_STRING);
            $rep3_nl = filter_var ($_POST['rep3_nl'], FILTER_SANITIZE_STRING);
            $rep4_nl = filter_var ($_POST['rep4_nl'], FILTER_SANITIZE_STRING);
            $res = $conn->query("UPDATE intro SET text_fr='$text_fr', text_en='$text_en', text_nl='$text_nl', text2_fr='$text2_fr', 
                 text2_en='$text2_en', text2_nl='$text2_nl', question_fr='$quest_fr', reponse1_fr='$rep1_fr', reponse2_fr='$rep2_fr', 
                 reponse3_fr='$rep3_fr', reponse4_fr='$rep4_fr', question_en='$quest_en', reponse1_en='$rep1_en', reponse2_en='$rep2_en', 
                 reponse3_en='$rep3_en', reponse4_en='$rep4_en', question_nl='$quest_nl', reponse1_nl='$rep1_nl', reponse2_nl='$rep2_nl', 
                 reponse3_nl='$rep3_nl', reponse4_nl='$rep4_nl'");
        }

        $res = $conn->query("SELECT i.url, text_fr, text_en, text_nl, text2_fr, text2_en, text2_nl, question_fr, reponse1_fr, reponse2_fr, reponse3_fr, reponse4_fr,
        question_en, reponse1_en, reponse2_en, reponse3_en, reponse4_en, question_nl, reponse1_nl, reponse2_nl, reponse3_nl, reponse4_nl FROM intro a, image i WHERE a.image_id=i.id");
        $row = $res->fetch_assoc();
        $url = $row ['url'];
        $text_fr = $row['text_fr'];
        $text_en = $row['text_en'];
        $text_nl = $row['text_nl'];
        $text2_fr = $row['text2_fr'];
        $text2_en = $row['text2_en'];
        $text2_nl = $row['text2_nl'];
        $quest_fr = $row['question_fr'];
        $rep1_fr = $row['reponse1_fr'];
        $rep2_fr = $row['reponse2_fr'];
        $rep3_fr = $row['reponse3_fr'];
        $rep4_fr = $row['reponse4_fr'];
        $quest_en = $row['question_en'];
        $rep1_en = $row['reponse1_en'];
        $rep2_en = $row['reponse2_en'];
        $rep3_en = $row['reponse3_en'];
        $rep4_en = $row['reponse4_en'];
        $quest_nl = $row['question_nl'];
        $rep1_nl = $row['reponse1_nl'];
        $rep2_nl = $row['reponse2_nl'];
        $rep3_nl = $row['reponse3_nl'];
        $rep4_nl = $row['reponse4_nl'];
    }

    if ($page=="s1" or $page=="s2" or $page=="s3" or $page=="s4" or $page=="s5" or $page=="s6" or $page=="s7" or $page=="s8" or $page=="s9" or $page=="s10" or $page=="s11") {

        if (isset($_POST['page'])) {
            $id_slide=substr($page, 1);
            $text_fr = filter_var ($_POST['text_fr'], FILTER_SANITIZE_STRING);
            $text_en = filter_var ($_POST['text_en'], FILTER_SANITIZE_STRING);
            $text_nl = filter_var ($_POST['text_nl'], FILTER_SANITIZE_STRING);
            $quest_fr = filter_var ($_POST['quest_fr'], FILTER_SANITIZE_STRING);
            $rep1_fr = filter_var ($_POST['rep1_fr'], FILTER_SANITIZE_STRING);
            $rep2_fr = filter_var ($_POST['rep2_fr'], FILTER_SANITIZE_STRING);
            $rep3_fr = filter_var ($_POST['rep3_fr'], FILTER_SANITIZE_STRING);
            $rep4_fr = filter_var ($_POST['rep4_fr'], FILTER_SANITIZE_STRING);
            $quest_en = filter_var ($_POST['quest_en'], FILTER_SANITIZE_STRING);
            $rep1_en = filter_var ($_POST['rep1_en'], FILTER_SANITIZE_STRING);
            $rep2_en = filter_var ($_POST['rep2_en'], FILTER_SANITIZE_STRING);
            $rep3_en = filter_var ($_POST['rep3_en'], FILTER_SANITIZE_STRING);
            $rep4_en = filter_var ($_POST['rep4_en'], FILTER_SANITIZE_STRING);
            $quest_nl = filter_var ($_POST['quest_nl'], FILTER_SANITIZE_STRING);
            $rep1_nl = filter_var ($_POST['rep1_nl'], FILTER_SANITIZE_STRING);
            $rep2_nl = filter_var ($_POST['rep2_nl'], FILTER_SANITIZE_STRING);
            $rep3_nl = filter_var ($_POST['rep3_nl'], FILTER_SANITIZE_STRING);
            $rep4_nl = filter_var ($_POST['rep4_nl'], FILTER_SANITIZE_STRING);
            $res = $conn->query("UPDATE slide SET text_fr='$text_fr', text_en='$text_en', text_nl='$text_nl', 
                 question_fr='$quest_fr', reponse1_fr='$rep1_fr', reponse2_fr='$rep2_fr', 
                 reponse3_fr='$rep3_fr', reponse4_fr='$rep4_fr', question_en='$quest_en', reponse1_en='$rep1_en', reponse2_en='$rep2_en', 
                 reponse3_en='$rep3_en', reponse4_en='$rep4_en', question_nl='$quest_nl', reponse1_nl='$rep1_nl', reponse2_nl='$rep2_nl', 
                 reponse3_nl='$rep3_nl', reponse4_nl='$rep4_nl' WHERE id='$id_slide'");
        }

        $id_slide=substr($page, 1);
        $res = $conn->query("SELECT i.url, text_fr, text_en, text_nl, question_fr, reponse1_fr, reponse2_fr, reponse3_fr, reponse4_fr,
        question_en, reponse1_en, reponse2_en, reponse3_en, reponse4_en, question_nl, reponse1_nl, reponse2_nl, reponse3_nl, reponse4_nl FROM slide a, image i WHERE a.image_id=i.id AND a.id='$id_slide'");
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
                <h2>Texte d'accompagnement partie 1 en français :</h2>
                <textarea name="text_fr" id="fr"><?php echo $text_fr; ?></textarea>
                <h2>Texte d'accompagnement partie 2 en français :</h2>
                <textarea name="text2_fr" id="fr"><?php echo $text2_fr; ?></textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input type="text" name="quest_fr" class="questionInput" value="<?php echo $quest_fr; ?>"/>
                    <input type="text" name="rep1_fr" class="reponse1" value="<?php echo $rep1_fr; ?>"/>
                    <input type="text" name="rep2_fr" class="reponse2" value="<?php echo $rep2_fr; ?>"/>
                    <input type="text" name="rep3_fr" class="reponse3" value="<?php echo $rep3_fr; ?>"/>
                    <input type="text" name="rep4_fr" class="reponse4" value="<?php echo $rep4_fr; ?>"/>
                </div>


                <h2>Texte d'accompagnement partie 1 en anglais :</h2>
                <textarea id="en" name="text_en"><?php echo $text_en; ?></textarea>
                <h2>Texte d'accompagnement partie 2 en anglais :</h2>
                <textarea id="en" name="text2_en"><?php echo $text2_en; ?></textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input type="text" name="quest_en" class="questionInput" value="<?php echo $quest_en; ?>"/>
                    <input type="text" name="rep1_en" class="reponse1" value="<?php echo $rep1_en; ?>"/>
                    <input type="text" name="rep2_en" class="reponse2" value="<?php echo $rep2_en; ?>"/>
                    <input type="text" name="rep3_en" class="reponse3" value="<?php echo $rep3_en;?>"/>
                    <input type="text" name="rep4_en" class="reponse4" value="<?php echo $rep4_en; ?>"/>
                </div>

                <h2>Texte d'accompagnement partie 1 en néerlandais :</h2>
                <textarea name="text_nl" id="nl"><?php echo $text_nl; ?></textarea>
                <h2>Texte d'accompagnement partie 2 en néerlandais :</h2>
                <textarea name="text2_nl" id="nl"><?php echo $text2_nl; ?></textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input type="text" name="quest_nl" class="questionInput" value="<?php echo $quest_nl; ?>"/>
                    <input type="text" name="rep1_nl" class="reponse1" value="<?php echo $rep1_nl; ?>"/>
                    <input type="text" name="rep2_nl" class="reponse2" value="<?php echo $rep2_nl; ?>"/>
                    <input type="text" name="rep3_nl" class="reponse3" value="<?php echo $rep3_nl; ?>"/>
                    <input type="text" name="rep4_nl" class="reponse4" value="<?php echo $rep4_nl; ?>"/>
                </div>

                <div class="center"><br/><input type="submit" value="Modifier" class="send"/></div>
            </div>
            <?php
        }

        if ($page=="s1" or $page=="s2" or $page=="s3" or $page=="s4" or $page=="s5" or $page=="s6" or $page=="s7" or $page=="s8" or $page=="s9" or $page=="s10" or $page=="s11") {
            ?>
            <input type="hidden" name="id_slide" value="$id_slide">
            <div class="slide">
                <h2>Voici l'image que vous avez choisi pour le <?php echo $titre; ?> :</h2>
                <img src="./assets/image/<?php echo $url; ?>" id="imageSlide"/>
                <div id="changeImageSlide">
                    Choisir une autre image
                </div>
                <h2>Texte d'accompagnement en français :</h2>
                <textarea name="text_fr" id="fr"><?php echo $text_fr; ?></textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input type="text" name="quest_fr" class="questionInput" value="<?php echo $quest_fr; ?>"/>
                    <input type="text" name="rep1_fr" class="reponse1" value="<?php echo $rep1_fr; ?>"/>
                    <input type="text" name="rep2_fr" class="reponse2" value="<?php echo $rep2_fr; ?>"/>
                    <input type="text" name="rep3_fr" class="reponse3" value="<?php echo $rep3_fr; ?>"/>
                    <input type="text" name="rep4_fr" class="reponse4" value="<?php echo $rep4_fr; ?>"/>
                </div>


                <h2>Texte d'accompagnement en anglais :</h2>
                <textarea name="text_en" id="en"><?php echo $text_en; ?></textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input type="text" name="quest_en" class="questionInput" value="<?php echo $quest_en; ?>"/>
                    <input type="text" name="rep1_en" class="reponse1" value="<?php echo $rep1_en; ?>"/>
                    <input type="text" name="rep2_en" class="reponse2" value="<?php echo $rep2_en; ?>"/>
                    <input type="text" name="rep3_en" class="reponse3" value="<?php echo $rep3_en;?>"/>
                    <input type="text" name="rep4_en" class="reponse4" value="<?php echo $rep4_en; ?>"/>
                </div>

                <h2>Texte d'accompagnement en néerlandais :</h2>
                <textarea name="text_nl" id="nl"><?php echo $text_nl; ?></textarea>
                <h3>Quizz de fin de section</h3>
                <div class="question">
                    <input name="quest_nl" type="text" class="questionInput" value="<?php echo $quest_nl; ?>"/>
                    <input name="rep1_nl" type="text" class="reponse1" value="<?php echo $rep1_nl; ?>"/>
                    <input name="rep2_nl" type="text" class="reponse2" value="<?php echo $rep2_nl; ?>"/>
                    <input name="rep3_nl" type="text" class="reponse3" value="<?php echo $rep3_nl; ?>"/>
                    <input name="rep4_nl" type="text" class="reponse4" value="<?php echo $rep4_nl; ?>"/>
                </div>

                <div class="center"><br/><input type="submit" value="Modifier" class="send"/></div>
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