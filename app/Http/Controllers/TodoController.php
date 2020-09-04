<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Auth;  

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $instanceClass)
    {
        $this->middleware('auth');
        $this->todo = $instanceClass;
        //dd($this->todo);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = $this->todo->getByUserId(Auth::id());  
        $todos = $this->todo->all(); 
        //dd(compact('todos'));
        return view('todo.index', compact('todos'));
        //return "Hello World!!";
        //return view('layouts.app');
        //return view('todo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $input = $request->all();
        $input['user_id'] = Auth::id(); 
        //dd($input);
        $this->todo->fill($input)->save();
        //dd($this->todo->fill($input)->save());
        return redirect()->to('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todo = $this->todo->find($id);
        //dd($this->todo->find($id));
        //dd(compact('todo'));
        return view('todo.edit', compact('todo'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        //dd($id);
        // $update = Todo::find($id);
        // $update->title = $request->title;
        // dd($update);
        // $update->save();
        
        $input = $request->all();
        //dd($request->all());
        //dd($this->todo->find($id)->fill($input));
        $this->todo->find($id)->fill($input)->save();
        return redirect()->to('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todo->find($id)->delete();
        return redirect()->to('todo.index');
    }
}
