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

  public function index_should_return_a_collection_of_records()
  {
    $this
        ->get('/student')
        ->seeJson([
          'name' => 'Jack øæålmedû'
        ])
        ->seeJson([
          'phonenumber' => '+452255-5548'
        ])
        ->seeJson([
          'email' => 'strange.but.valid@hotmail.com'
        ]);
  }
}
