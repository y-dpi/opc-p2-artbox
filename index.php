<?php
require_once(__DIR__ . "/database.php");                // SQL database handles.
require_once(__DIR__ . "/begin.php");                   // Begin HTML boilerplate.
require_once(__DIR__ . "/header.php");                  // Redundant HTML header.
?>

<main>
    <?php // Display artworks to the user. ?>
    <div id="artwork-list">
        <?php $artworks_db = new ArtworkDB; ?>
        <?php foreach ($artworks_db->getArtworks() as $id => $artwork) : ?>
            <article class="artwork">
                <a href="artwork.php?id=<?= $id ?>">
                    <img
                    src="<?= htmlspecialchars($artwork["image"]); ?>"
                    alt="<?= htmlspecialchars($artwork["title"]); ?>"
                    >
                    <h2><?= htmlspecialchars($artwork["title"]); ?></h2>
                    <p class="description"><?= htmlspecialchars($artwork["artist"]); ?></p>
                </a>
            </article>
        <?php endforeach;?>
    </div>
</main>

<?php
require_once(__DIR__ . "/footer.php");                  // Redundant HTML footer.
require_once(__DIR__ . "/end.php");                     // End HTML boilerplate.
?>