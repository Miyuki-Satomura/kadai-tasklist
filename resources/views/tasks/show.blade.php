@extends('layouts.app')

@section('content')


<!-- Bootstrap 7.6.show 上記の<p>要素だったものを、テーブルにします。-->
      <h1>id = {{ $task->id }} のタスク詳細ページ</h1>
      <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タイトル</th>
            <td>{{ $task->title }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $task->status }}</td>
        </tr>
    </table>

      

      {!! link_to_route('tasks.edit', 'このタスク編集', ['id' => $task->id], ['class' => 'btn btn-default']) !!}
      
      {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
          {!! Form::submit('削除',['class' => 'btn btn-danger']) !!}
      {!! Form::close() !!}

@endsection
