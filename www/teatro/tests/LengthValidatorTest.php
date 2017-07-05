<?php
require_once(dirname(__FILE__).'\..\simpletest\autorun.php');

include("../vendor/cervezza/src/Utils/Validators/LengthValidator.php");

class LenghtValidatorTest extends UnitTestCase{

  function testCheckLenght(){
    $this->assertTrue(
      (new \Cervezza\Utils\Validators\LengthValidator("sergi",10))->check()
    );
    $this->assertFalse(
      (new \Cervezza\Utils\Validators\LengthValidator("sergisergisergi",10))->check()
    );
    $this->assertTrue(
      (new \Cervezza\Utils\Validators\LengthValidator("0123456789",10))->check()
    );
    $this->assertFalse(
      (new \Cervezza\Utils\Validators\LengthValidator("01234567890",10))->check()
    );
    $this->assertTrue(
      (new \Cervezza\Utils\Validators\LengthValidator("",10))->check()
    );
  }

}


 ?>
