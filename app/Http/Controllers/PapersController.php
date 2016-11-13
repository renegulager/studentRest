<?php
namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;
/**
* Class PapersController
* @package App\Http\Controllers
*/
class PapersController
{
/**
  * GET /papers
  * @return array
  */
  public function index()
  {
    return Paper::all();
  }

  /**
* GET /papers/{id}
* @param integer $id
* @return mixed
*/
  public function show($id)
  {
      try {
        return Paper::findOrFail($id);
      } catch (ModelNotFoundException $e) {

        return response()->json([
          'error' => [
            'message' => 'Paper not found'
          ]
          ], 404);
        }
  }

  /**
  * POST /papers
  * @param Request $request
  * @return \Symfony\Component\HttpFoundation\Response
  */
  public function store(Request $request)
  {
    $paper = Paper::create($request->all());
    return response()->json(['created' => true], 201);
  }
  /**
  * PUT /papers/{id}
  *
  * @param Request $request
  * @param $id
  * @return mixed
  */
  public function update(Request $request, $id)
  {
    $paper = Paper::findOrFail($id);
    $paper->fill($request->all());
    $paper->save();
    return $paper;
  }
  /**
  * DELETE /papers/{id}
  * @param $id
  * @return \Illuminate\Http\JsonResponse
  */
  public function destroy($id)
  {
    $paper = Paper::findOrFail($id);
    $paper->delete();
    return response(null, 204);
  }

  /**
* GET /papers/{id}
* @param integer $id
* @return mixed
*/
  public function list($id)
  {
      try {
      //  $paper = DB::table('papers')->where('student_id', $id)->f();

        return Paper::where('student_id', $id)->get();


      } catch (ModelNotFoundException $e) {

        return response()->json([
          'error' => [
            'message' => 'Paper(s) for user not found'
          ]
          ], 404);
        }
  }


}
