@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
      <h1>タスク新規作成ページ</h1>
      

      　
      　
      　 {!! Form::model($task,['route' => 'tasks.store']) !!}
  
           {!! Form::label('title', 'タイトル') !!}
           {!! Form::text('title') !!}
           
           {!! Form::label('content', 'タスク:') !!}
           {!! Form::text('content') !!}
           
           {!! Form::submit('投稿') !!}
           
      {!! Form::close() !!}
      
    

@endsection