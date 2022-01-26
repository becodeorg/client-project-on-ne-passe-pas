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

        if (isset($_GET['update_image_accueil']) && isset($_GET['id'])) {
            $idImageAccueil=$_GET['id'];
            $res = $conn->query("UPDATE accueil SET image_id='$idImageAccueil'");
        }

        $res = $conn->query("SELECT i.url, i.name FROM accueil a, image i WHERE a.image_id=i.id");
        $row = $res->fetch_assoc();
        $url = $row ['url'];
        $name = $row ['name'];
    }

    if ($page == "intro") {

        if (isset($_GET['update_image_intro']) and isset($_GET['id']) and isset($_GET['slot'])) {
            $idImageIntro=$_GET['id'];
            $slot= "image".$_GET['slot']."_id";
            $res = $conn->query("UPDATE intro SET ".$slot."='$idImageIntro'");
        }

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

        $res = $conn->query("SELECT image1_id, image2_id, image3_id, image4_id, image5_id, image6_id, image7_id, image8_id, image9_id, image10_id, 
        text_fr, text_en, text_nl, text2_fr, text2_en, text2_nl, question_fr, reponse1_fr, reponse2_fr, reponse3_fr, reponse4_fr,
        question_en, reponse1_en, reponse2_en, reponse3_en, reponse4_en, question_nl, reponse1_nl, reponse2_nl, reponse3_nl, reponse4_nl FROM intro");
        $row = $res->fetch_assoc();
        $image1 = $row['image1_id'];
        $image2 = $row['image2_id'];
        $image3 = $row['image3_id'];
        $image4 = $row['image4_id'];
        $image5 = $row['image5_id'];
        $image6 = $row['image6_id'];
        $image7 = $row['image7_id'];
        $image8 = $row['image8_id'];
        $image9 = $row['image9_id'];
        $image10 = $row['image10_id'];
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
        $res = $conn->query("SELECT id, url, disposition FROM image WHERE id='$image1' OR id='$image2' OR id='$image3' 
             OR id='$image4' OR id='$image5' OR id='$image6' OR id='$image7' OR id='$image8' OR id='$image9' OR id='$image10'");
        while ($donnees = $res->fetch_assoc()) {
            if ($image1==$donnees['id']) { $url1=$donnees['url']; $disposition1=$donnees['disposition']; }
            if ($image2==$donnees['id']) { $url2=$donnees['url']; $disposition2=$donnees['disposition']; }
            if ($image3==$donnees['id']) { $url3=$donnees['url']; $disposition3=$donnees['disposition']; }
            if ($image4==$donnees['id']) { $url4=$donnees['url']; $disposition4=$donnees['disposition']; }
            if ($image5==$donnees['id']) { $url5=$donnees['url']; $disposition5=$donnees['disposition']; }
            if ($image6==$donnees['id']) { $url6=$donnees['url']; $disposition6=$donnees['disposition']; }
            if ($image7==$donnees['id']) { $url7=$donnees['url']; $disposition7=$donnees['disposition']; }
            if ($image8==$donnees['id']) { $url8=$donnees['url']; $disposition8=$donnees['disposition']; }
            if ($image9==$donnees['id']) { $url9=$donnees['url']; $disposition9=$donnees['disposition']; }
            if ($image10==$donnees['id']) { $url10=$donnees['url']; $disposition10=$donnees['disposition']; }
        }
    }

    if ($page=="s1" or $page=="s2" or $page=="s3" or $page=="s4" or $page=="s5" or $page=="s6" or $page=="s7" or $page=="s8" or $page=="s9" or $page=="s10" or $page=="s11") {
        $id_slide=substr($page, 1);

        if (isset($_POST['page'])) {
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

        if (isset($_GET['update_image_slide']) and isset($_GET['id'])) {
            $idImageSlide=$_GET['id'];
            $res = $conn->query("UPDATE slide SET image_id='$idImageSlide' WHERE id='$id_slide'");
        }

        $res = $conn->query("SELECT i.url, i.disposition, text_fr, text_en, text_nl, question_fr, reponse1_fr, reponse2_fr, reponse3_fr, reponse4_fr,
        question_en, reponse1_en, reponse2_en, reponse3_en, reponse4_en, question_nl, reponse1_nl, reponse2_nl, reponse3_nl, reponse4_nl FROM slide a, image i WHERE a.image_id=i.id AND a.id='$id_slide'");
        $row = $res->fetch_assoc();
        $url = $row ['url'];
        $disposition = $row ['disposition'];
        $text_fr = $row['text_fr'];
        $text_en = $row['text_en'];
        $text_nl = $row['text_nl'];
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
                <h2>Voici les images que vous avez choisi pour la première partie de l'introduction :</h2>
                <div class="containerImageIntro">
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url1; ?>" class="imageIntroDisposition<?php echo $disposition1; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro1">
                            Choisir une autre image
                        </div>
                    </div>
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url2; ?>" class="imageIntroDisposition<?php echo $disposition2; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro2">
                            Choisir une autre image
                        </div>
                    </div>
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url3; ?>" class="imageIntroDisposition<?php echo $disposition3; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro3">
                            Choisir une autre image
                        </div>
                    </div>
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url4; ?>" class="imageIntroDisposition<?php echo $disposition4; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro4">
                            Choisir une autre image
                        </div>
                    </div>
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url5; ?>" class="imageIntroDisposition<?php echo $disposition5; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro5">
                            Choisir une autre image
                        </div>
                    </div>
                </div>

                <h2>Voici les images que vous avez choisi pour la deuxième partie de l'introduction :</h2>
                <div class="containerImageIntro">
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url6; ?>" class="imageIntroDisposition<?php echo $disposition6; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro6">
                            Choisir une autre image
                        </div>
                    </div>
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url7; ?>" class="imageIntroDisposition<?php echo $disposition7; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro7">
                            Choisir une autre image
                        </div>
                    </div>
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url8; ?>" class="imageIntroDisposition<?php echo $disposition8; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro8">
                            Choisir une autre image
                        </div>
                    </div>
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url9; ?>" class="imageIntroDisposition<?php echo $disposition9; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro9">
                            Choisir une autre image
                        </div>
                    </div>
                    <div class="containerOneImageIntro">
                        <div class="containerImageIntroHeight"><img src="./assets/image/<?php echo $url10; ?>" class="imageIntroDisposition<?php echo $disposition10; ?>"/></div>
                        <div class="changeImageIntro" id="updateImageIntro10">
                            Choisir une autre image
                        </div>
                    </div>
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
                <div class="center"> <img src="./assets/image/<?php echo $url; ?>" id="imageSlide" class="imageSlideDisposition<?php echo $disposition; ?>"/></div>
                <div class="changeImageSlide" id="<?php echo $page; ?>">
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
                <div class="imageAction">
                    <div class="imageActionButtonUpdate" id="updateImage<?php echo $donnees['id']; ?>">Modifier</div>
<!--                    <div class="imageActionButtonDelete">Supprimer</div>-->
                </div>
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
<script src="./assets/js/admin.js"></script>

<div id="modale" class="modale">
    <div id="modale-content">
        <div id="showImage"> </div>
        <div id="closeModale" onclick="document.getElementById('modale').style.display='none'">Annuler</div>
    </div>
</div>

</body>

</html>