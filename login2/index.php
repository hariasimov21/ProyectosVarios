<?php
/**
 * Build a simple HTML page with multiple providers.
 */

include 'vendor/autoload.php';
include 'config.php';

use Hybridauth\Hybridauth;

$hybridauth = new Hybridauth($config);
$adapters = $hybridauth->getConnectedAdapters();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/stile.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/bootstrap-social.css">
  <script src="assets/js/jquery.js"></script>

  <link rel="stylesheet" href="assets/js/ani.js">
  <title>Inicio de sesion </title>

</head>

<body>

<h1>Sign in</h1>

<ul>
    <?php foreach ($hybridauth->getProviders() as $name) : ?>
        <?php if (!isset($adapters[$name])) : ?>
            <li>
                <a href="<?php print $config['callback'] . "?provider={$name}"; ?>">
                    Inicia Sesion con <strong><?php print $name; ?></strong>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>

<?php if ($adapters) : ?>
    <h1>You are logged in:</h1>
    <ul>
        <?php foreach ($adapters as $name => $adapter) : ?>
            <li>
                <strong><?php print $adapter->getUserProfile()->displayName; ?></strong> from
                <i><?php print $name; ?></i>
                <span>(<a href="<?php print $config['callback'] . "?logout={$name}"; ?>">Log Out</a>)</span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


</body>

</html>