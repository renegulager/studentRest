<?php
namespace Tests\App\Http\Controllers;
use TestCase;

class StudentControllerTest extends TestCase
{
  /** @test **/
  public function index_status_code_should_be_200()
  {
    $this->visit('/student')->seeStatusCode(200);
  }
}
