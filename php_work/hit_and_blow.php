<?php

$clear = false;
$ans_ary = [];

$number = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
shuffle($number);

$cor_num = [(string)$number[0], (string)$number[1], (string)$number[2]]; //正解

for($i = 1; $clear === false; $i++){
    echo $i."回目のチャレンジ！\n";
    echo "3桁の半角数字を重複なしで入力してください：";
    $ans = (string)(int)fgets(STDIN);
    
    if(strlen($ans) === 3){
        $ans_ary = [substr($ans, 0, 1), substr($ans, 1, 1), substr($ans, 2, 1)];
        $hit = 0; $blow = 0;
        
        if($ans_ary[0] !== $ans_ary[1] && $ans_ary[0] !== $ans_ary[2] && $ans_ary[1] !== $ans_ary[2]){
            for($j = 0; $j < 3; $j++){
                for($k = 0; $k < 3; $k++){
                    if($ans_ary[$j] === $cor_num[$k]){
                        $blow++;
                        if($j === $k) {
                            $blow--;
                            $hit++;
                        }
                    }
                }
            }
            
            if($hit !== 3){
            echo "Hit:".$hit.", Blow:".$blow."です。";
            }
            else if($hit === 3){
                echo "正解です！".$i."回目でクリアです！\n";
                $clear = true;
            }
            
        }
        else{
            echo "エラー：3桁の半角数字を重複なしで入力してください！\n";
        }
    }
    
    else{
         echo "エラー：3桁の半角数字を重複なしで入力してください！\n";
    }
    
}

?>