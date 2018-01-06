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
 // ↓変更
           
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
            $tasks = [];
            if (\Auth::check()) {
                //追加
                $task = new Task;
            }
            return view('tasks.create', [
                    'task'=>$task,
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
        /*
        $this->validate($request, [
                'status' => 'required|max:10', //空のメッセージ禁止。文字数255まで制限。
                'title' => 'required|max:255',
        ]);
         */  
        if (\Auth::check()) {
            //追加
            $request->user()->tasks()->create([
                'status' => $request->status,
                'title' => $request->title,
            ]);
            return redirect('/');
        }
    }    
// 削除      $this->user_id =\Auth::user()->user_id;
 //           Auth::user()->id == $task->user_id;
//            return view('tasks.store', [
//                    'tasks'=>$tasks,

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
        $task = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = Task::find($id);
            if(\Auth::user()->id == $task->user_id) {
                return view('tasks.show', [
                    'task'=>$task,
                ]);
            } else {
                 return redirect('/');
            }
        }
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
        $task = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = Task::find($id);
            if(\Auth::user()->id == $task->user_id) {
                return view('tasks.edit', [
                    'task'=>$task,
                ]);
            } else {
                 return redirect('/');
            }
        }
        

/*             $task = [];
  //         \Auth::check()) {
        if (\Auth::check()) {
             Auth::user()->id == $task->user_id;
            
            //else {
                return view('tasks.edit', [
                    'task' => $task,
                ]);
            }
*/
    }
    
  //2018.1.05 追加
  //      if (\Auth::check()) {
           
   //           if(Auth::user()->id == $task->user_id); 
  //2018.1.05            
// 修正     $task = \Auth::user(); 
  //       $task = Task::find($id);
  // 修正ここまで   


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
        $tasks = [];
        $this->validate($request, [
            'status' => 'required|max:10', //追加
            'title' => 'required|max:255',
        ]);
  // 2018.1.05 追加 
        if (\Auth::check()) {
            $task = Task::find($id);
            
            if(\Auth::user()->id == $task->user_id) {
                $task->update([
                    'title' => $request->title,
                    'status' => $request->status,
                ]); 
            } 
            return redirect('/');
        }
    }
/*
  // 修正   $task = Task::find($id);
            \Auth::user()->id == $task->user_id; 
            
            $task ->status = $request->status; //追加
            $task ->title = $request->title;
            $task ->save();  
        }
 // 2018.1.05  追加       
        else {
 //               return view('tasks.update', [
 //                   'task' => $task,
 //                ]);
 // 追加ここまで
        }
            return redirect('/');
 //       }
    }
    */
    
    
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
        $task = [];
        if (\Auth::check()) {
            $task = Task::find($id);
            if(\Auth::user()->id == $task->user_id) {
                $task->delete();    
            }
        }
        return redirect('/');
    }
}        
