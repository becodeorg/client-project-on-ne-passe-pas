<?php
include 'db_connect.php';
$conn = OpenCon();
$res = $conn->query("SELECT id, url, name, disposition FROM image WHERE disposition='portrait'");
echo "<div class='diapo'>";
while ($donnees = $res->fetch_assoc()) {
    ?>
    <div class="imageDiapo" onclick="updateImageAccueil('<?php echo $donnees['id']; ?>');">
        <div class="imageDiapoName"><?php echo $donnees['name']; ?></div>
        <div class="imageDiapoDisposition"><?php echo $donnees['disposition']; ?></div>
        <div class="imageDiapoImage"><img src="./assets/image/<?php echo $donnees['url']; ?>" class="imageDiapoImage<?php echo $donnees['disposition']; ?>"></div>
    </div>
    <?php
}
echo '</div>';
