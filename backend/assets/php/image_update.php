<?php
$id = substr($_GET['id'], 11);
include 'db_connect.php';
$conn = OpenCon();
$res = $conn->query("SELECT url, name, disposition FROM image WHERE id='$id'");
$row = $res->fetch_assoc();
$url = $row['url'];
$name = $row['name'];
$disposition = $row['disposition'];
?>

<div class="modalUpdateImage">
    <input type="hidden" id="id" value="<?php echo $id; ?>">

    <input type="text" name="name" id="name" value="<?php echo $name; ?>">

    <select name="disposition" id="disposition">
        <option value="portrait" <?php if ($disposition=="portrait") echo "selected"; ?>>Portrait</option>
        <option value="paysage" <?php if ($disposition=="paysage") echo "selected"; ?>>Paysage</option>
        <option value="carre" <?php if ($disposition=="carre") echo "selected"; ?>>Carré</option>
    </select>

    <img src="./assets/image/<?php echo $url; ?>" id="imageAccueil" class="imageDispo<?php echo $disposition; ?>"/>

    <div id="updateImageButton" onclick="updateImage();">Sauvegarder les modifications</div>
</div>