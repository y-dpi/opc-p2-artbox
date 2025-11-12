<?php
require_once(__DIR__ . "/database.php");                // SQL database handles.
require_once(__DIR__ . "/begin.php");                   // Begin HTML boilerplate.
require_once(__DIR__ . "/header.php");                  // Redundant HTML header.
?>

<main>
    <?php // Display single artwork in details to the user. ?>
    <article id="artwork-details">
        <?php $artworks_db = new ArtworkDB; ?>
        <?php $artwork = $artworks_db->getArtworks()[$_GET["id"]]; ?>
        <div id="artwork-img">
            <img
            src="<?= htmlspecialchars($artwork["image"]); ?>"
            alt="<?= htmlspecialchars($artwork["title"]); ?>"
            >
        </div>
        <div id="artwork-content">
            <h1><?= htmlspecialchars($artwork["title"]); ?></h1>
            <p class="description"><?= htmlspecialchars($artwork["artist"]); ?></p>
            <p class="full-description"><?= htmlspecialchars($artwork["description"]); ?></p>
        </div>
    </article>
</main>

<?php
require_once(__DIR__ . "/footer.php");                  // Redundant HTML footer.
require_once(__DIR__ . "/end.php");                     // End HTML boilerplate.
?>