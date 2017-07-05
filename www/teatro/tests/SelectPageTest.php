<?php
require_once(dirname(__FILE__).'\..\simpletest\autorun.php');
require_once(dirname(__FILE__).'\..\simpletest\web_tester.php');

class SelectPageTest extends WebTestCase{
  function testClickUpdate(){
    $this->get('http://teatro.local/users/users/select');
    $this->click('Update');
    $this->assertText("Fecha");
  }
}

?>
