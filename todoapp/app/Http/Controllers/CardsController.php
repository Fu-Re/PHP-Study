<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;
use App\Card;
use Auth;
use Validator;


class CardsController extends Controller
{
    
    public function __construct(){
        $this -> middleware('auth');
    }
    //
    public function new($listing_id)
    {
        $listing = Listing::find($listing_id);
        return view('card/new',['listing' => $listing]);
        // テンプレート「card/new.blade.php」を表示します。
    }
    
    public function store(Request $request)
    {
        //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['card_name' => 'required|max:255', 'memo' => 'required|max:500',]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }

        // 入力に問題がなければCardモデルを介して、作ったユーザーidとタイトルをcardsテーブルに保存
        $cards = new Card;
        $cards->title = $request->card_name;
        $cards->memo = $request->memo;
        $cards->listing_id = $request->id;
        $cards->save();
        
        // 「/」 ルートにリダイレクト
        return redirect('/');
    }
    
    public function show($listing_id, $card_id)
    {
         $listing = Listing::find($listing_id);
         $card = Card::find($card_id);
         return view('card/show', with(['listing'=>$listing, 'card'=>$card]));
    }
    
    public function edit($listing_id, $card_id){
        $listing = Listing::find($listing_id);
        $listings = Listing::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        $card = Card::find($card_id);
        return view('card/edit', with(['listing'=>$listing, 'card'=>$card, 'listings' => $listings]));
    }
    
    public function update(Request $request){
                //Validatorを使って入力された値のチェック(バリデーション)処理　（今回は255以上と空欄の場合エラーになります）
        $validator = Validator::make($request->all() , ['card_name' => 'required|max:255', 'memo' => 'required|max:500']);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
            // 上記では、入力画面に戻りエラーメッセージと、入力した内容をフォーム表示させる処理を記述しています
        }
        $card = Card::find($request->card_id);
        $card->title = $request->card_name;
        $card->memo = $request->memo;
        $card->listing_id = $request->listing_name_id;
        $card->save();
        
        return redirect('/');
    }
    
    public function destroy($card_id){
        Card::destroy($card_id);
        return redirect('/');
    }
}