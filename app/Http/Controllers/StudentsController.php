<?php
namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
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

  /**
* GET /students/{id}
* @param integer $id
* @return mixed
*/
  public function show($id)
  {
      try {
        return Student::findOrFail($id);
      } catch (ModelNotFoundException $e) {

        return response()->json([
          'error' => [
            'message' => 'Student not found'
          ]
          ], 404);
        }
  }

  /**
  * POST /students
  * @param Request $request
  * @return \Symfony\Component\HttpFoundation\Response
  */
  public function store(Request $request)
  {
    $student = Student::create($request->all());
    return response()->json(['created' => true], 201);
  }
  /**
  * PUT /student/{id}
  *
  * @param Request $request
  * @param $id
  * @return mixed
  */
  public function update(Request $request, $id)
  {
    $student = Student::findOrFail($id);
    $student->fill($request->all());
    $student->save();
    return $student;
  }
  /**
  * DELETE /students/{id}
  * @param $id
  * @return \Illuminate\Http\JsonResponse
  */
  public function destroy($id)
  {
    $student = student::findOrFail($id);
    $student->delete();
    return response(null, 204);
  }



}
