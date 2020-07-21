<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\step;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //Some routes can be protected by using middleware.
    //For instance, we use authenticate(auth) middleware to allow only users that are logged in to access the todo model.
//    Public function __constructor()
//    {
//        $this->middleware('auth');
//    }


    public function index()
    {
//        $todos = Todo::orderBy('completed')->get();
        //instead of orderBy we can use sortBy.....orderBy is for SQL(todos()) and sortBy is for collections(todos)
        //we are getting todos as collection and we are converting it to sql todos().
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todos/index', compact('todos'));    //can access this object inside the index view.

//        return view('todos/index',['todos'=> $todos]);
//        return view('todos/index')->with(['todos'=> $todos]);
    }

    public function create()
    {
        return view('todos/create');
    }

    public function show(Todo $todo)
    {

        return view('todos/show')->with(['todo' => $todo]);
    }

    public function store(TodoCreateRequest $request)
    {
//        if(!$request->title){
//            return redirect()->back()->with('error','please provide a title')
//        }  //one way of validation
//        $request->validate([
//            'title' => 'required|max:255',
//        ]);//second way
//        validate function will check for all the validations first and then only proceed further..
//other wise it will return back with errors which is handled in alert.blade.php file
        //create will create a new row
//        dd(auth()->user()->todos);
        //Todo::create($request->all());
//        //this will create todo of the authorized user.
//        and will follow one to many relationship refer User.php
         $todo = auth()->user()->todos()->create($request->all());
         if($request->step)
         {
             foreach($request->step as $step)
             {
                 $todo->steps()->create(['name'=>$step]);
             }
         }

        return redirect(route('todo.index'))->with('message', 'Todo added Successfully!!');
    }
    //this will be called when a particular todo
    //-item is selected for edition
    public function edit(Todo $todo)
    {
        return view('todos/edit', compact('todo'));
    }

    //this view is called from edit view and this will update the title with the current value passed in request.
    public function update(TodoCreateRequest $request, Todo $todo)
    {
//        Todo::where('id',$todo->id)->update(['title'=>$request->title]);
        $todo->update(['title' => $request->title]);
        if($request->stepName){
            foreach ($request->stepName as $key => $value){
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name'=> $value]);
                }
                else{
                    $step = step::find($id);
                    $step->update(['name'=> $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', ' Todo updated successfully!!');  //if we want to go to some other route.
        //return redirect()->back()->with('message','Done');   //IF WE WANT to go back to the same page
    }

    //this will check the task as completed
    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task marked as completed!');
    }

    //this will uncheck the completed task
    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task marked as Incompleted!');
    }

    //{{---this will grab the id of the selected route and delete it from db----------}}
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Task Removed');
    }
}
