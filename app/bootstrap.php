
<?php
//Config
require_once '../app/config/config.php';

//Load helpers
require_once 'helpers/redirect_helper.php';

//Autoload core libraries
spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});
