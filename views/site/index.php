<?php
use app\models\UserResponse;
use app\models\Level;

/** @var yii\web\View $this */

$this->title = 'Alchemy CSS — веб-приложение для изучения CSS Grid';

?>

<?php
echo "<div class='site-index'>
        <div class='jumbotron text-center bg-transparent'>
            <h1 class='display-4 mb-5'>Добро пожаловать!</h1>
        </div>

        <div class='body-content'>


            <div class='row'>
                <div class='text'>
                    <p>Алхимия CSS — это увлекательная игра, которая поможет вам освоить основы CSS grid.</p>
                    <p>В этой игре вы будете создавать новые элементы на странице, применять к ним различные свойства CSS grid, и смотреть, как они меняются.</p>
                    <p> Начните играть прямо сейчас! Каждый уровень в Алхимии CSS предоставляет вам новые вызовы и задачи, которые помогут вам улучшить ваши навыки.</p>
                    <p>Не бойтесь экспериментировать, ошибаться и учиться!</p>
                </div>
            </div>

        <div class='jumbotron mt-3 text-center bg-transparent'>";
        if (Yii::$app->user->isGuest) {
            echo "<div class='jumbotron mt-3 text-center bg-transparent'>
            <p><a class='reg' href='user/create'>Зарегистрироваться и играть</a></p>
            </div>
            </div>
            </div>";
        } else {
            echo "<div class='jumbotron mt-3 text-center bg-transparent'>";
                $user_id = Yii::$app->user->identity->id_user;

                $userResponse = UserResponse::find()
                    ->where(['user_id' => $user_id, 'is_correct' => 1])
                    ->orderBy(['level_id' => SORT_DESC])
                    ->one();


                $totalLevel = Level::find()
                    ->orderBy(['id_level' => SORT_DESC])
                    ->one();

                if ($userResponse !== null && $userResponse->level_id < $totalLevel->id_level) {
                    $levelId = Level::find()
                    ->select('id_level')
                    ->where(['>', 'id_level', $userResponse->level_id])
                    ->andWhere(['<=', 'id_level', $totalLevel->id_level])
                    ->orderBy(['id_level' => SORT_ASC])
                    ->limit(1)
                    ->scalar();
                } else if ($userResponse !== null && $userResponse->level_id = $totalLevel->id_level) {
                    $levelId = $totalLevel->id_level;
                }


                if (($userResponse !== null) && (($nextLevel = $levelId) <= $totalLevel->id_level)) {
                    echo '<p><a class="reg" href="game/'.$nextLevel.'"> Играть</a></p>';
                } else if (($userResponse !== null) && (($nextLevel = $levelId) > $totalLevel->id_level)) {
                    $nextLevel = $totalLevel->id_level;
                    echo '<p><a class="reg" href="game/'.$nextLevel.'">Играть</a></p>';
                } else {
                    $nextLevel = 1;
                    echo '<p><a class="reg" href="game/'.$nextLevel.'">Играть</a></p>';
                }
            // }
            echo "</div>
            </div>
            </div>";
        }
        echo "</div>";
?>