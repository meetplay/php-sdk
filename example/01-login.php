<?php

require_once __DIR__ . '/../autoload.php';

use Meetplay\Client as MeetplayClient;
use Meetplay\Exception\ApiException as MeetplayApiException;

$meetplay = new MeetplayClient(include __DIR__.'/config.php');

$session = $meetplay->getSession();
$user    = null;

if ($session) {
    $user = $meetplay->api('/me');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://coke.riaf.jp/bootstrap/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="http://coke.riaf.jp/bootstrap/docs/assets/css/docs.css" />
    <title>meetplay api example - 01-login</title>
</head>
<body>
<div class="container">

    <div class="page-header">
        <h1>meetplay api example <small>01-login</small></h1>
    </div>

<?php if ($session): ?>
    <p>Welcome, <strong><?php echo $user['name'] ?></strong>!</p>
<?php else: ?>
    <p><a href="<?php echo $meetplay->getLoginUrl() ?>" class="btn primary">Meetplay Login</a></p>
<?php endif ?>

</div>
</body>
</html>
