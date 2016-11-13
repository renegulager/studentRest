<?php
namespace App\Http\Controllers;

use App\Student;
/**
* Class StudentsController
* @package App\Http\Controllers
*/
class StudentsController
{
/**
  * GET /students
  * @return array
  */
  public function index()
  {
    return Student::all();
  }
}
