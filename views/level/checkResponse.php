<?php
use app\models\LevelAnswer;
use app\models\CorrectAnswer;
use app\models\UserResponse;
use app\models\Level;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;



/** @var yii\web\View $this */
/** @var app\models\LevelSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$user_id = Yii::$app->user->identity->id_user;
$level_id = 1;
$correct_answers = LevelAnswer::find()->where(['level_id' => $level_id])->all();

foreach ($correct_answers as $correct_answer) {
    $user_response = UserResponse::find()->where(['user_id' => $user_id])
    ->andWhere(['level_id' => $level_id]);
    if ($user_response->response == $correct_answer->answer) {
        echo '<script type="text/javascript">callMe()</script>';
        // ИЛИ
        echo '<script type="text/javascript">AddCoordinate('.$latitude.','.$longitude.')</script>';
    }
}

// В функции будет смена класса на аНиМаЦиЮ (гифку), 
// смена гифки на аНиМаЦиЮ (получившийся элемент), 
// вывод модального окна, что человек молодец 
// иии, возможно, в модальном окне будет кнопка "к следующему уровню", 
// при нажатии на которую, запускается функция, что получает айди текущего уровня и прибавляет единичку к url
?>