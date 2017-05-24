<?php
namespace Users\Controller\UsersController;

class UsersController
{
  public $layout = "../modules/Users/src/views/layouts/layout.phtml";

  public function selectAction($config)
  {

    require('../vendor/cervezza/Utils/src/Utils/dibujaTabla.php');
    require('../vendor/cervezza/FormGenerator/src/FormGenerator/Model/formGenerator.php');

    require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/GetDatas.php');
    require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/GetData.php');
    require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/DeleteData.php');
    require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/SetData.php');
    require('../vendor/cervezza/DataManagement/src/DataManagement/Model/Csv/UpdateData.php');



    $users = GetDatas($config['users']['usersFilename']);
    ob_start();
      include_once("../modules/Users/src/views/Users/select.phtml");
      $content = ob_get_contents();
    ob_end_clean();

    return $content;
  }

  public function insertAction()
  {
    echo "insert";
  }

  public function updateAction()
  {
    echo "upodate";
  }

  public function deleteAction()
  {
    echo "delete";
  }

}
