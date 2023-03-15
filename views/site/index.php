<?php

/** @var yii\web\View $this */

$this->title = 'Alchemy CSS';

?>

<?php
echo "<div class='site-index'>
    <div class='jumbotron text-center mb-5 bg-transparent'>
        <h1 class='display-4'>Добро пожаловать!</h1>
        <p class='lead'>Надеюсь, успею дописать до мая</p>
    </div>

    <div class='body-content'>


        <div class='row'>
                <p>Сайт пока не готов, но тут должно быть что-то крутое.</p>
                <br>
            <div class='text'>
                <p>Алхимия CSS — это увлекательная игра, которая поможет вам освоить основы CSS, одного из самых популярных языков для создания веб-страниц.</p>
                <p>В этой игре вы будете создавать новые элементы на странице, применять к ним различные свойства CSS, и смотреть, как они меняются.</p>
                <p> Начните играть прямо сейчас! Каждый уровень в Алхимии CSS предоставляет вам новые вызовы и задачи, которые помогут вам улучшить ваши навыки CSS.</p>
                <p>Не бойтесь экспериментировать, ошибаться и учиться!</p>
            </div>
        </div>

        <div class='jumbotron mt-3 text-center bg-transparent'>";
        if (Yii::$app->user->isGuest) {
            echo "<div class='jumbotron mt-3 text-center bg-transparent'>
            <p><a class='btn reg btn-lg' href='user/create'>Зарегистрироваться и играть</a></p>
            </div>
            </div>
            </div>";
        } else {
            echo "<div class='jumbotron mt-3 text-center bg-transparent'>
            <p><a class='btn reg btn-lg' href='game/index'>Играть</a></p>
            </div>
            </div>
            </div>";
        }
        echo "</div>
    </div>
</div>";
?>