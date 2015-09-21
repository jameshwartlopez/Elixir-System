<?php
// Ensure we have session
if(session_id() === ""){
    session_start();
}


define('ROOT', dirname(dirname(__FILE__)));
define('DS',DIRECTORY_SEPARATOR);


define('APP_PATH',ROOT.DS.'application'.DS);
define('CONTROLLERS_PATH', APP_PATH.'controller'.DS);
define('MODELS_PATH',APP_PATH.'model'.DS);
define('VIEWS_PATH',APP_PATH.'view'.DS);


define('PUBLIC_PATH', ROOT.DS.'public'.DS);
define('STYLES_PATH',PUBLIC_PATH.'css'.DS);
define('SCRIPTS_PATH',PUBLIC_PATH.'js'.DS);
define('FONTS_PATH',PUBLIC_PATH.'fonts'.DS);


define('CONFIG_PATH',ROOT.DS.'config'.DS);
define('LIB_PATH',ROOT.DS.'library'.DS);


require_once(LIB_PATH.'Functions.php');

//load database related file
$database = array(CONFIG_PATH.'db_config.php',LIB_PATH.'DB.php');
foreach ($database as $file_path) {
	load_file($file_path);
}

//load routes file inside config folder
load_file(CONFIG_PATH.'routes.php');

//load base model
load_file(LIB_PATH.'Model.php');

//load base controller
load_file(LIB_PATH.'Controller.php');


//load all Models Created by the programmer
load_dir_files(MODELS_PATH);

//load all Controllers Created by the programmer
load_dir_files(CONTROLLERS_PATH);

//load public index.php file
load_file(ROOT.DS.'public'.DS.'index.php');

$_route = isset($_GET['_route']) ? preg_replace('/^_route=(.*)/','$1',$_SERVER['QUERY_STRING']) : '';

load_file(LIB_PATH.'Router.php');
	
new Router($_route);


