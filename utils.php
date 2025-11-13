<?php

// Cleanly redirect user to another page.
function redirect(string $url) : void {
    header("Location: " . $url);
    exit();
}

?>