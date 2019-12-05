<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use app\Todo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;



class TodoController extends Controller
{
  public $restful = true;
  public function postAdd(Request $req) {
    $todos = \App\Todo::all();

    $todo = new Todo();
    $todo->title = $req->input('title');
    $todo->save();      
    return $todo;

  }
  public function postUpdate($id) {
    $task = \App\Todo::find($id);
    $task->title = Input::get("title");
    $task->save();
    return "OK";
  }


  public function getIndex() {
  $todos = \App\Todo::all();

  return View::make("index")
    ->with("todos", $todos);
}

  public function editTask(Request $req){
      $id = $req->id;
      $task = \App\Todo::find($id);
      $task->title = $req->title;
      $task->save();

      return $task;
  }

  public function updateStatus(Request $req){
      $id = $req->id;
      $task = \App\Todo::find($id);
      $task->status = '1';
      $task->save();

      return $task;
  }

public function deleteTask(Request $req){
  $id = $req->id;
  \App\Todo::where('id','=',$id)->delete();
  return $id;
}


}


?>