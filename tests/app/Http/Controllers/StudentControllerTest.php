<?php
namespace Tests\App\Http\Controllers;
use TestCase;

class StudentControllerTest extends TestCase
{
  /** @test **/
  public function index_status_code_should_be_200()
  {
    $this->visit('/students')->seeStatusCode(200);
  }

  public function index_should_return_a_collection_of_records()
  {
    $this
        ->get('/students')
        ->seeJson([
          'phonenumber' => '+452255-5548'
        ])
        ->seeJson([
          'email' => 'strange.but.valid@hotmail.com'
        ]);
  }
  /** @test **/
  public function show_should_return_a_valid_student()
  {
    $this
    ->get('/students/1')
    ->seeStatusCode(200)
    ->seeJson([
        'id' => '1',
        'phonenumber' => '+452255-5548',
        'email' =>  'strange.but.valid@hotmail.com'
    ]);

    $data = json_decode($this->response->getContent(), true);
    $this->assertArrayHasKey('created_at', $data);
    $this->assertArrayHasKey('updated_at', $data);



  }
  /** @test **/
  public function show_should_fail_when_the_student_id_does_not_exist()
  {
    $this->markTestIncomplete('Pending test');

    $this
    ->get('/students/9999')
    ->seeStatusCode(404)
    ->seeJson([
      'error' => [
        'message' => 'Student not found'
      ]
    ]);
  }
  /** @test **/
  public function show_route_should_not_match_an_invalid_route()
  {
    $this->markTestIncomplete('Pending test');
  }

  /** @test **/
  public function store_should_save_new_student_in_the_database()
  {
    $this->post('/students', [
    'name' => 'Testname',
    'email' => 'dafa@da.dk',
    'phonenumber' => '2511668877'
    ]);
    $this
    ->seeJson(['created' => true])
    ->seeInDatabase('students', ['name' => 'Testname']);
  }
  /** @test */
  public function store_should_respond_with_a_201_and_location_header_when_successfull()
  {
    $this->markTestIncomplete('pending');
  }
  /** @test */
  public function update_should_only_change_fillable_fields()
  {
    $this->notSeeInDatabase('students', [
      'phonenumber' => '2511668877'
    ]);

    $this->put('/students/4', [
      'name'=>'Testname',
      'email'=>'dafa@da.dk',
      'phonenumber'=>'+452255-99999'
    ]);

    $this
      ->seeStatusCode(200)
      ->seeJson([
        'phonenumber' => '+452255-99999'
      ])
      ->seeInDatabase('students', [
        'phonenumber' => '+452255-99999'
    ]);
  }



}
