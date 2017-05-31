<?php
namespace Roles\Controller;

use Cervezza\DataManagement\Model\DataManagementCsv;
use Cervezza\Utils\Helpers\ViewHelpers;

class IndexController extends \Cervezza\Utils\Abstracts\Routeable
{
  public $layout = '';

  public function indexAction()
  {
    return array('datos', 'contenido');
  }

  public function selectAction($config)
  {
    $data=[];
    $data['users'] = DataManagementCsv::GetDatas($config['roles']['dataFilename']);
    $content = ViewHelpers::RenderView($this->router, $data);
    return array($data,$content);
  }

  public function insertAction($config)
  {
    $data=[];
    $data['form']="../modules/Roles/src/Roles/Model/Forms/roles.json";

    if($_POST)
    {
      DataManagementCsv::SetData($config['roles']['dataFilename'], $_POST);
      header("Location: /roles/index/select");
    }
    else
    {
      $content = ViewHelpers::RenderView($this->router,$data);
      return array($data,$content);
    }
  }

  public function updateAction($config)
  {
    if($_POST)
    {
        DataManagementCsv::UpdateData($config['roles']['dataFilename'], $_POST, $_POST['idrol']);
        header("Location: /roles/index/select");
    }
    else
    {
      $user = DataManagementCsv::GetData($config['roles']['dataFilename'], $this->router['params']['idrol']);


      $user['rolname']=$user[0];
      $user['idrol']=$this->router['params']['idrol'];
      $user['enviar']=$user[2];


      $data=[];
      $data['user']=$user;
      $data['form']="../modules/Roles/src/Roles/Model/Forms/roles.json";
      $content = ViewHelpers::RenderView($this->router, $data);
      return array($data,$content);
    }
  }

  public function deleteAction($config)
  {
    $form = "../modules/Roles/src/Roles/Model/Forms/delete.json";
    if($_POST)
    {
        if($_POST['enviar']=='Si')
        {
          DataManagementCsv::DeleteData($config['roles']['dataFilename'],$_POST['idrol']);
          header("Location: /roles/index/select");
        }
        else
          header("Location: /roles/index/select");
    }
    else
    {
      $data=[];
      $data['users']=  DataManagementCsv::GetData($config['roles']['dataFilename'], $this->router['params']['idrol']);
      $data['form']=$form;
      $data['params']=$this->router['params'];
      $content = ViewHelpers::RenderView($this->router, $data);
      return array($data,$content);
    }
  }
}
