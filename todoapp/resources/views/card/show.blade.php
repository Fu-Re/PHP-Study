@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- カード作成フォーム -->
  <!--<form action="{{ url('cards_edit')}}" method="POST" class="form-horizontal">-->
    <div class="container"> 
    <div class="row">
      <div class="col-sm-6 sec-title"> <h4>タイトル</h4></div>
        <div class="col-sm-12"> 
          <p class="content-main">{{$card->title}}</p>
        </div>
      
      <div class="col-sm-6 sec-title"> <h4>メモ</h4></div>
        <div class="col-sm-12"> 
          <p class="content-sub">{{$card->memo}}</p>
        </div>
      
      <div class="col-sm-6 sec-title"> <h4>リスト名</h4></div>
        <div class="col-sm-12"> 
          <p class="content-sub">{{$listing->title}}</p>
        </div>
        
      </div>
    </div>
    {{csrf_field()}} 
      <div class="text-center"> 
        <div class="col-sm-offset-3 col-sm-6"> 
          <a class="edit" href="/cardsedit/listing/{{$listing->id}}/card/{{$card->id}}">編集する </a> 
        </div>
        <div class="col-sm-offset-3 col-sm-6">
          <a class="delete" href="/cardsdelete/{{$card->id}}">削除する </a> 
        </div>
      </div>
  </div>
@endsection