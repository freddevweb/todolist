<?php
    $id = $_GET["id"];
?>
<form action="services/modify_note_service.php" method="post">
    <label for="titre">Titre : </label>
    <input type="hidden" name="id" value=<?= '"'.$id.'"'?> >
    <input type="text" id="titre" name="titre" value=<?= '"'.$note->titre.'"'?> >
    <br />
    <textarea name="description"  cols="30" rows="10" ><?= $note->description; ?></textarea>
    <br />
    <input type="submit" value="Modifier">
    <a href="index.php?page=profil">
        <button>Effacer</button>
    </a>
</form>