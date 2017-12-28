<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task; //追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * getでtasks/にアクセスされた場合の「一覧表示処理」
     * 
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //追加
    
        $tasks = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
//dd( $tasks);
            $data = [
                    'user' => $user,
                    'tasks' => $tasks,
            ];
            
        } else {
            return view('welcome', [
                    'tasks'=>$tasks,
            ]);
        }
        
            return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
            //追加
            $task = new Task;
        
            return view('tasks.create', [
                    'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * // postでtasks/にアクセスされた場合の「新規登録処理」
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 

        if (\Auth::check()) {
            //追加
            $this->user_id =\Auth::user()->user_id;
            
            //追加
            $this->validate($request, [
                    'status' => 'required|max:10', //空のメッセージ禁止。文字数255まで制限。
                    'title' => 'required|max:255',
            ]);
         
            $request->user()->tasks()->create([
                    'status' => $request->status,
                    'title' => $request->title,
            ]);
        
    }
        
            return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * getでtasks/idにアクセスされた場合の「取得表示処理」
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            //追加
            $tasks = [];
        if (\Auth::check()) {
            $task = Task::find($id);
        }
            return view('tasks.show', [
                    'task' => $task,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * getでtasks/id/editにアクセスされた場合の「更新画面表示処理」
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      
    public function edit($id)
    {
      
            $task = \Auth::user(); 
        
            $task = Task::find($id);
        
            return view('tasks.edit', [
                    'task' => $task,
            ]);
            
    }

    /**
     * Update the specified resource in storage.
     *
     * getでtasks/id/にアクセスされた場合の「更新処理」
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function update(Request $request, $id)
    {
        //追加
            $tasks = [];
        if (\Auth::check()) {
            $task = Task::find($id);
            $task ->status = $request->status; //追加
            $task ->title = $request->title;
            $task ->save();  
        }
        
            $this->validate($request, [
                        'status' => 'required|max:10', //追加
                        'title' => 'required|max:255',
            ]);

            return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * deleteでtasks/idにアクセスされた場合の「削除処理」
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
            $tasks = [];
        if (\Auth::check()) {
            $task = Task::find($id);
 //dd($task);
            $task->delete();    

        }
            return redirect('/');
    }
}
