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
            exit("Failed to access SQL database, error : {$e->getMessage()}");
        }
        
    }

    // Fetch artwork array from SQL database.
    public function getArtworks() : array {
        try {

            // Read artworks from database.
            $dbArtworks = $this->dbHandle->prepare("SELECT * FROM artworks");
            $dbArtworks->execute();
            $artworks = $dbArtworks->fetchAll(PDO::FETCH_ASSOC);
            return $artworks;

        } catch (Exception $e) {

            // Display error on the page.
            exit("Failed to read from SQL database, error : {$e->getMessage()}");
        }
    }

    // Fetch artwork from SQL database by ID.
    public function getArtworkByID(int|string $id) : ?array {
        try {

            // Read artwork from database.
            $dbArtworks = $this->dbHandle->prepare("SELECT * FROM artworks WHERE id = :id LIMIT 1");
            $dbArtworks->execute([ "id" => $id ]);
            $artworks = $dbArtworks->fetchAll(PDO::FETCH_ASSOC);
            return $artworks[0] ?? NULL;

        } catch (Exception $e) {

            // Display error on the page.
            exit("Failed to read from SQL database, error : {$e->getMessage()}");
        }
    }

    // Add artwork to SQL database.
    public function addArtwork(array $artwork) : int {
        try {

            // TODO: Write artwork to database.
            echo "<pre>";
            print_r($artwork);
            echo "</pre>";

            // Return 0 on success.
            return 0;

        } catch (Exception $e) {

            // Display error on the page.
            exit("Failed to write to SQL database, error : {$e->getMessage()}");
        }
    }
}

?>