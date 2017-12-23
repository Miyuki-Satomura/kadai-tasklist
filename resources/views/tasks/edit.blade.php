@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<!--
        <h1>id: {{ $task->id }} のタスク編集ページ</h1>
        
        {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
        
           {!! Form::label('title', 'タイトル:') !!}
           {!! Form::text('title') !!}
        
           {!! Form::label('status', 'ステータス:') !!}
           {!! Form::text('status') !!}
           
           {!! Form::submit('更新') !!}
           
        {!! Form::close() !!}
-->


        <!-- 上記のままでは、入力テキストの入力欄が横長すぎます。グリッドシステムで、横長のテキスト入力欄を横半分にしましょう。
        row と col-xs-6 のdiv要素を囲んでください。col-xs-6 の6= 6/12 なので横半分になります。-->
        <div class="row">
        　　<div class="col-xs-12, col-sm-offset-2 col-sm-8, col-md-offset-2 col-md-8,col-lg-offset-3 col-lg-6">
        　　　　<h1>id: {{ $task->id }} のタスク編集ページ</h1>
        　　　　
        　　　　　　　　{!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
                　　　  　<div class="form-group">
                   　　　　 {!! Form::label('title', 'タイトル:') !!}
                   　　　　 {!! Form::text('title', null, ['class' => 'form-control']) !!}
               　　　　　　 </div>
        
                       <div class="form-group">
                           {!! Form::label('status', 'ステータス:') !!}
                           {!! Form::text('status', null, ['class' => 'form-control']) !!}
                       </div>
        
                       {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
        
                    {!! Form::close() !!}
            </div>
        </div>
        
@endsection
