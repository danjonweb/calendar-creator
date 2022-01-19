<?php
require('vendor/autoload.php');
require('config.php');

require('classes/Router.php');
require('classes/Database.php');
require('classes/AbstractController.php');
require('classes/AbstractModel.php');
require('classes/Day.php');
require('classes/Event.php');

require('controllers/App.php');
require('controllers/Ajax.php');

require('models/App.php');

$router = new Router($_GET);

$controller = $router->getController();

if ($controller) {
  $controller->executeAction();
}

?>