<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!-- Все что находится за пределами, не воспринимается браузером как HTML-код и не обрабатывается -->
<!DOCTYPE html>
<!-- Атрибут lang указывает на каком языке написан текст страницы -->
<html lang="<?= Yii::$app->language ?>" class="h-100">
<!-- Предназначен для хранения заголовка, описания, кодировки и т. д. Не отображается в окне браузера, содержит данные, указывающие браузеру как следует обрабатывать страницу -->
<head>
    <!-- Заголовок, отображающийся на вкладке -->
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="/web/icon.svg">      
    <?php $this->head() ?>

    <!-- Подключение CSS -->
    <link rel='stylesheet' type='text/css' href='css/site.css' />
    <!-- Подключение модуля animate -->
    <link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'/>
    <!-- Подключение иконки на вкладку -->
    <link rel='icon' 
    href='web/img/ico/favicon.ico'/>
    <!-- Подключение jquery -->
    <script type='text/javascript' src='https://code.jquery.com/jquery-latest.min.js'></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
    <script src="../../js/script.js"></script> -->
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<!-- Менюшка -->
<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark navbar fixed-top']
    ]);
    
    $items = [];

    if (Yii::$app->user->isGuest){
        $items[] = ['label' => 'Регистрация', 'url' => ['/user/create']];
        $items[] = ['label' => 'Авторизация', 'url' => ['/site/login']];

    } else{
        if(Yii::$app->user->identity->admin==1){
            $items[] = ['label' => 'Административная панель', 'url' => ['/admin']];
        } else {
            $items[] = ['label' => 'Играть', 'url' => ['game/index']];
            $items[] = ['label' => 'Личный кабинет', 'url' => ['/profile']];
        }
        $items[] = '<li class="nav-item">'
            . Html::beginForm(['/site/logout'])
            . Html::submitButton(
                'Выйти (' . Yii::$app->user->identity->username . ')',
                ['class' => 'nav-link btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items,
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<div class="music-container">
    <!-- Музыка -->
    <audio id="audio" src="/web/music.mp3" loop autoplay volume="0.25">
        Тег audio не поддерживается вашим браузером. Необходимо обновить браузер!
    </audio>
    <!-- Кнопки -->
    <button id="play">
        <div id="sound">
            <img src="/web/img/sound.png" alt="Разрешить фоновую музыку" title="Разрешить воспроизведение фоновой музыки" class="icon">
        </div>
    </button>
    <!-- Громкость -->
    <input title="Передвиньте ползунок для корректировки громкости" type="range" min="0" max="100" value="25" class="volume-slider">
</div>   

<footer id="footer" class="mt-auto py-3">
    <div class="container">
        <div class="row text-muted">
            <div class="col text-center text-light">&copy; Alchemy CSS <?= date('Y') ?></div>
        </div>
    </div>

    <script>
        let audio = document.querySelector('audio');
        let volumeSlider = document.querySelector('.volume-slider');

        volumeSlider.addEventListener('input', () => {
            const volume = volumeSlider.value / 100; // 0.5 => 50%
            audio.volume = volume;
        });
        
        audio.addEventListener('play', () => {
            audio.volume = volumeSlider.value / 100;
            volumeSlider.value = audio.volume * 100;
        });

        // Устанавливаем начальную громкость
        audio.volume = volumeSlider.value / 100;

        // Реализовываем остановку музыки
        let playBtn = document.getElementById('play');

        playBtn.addEventListener("click", () => {
            if (audio.paused) {
                audio.play();
                playBtn.textContent = "Остановить";
                // playBtn.style.backgroundImage = "url('/web/img/play.png')"
                playBtn.innerHTML = "<img src='/web/img/pause.png'>";
            } else {
                audio.pause();
                playBtn.textContent = "Воспроизвести";
                playBtn.innerHTML = "<img src='/web/img/play.png'>";
            }
        });

        audio.onloadedmetadata = function() { 
        audio.currentTime = time; 
        };

    </script>

</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
