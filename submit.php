<?php
require_once(__DIR__ . "/utils.php");                   // PHP utility functions.
require_once(__DIR__ . "/database.php");                // SQL database handles.
require_once(__DIR__ . "/begin.php");                   // Begin HTML boilerplate.
require_once(__DIR__ . "/header.php");                  // Redundant HTML header.
?>

<?php // Display artwork submission form to the user. ?>
<form action="processing.php" method="POST">
    <div class="form-field">
        <label for="title">Titre de l'œuvre</label>
        <input type="text" name="title" id="title">
    </div>
    <div class="form-field">
        <label for="artist">Auteur de l'œuvre</label>
        <input type="text" name="artist" id="artist">
    </div>
    <div class="form-field">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image">
    </div>
    <div class="form-field">
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>

<?php
require_once(__DIR__ . "/footer.php");                  // Redundant HTML footer.
require_once(__DIR__ . "/end.php");                     // End HTML boilerplate.
?>