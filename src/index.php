<?php

require './vendor/autoload.php';

use Fleet\AclClient;

$client = AclClient::factory();

?>

<html>
    <head>
        <style>
            body {
                font-size: 1.3em;
                font-family: helvetica, arial;
                font-weight: bold;
            }
            code {
                font-size: 1.3em;
                background: #eee;
            }
        </style>
    </head>
    <body>
        <?php $client->getServer()->report(); ?>
    </body>
</html>
