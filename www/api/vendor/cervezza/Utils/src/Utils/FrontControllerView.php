<?php
namespace Cervezza\Utils;

use Cervezza\Utils\Interfaces\Routeable;

class FrontControllerView
{
  static public function Config()
  {
    $config = array();
    $directorio = '../settings';
    $ficheros1  = scandir($directorio);

    foreach ($ficheros1 as $value)
    {
      if(is_file($directorio."/".$value))
        $config = array_replace_recursive($config, include_once($directorio."/".$value));
    }

    return $config;
  }

  static public function Router($url='/')
  {
    // echo "<pre>";
    // print_r($url);
    // echo "</pre>";

    $route = array();
    $url = explode("/", $url);

    // echo "<pre>url: ";
    // print_r($url);
    // echo "</pre>";



    $route['module']='index';
    $route['controller']='index';
    $route['action']='index';

    $error = 0;
    //
    // echo "<pre>";
    // print_r($route);
    // echo "</pre>";


    if(is_dir("../modules/".ucfirst($url[1])))
    {
      $route['module']=$url[1];
    }
    else
    {
      $error = 1;
    }

    $controllerDir = "../modules/".ucfirst($url[1])."/src/".
                                   ucfirst($url[1])."/Controller/".
                                   @ucfirst($url[2])."Controller.php";

    // echo is_file($controllerDir);

    // if ( $error!=1 && isset($url[2]) && in_array($url[2], array_keys($controllers)))
    if ( $error!=1 && isset($url[2]) && is_file($controllerDir))
    {
      $route['controller']=$url[2];
    }
    elseif(@$url[2]!='')
    {
      $error=1;
    }

    // echo "<pre>sroute:";
    // print_r($route);
    // echo "</pre>";

    $actions = get_class_methods("Users\Controller\UsersController");



    // echo "<pre>actions:";
    // print_r($actions);
    // echo "</pre>";

    foreach ($actions as $key=>$action)
    {
      $pos = strpos($action, 'Action');
      if($pos===FALSE)
        unset($actions[$key]);
    }
    // echo "<pre>actions:";
    // print_r($actions);
    // echo "</pre>";

    // TODO: resolver cuando tengas mas tecnologia disponible
    $controllers = array('web'=>array('home'),
                         'login'=>array('login'),
                         'error'=>array('_404'),
                         'users'=>array('insert','update','delete','select'),
                         'index'=>array('index','update','delete','select'),
    );

    //if(@$url[2]!='' && $error!=1 && isset($url[3]) && in_array($url[3], $controllers[$url[2]]))

    if(@$url[2]!='' && $error!=1 && isset($url[3]) &&
        in_array($route['action']."Action", $actions))

    {
      $route['controller']=$url[2];
      $route['action']=$url[3]."Action";
    }
    elseif(!isset($url[3]))
    {
      $route['controller']=@$url[2];
      $route['action']='';
    }
    else
    {
      $error=1;
    }

    if($error!=1 && (sizeof($url)%2)==0 && $url[sizeof($url)-1]!='')
    {
      $route['controller']=$url[2];
      $route['action']=$url[3]."Action";
      for($i=4;$i<sizeof($url);$i+=2)
        $route['params'][$url[$i]]=$url[$i+1];
    }
    elseif(isset($url[3]))
    {
      $error=1;
    }

    if($error==1)
    {
      $route['module']='error';
      $route['controller']='error';
      $route['action']='_404Action';
      $route['params']=array();
    }

    if ($url[0]=='' && $url[1]=='')
    {
      $route['module']='index';
      $route['controller']='index';
      $route['action']='index';
    }

    // echo "<pre>";
    // print_r($route);
    // echo "</pre>";

    return $route;
  }

  static public function Dispatch($route, $config)
  {
    // echo "<pre>";
    // print_r($route);
    // echo "</pre>";
    $includeController = '../modules/'.ucfirst($route['module']).
                 '/src/'.ucfirst($route['module']).
                 '/Controller/'.
                 ucfirst($route['controller']).'Controller.php';
    // echo $includeController;

    include_once($includeController);

    $controllerName = ucfirst($route['controller'])."\\Controller\\".
                      ucfirst($route['controller'])."Controller";
    $actionName = $route['action'];

    // echo "controllerName: ". $controllerName;
    // echo $actionName;

    $controller = new $controllerName($route);

    if($controller instanceof Routeable)
      $controller->setRouter($route);

    $view = $controller->$actionName($config);
    $layout = $controller->layout;

    return array('layout'=>$layout,'view'=>$view[1],'data'=>$view[0]);
  }

  static public function TwoSteps($layout, $content, $config)
  {
    if ($layout =='')
    {

      if (isset($config['config']['layout']) && $config['config']['layout']!='')
      {
        $layout = $config['config']['layout'];
      }
      else
        die("ERROR 500: layout not defined");


      // $route['accion']='_500';
      // $route['controller']='Error';
      // $route['module']='error';
    }
    ob_start();
      include $layout;
      $var = ob_get_contents();
    ob_end_clean();

    return $var;
  }

  static public function Render($context, $data)
  {
      switch($context)
      {
        case 'json':
          header("Content-Type: application/json");
          echo json_encode($data['data']);
        break;
        case 'xml':
        break;
        default:
        case 'html':
          echo $data['content'];
        break;
      }
  }


}
