<?php
header('HTTP/1.1 403 Forbidden');

error_reporting(0);

$logFile = 'attacks.log';
$logData = sprintf(
    ">>>>>>>>>>> %s <<<<<<<<<<<\n".
    "REMOTE_ADDR: %s\n".
    "REQUEST_URI: %s\n".
    "HTTP_USER_AGENT: %s\n".
    "HTTP_COOKIE: %s\n".
    "POST_DATA: %s\n\n",
    date("F j, Y g:i a"),
    $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN',
    htmlspecialchars($_SERVER['REQUEST_URI']) ?? 'UNKNOWN',
    $_SERVER['HTTP_USER_AGENT'] ?? 'UNKNOWN',
    $_SERVER['HTTP_COOKIE'] ?? 'NONE',
    http_build_query($_POST) ?? 'NONE'
);

@file_put_contents($logFile, $logData, FILE_APPEND);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>403 Forbidden</title>
</head>
<body>
    <h1>Forbidden</h1>
    <p>You don't have permission to access <?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?> on this server.</p>
</body>
</html>
