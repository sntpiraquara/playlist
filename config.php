<?php
session_start();

require_once "vendor/autoload.php";
// Helpers
require_once "util.php";

dotenv();

require_once "models/Usuario.php";
require_once "models/Musica.php";
require_once "models/Playlist.php";

// Env config/vars
$CONFIG = require_once "config/environment.php";
global $CONFIG;

if ($CONFIG['env'] === "dev") {
    error_reporting(E_ALL);
    ini_set("display_errors", true);
    ini_set("log_errors", true);
} else {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
    ini_set("display_errors", false);
    ini_set("display_startup_errors", false);
    ini_set("log_errors", true);
}

// Helpers
require_once "util.php";

// Database stuff
require_once "config/db.php";
