<?php
/**
(1) 勝敗（勝ち・負け・あいこ）は$resultに代入してください
(2) プレイヤーの手は$player_handに代入してください
(3) コンピューターの手は$pc_handに代入してください
**/
$hand = ["0", "2", "5"];
$result;
$player_hand = $_POST["playerHand"];

shuffle($hand);
$pc_hand = $hand[0];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>じゃんけん</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>結果は・・・</h1>
        <div class="result-box">
            <!-- じゃんけんの結果を表示しましょう -->
            <?php
            if($player_hand == 0){
                if($pc_hand == 0) {
                    $result = "あいこ！";
                }
                else if($pc_hand == 2) {
                    $result = "勝ち！";
                }
                else if($pc_hand == 5) {
                    $result = "負け！";
                }
            }
            
            else if($player_hand == 2){
                if($pc_hand == 0) {
                    $result = "負け！";
                }
                else if($pc_hand == 2) {
                    $result = "あいこ！";
                }
                else if($pc_hand == 5) {
                    $result = "勝ち！";
                }
            }
            
            else if($player_hand == 5){
                if($pc_hand == 0) {
                    $result = "勝ち！";
                }
                else if($pc_hand == 2) {
                    $result = "負け！";
                }
                else if($pc_hand == 5) {
                    $result = "あいこ！";
                }
            }
            echo "<p>$result</p>";
            ?>
            <p class="result-word"></p>
            <!-- プレイヤーの手を表示しましょう -->
            あなた： <?php
            switch($player_hand){
                case 0:
                    echo "ぐー";
                    break;
                case 2:
                    echo "ちょき";
                    break;
                case 5:
                    echo "ぱー";
                    break;
            }
            ?><br>
            <!-- コンピュータの手を表示しましょう -->
            コンピューター：<?php
            switch($pc_hand){
                case 0:
                    echo "ぐー";
                    break;
                case 2:
                    echo "ちょき";
                    break;
                case 5:
                    echo "ぱー";
                    break;
            }
            ?><br><br>

            <p><a class="red" href="index.php">>>もう一回勝負する</a></p>
        </div>
    </body>
</html>