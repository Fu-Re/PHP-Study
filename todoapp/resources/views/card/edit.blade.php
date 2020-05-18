@extends('layouts.app')
@section('content')
<div class="panel-body">
<!-- バリデーションエラーの場合に表示 --> 
@include('common.errors')

  <!-- カード作成フォーム -->
  <form action="{{ url('/card/edit')}}" method="POST" class="form-horizontal">
  {{csrf_field()}} 
  <div class="container">
    <div class="form-group"> 
    
      <label for="card" class="col-sm-3 control-label">タイトル</label> 
      <div class="col-sm-12"></div>
      <div class="col-sm-offset-2 col-sm-8"> 
        <input type="text" name="card_name" class="form-control" value="{{$card->title}}">
      </div>
      
      <div class="col-sm-12"><p></p></div>
      
      <label for="card" class="col-sm-3 control-label memo">メモ　　</label> 
      <div class="col-sm-12"></div>
      <div class="col-sm-offset-2 col-sm-8"> 
        <textarea name="memo" class="form-control">{{$card->memo}}</textarea>
      </div>
      
      <div class="col-sm-12"><p></p></div>
      
      <label for="card" class="col-sm-3 control-label listing-name">リスト名</label> 
      <div class="col-sm-12"></div>
      <div class="col-sm-offset-2 col-sm-8"> 
        <select name="listing_name_id" class="form-control custom-select">
          <option selected = "{{$listing->id}}">{{$listing->title}}</option>
            @foreach ($listings as $listing)
                <option value = "{{$listing->id}}">{{$listing->title}}</option>
            @endforeach
        </select>
      </div>
      <!--<input type="hidden" name="listing_id" value="{{ old('id', $listing->id) }}">-->
      <input type="hidden" name="card_id" value="{{ old('id', $card->id) }}">
    </div>
  </div>
    
    <div class="form-group text-center"> 
      <div class="col-sm-offset-3 col-sm-6"> 
        <button type="submit" class="button update">
        更新する </button> 
      </div>
    </div>
  </form>
</div> 
@endsection