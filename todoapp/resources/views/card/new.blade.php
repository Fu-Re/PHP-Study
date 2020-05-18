@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- カード作成フォーム -->
  <form action="{{ url('cards')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
  <div class ="container">
    <div class="form-group"> 
    
      <label for="card" class="col-sm-3 control-label">タイトル</label>
      <div class="col-sm-12"></div> 
      <div class="col-sm-offset-2 col-sm-8"> 
        <input type="text" name="card_name" class="form-control" placeholder="カード名" value="{{ old('card_name') }}">
      </div>
      
      <div class="col-sm-12"><p></p></div>
      
      <label for="card" class="col-sm-3 control-label memo">メモ　　</label> 
      <div class="col-sm-12"></div> 
      <div class="col-sm-offset-2 col-sm-8"> 
        <textarea name="memo" class="form-control" placeholder="詳細" value="{{ old('memo') }}"></textarea>
      </div>
      <input type="hidden" name="id" value="{{ old('id', $listing->id) }}">
    </div>
    
    <div class="form-group text-center"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="button">
        作成する </button> 
      </div>
    </div>
  </form>
</div> 
</div>
@endsection