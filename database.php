<?php

// Artwork database handle class.
class ArtworkDB {
    protected $dbHandle;

    // Artwork database handle class constructor.
    public function __construct() {
        try {

            // Access SQL database.
            $this->dbHandle = new PDO("mysql:host=localhost;dbname=opc-p2-artbox;charset=utf8", "root", "");

        } catch (Exception $e) {

            // Display error on the page.
            die("Failed to access SQL database, error : {$e->getMessage()}");
        }
        
    }

    // Fetch artwork array from SQL database.
    public function getArtworks() {
        try {

            // Read artworks from database.
            $dbArtworks = $this->dbHandle->prepare("SELECT * FROM artworks");
            $dbArtworks->execute();
            $artworks = $dbArtworks->fetchAll(PDO::FETCH_ASSOC);

            // Return artwork associative array by IDs.
            $artworks = array_column($artworks, null, "id");
            $artworks = array_map(fn($item) => array_diff_key($item, ["id" => ""]), $artworks);
            return $artworks;

        } catch (Exception $e) {

            // Display error on the page.
            die("Failed to read from SQL database, error : {$e->getMessage()}");
        }
    }
}

?>