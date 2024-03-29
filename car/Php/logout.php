<?php
// Start the session
session_start();

// Unset specific session variables
unset($_SESSION['unique_id']);
unset($_SESSION['id']);

// Destroy the session
session_destroy();
?>