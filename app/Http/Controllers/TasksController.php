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
     * @return \Illuminate\Http\Response
     */
     // getでtasks/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //追加
        
        $tasks = Task::all();
        
        return view('tasks.index',[
            'tasks' => $tasks,
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      // getでtasks/createにアクセスされた場合の「新規登録画面表示処理」
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      // postでtasks/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        //追加
        $this->validate($request, [
            'title' => 'required|max:10', //空のメッセージ禁止。文字数255まで制限。
            'content' => 'required|max:10',
        ]);
        
        $task = new task;
        $task->title = $request->title;    //追加
        $task ->content = $request->content;
        $task ->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      // getでtasks/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        //追加
        $task = Task::find($id);
        
        return view('tasks.show',[
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      // getでtasks/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        //追加
        $task = Task::find($id);
        
        return view('tasks.edit', [
            'task' => $task,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      // getでtasks/id/にアクセスされた場合の「更新処理
    public function update(Request $request, $id)
    {
        //追加
        
        $this->validate($request, [
            'title' => 'required|max:10', //追加
            'content' => 'required|max:10',
            ]);
        
        $task = Task::find($id);
        $task ->title = $request->title; //追加
        $task ->content = $request->content;
        $task ->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      // deleteでtasks/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //追加
        $task = Task::find($id);
        $task ->delete();
        
        return redirect('/');
    }
}
