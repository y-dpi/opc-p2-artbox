<?php
require_once(__DIR__ . "/utils.php");                   // PHP utility functions.
require_once(__DIR__ . "/database.php");                // SQL database handles.

// Set a redirection target on error.
$redirection_target = "/submit.php";

// Validate form layout.
if (!isset($_POST)) redirect($redirection_target);
if (!isset($_POST["title"])) redirect($redirection_target);
if (!isset($_POST["artist"])) redirect($redirection_target);
if (!isset($_POST["image"])) redirect($redirection_target);
if (!isset($_POST["description"])) redirect($redirection_target);

// Read data from user form safely.
$artwork = [
    "title" => trim(htmlspecialchars($_POST["title"])),
    "artist" => trim(htmlspecialchars($_POST["artist"])),
    "image" => trim(htmlspecialchars($_POST["image"])),
    "description" => trim(htmlspecialchars($_POST["description"]))
];

// Validate form data.
if (strlen($artwork["title"]) <= 0) redirect($redirection_target);                      // Title field must not be empty.
if (strlen($artwork["artist"]) <= 0) redirect($redirection_target);                     // Artist field must not be empty.
if (strlen($artwork["description"]) < 3) redirect($redirection_target);                 // Description field must contain at least 3 characters.
if (strlen($artwork["image"]) <= 0) redirect($redirection_target);                      // Image URL field must not be empty.
if (!filter_var($artwork["image"], FILTER_VALIDATE_URL)) redirect($redirection_target); // Image URL field must be formatted properly (http, https, ftp, etc.).

// Add artwork to artwork database.
$artwork_db = new ArtworkDB();
$artwork_db->addArtwork($artwork);

?>