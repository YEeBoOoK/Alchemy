<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\models\UserResponse;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\models\Level;


AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);

// $this->params['meta_description'] = 'Alchemy CSS — это веб-приложение, позволяющее в игровой форме изучить CSS Grid'; // Описание
// $this->params['meta_keywords'] = 'CSS Grid, веб-приложение, grid-row, grid-column, z-index'; // Ключевые слова


$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => '/web/icon.svg']);
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
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(93671346, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/93671346" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body class="d-flex flex-column h-100">

<!-- ЗАГРУЗКА СТРАНИЦЫ -->
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>

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
    // $level = Level::findOne($id_level);
    // $level = $dataProvider->getModels();
    // $id_level = 1;
    // $id_level = Yii::$app->request->get('id_level');

    // $level = Level::find()->where(['user_id' => $user_id], )

    
    if (Yii::$app->user->isGuest){
        $items[] = ['label' => 'Справочник', 'url' => ['/site/directory']];
        $items[] = ['label' => 'Регистрация', 'url' => ['/user/create']];
        $items[] = ['label' => 'Авторизация', 'url' => ['/site/login']];

    } else {
        $user_id = Yii::$app->user->identity->id_user;

        $userResponse = UserResponse::find()
            ->where(['user_id' => $user_id, 'is_correct' => 1])
            ->orderBy(['level_id' => SORT_DESC])
            ->one();

        $totalLevel = Level::find()
            ->where(['id_level' => Level::find()->select('id_level')])
            ->orderBy(['id_level' => SORT_DESC])
            ->one();

        if(Yii::$app->user->identity->admin==1){
            $items[] = ['label' => 'Административная панель', 'url' => ['/admin/index']];
            $items[] = ['label' => 'Профиль', 'url' => ['/user/profile']];
            $items[] = ['label' => 'Справочник', 'url' => ['/site/directory']];
            if ((($userResponse !== null) && ($nextLevel = $userResponse->level_id + 1) <= $totalLevel->id_level)) {
                $items[] = ['label' => 'Играть', 'url' => ['level/game', 'id_level' => $nextLevel]];
            } else if (($userResponse !== null) && ($nextLevel = $userResponse->level_id + 1) > $totalLevel->id_level) {
                $nextLevel = $totalLevel->id_level;
                $items[] = ['label' => 'Играть', 'url' => ['level/game', 'id_level' => $nextLevel]];
            } else {
                $nextLevel = 0;
                $items[] = ['label' => 'Играть', 'url' => ['level/game', 'id_level' => $nextLevel + 1]];
            }
            
        } else {
            $items[] = ['label' => 'Профиль', 'url' => ['/user/profile']];
            $items[] = ['label' => 'Справочник', 'url' => ['/site/directory']];
            if ((($userResponse !== null) && ($nextLevel = $userResponse->level_id + 1) <= $totalLevel->id_level)) {
                $items[] = ['label' => 'Играть', 'url' => ['level/game', 'id_level' => $nextLevel]];
            } else if (($userResponse !== null) && ($nextLevel = $userResponse->level_id + 1) > $totalLevel->id_level) {
                $nextLevel = $totalLevel->id_level;
                $items[] = ['label' => 'Играть', 'url' => ['level/game', 'id_level' => $nextLevel]];
            } else {
                $nextLevel = 0;
                $items[] = ['label' => 'Играть', 'url' => ['level/game', 'id_level' => $nextLevel + 1]];
            }
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



<footer id="footer" class="mt-auto py-3">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bskeyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-dark">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Информационное сообщение</h1>
                    <!-- <button type="button" class="btn-close" data-bsdismiss="modal" aria-label="Закрыть"></button> -->
                </div>
                <div class="modal-body text-dark" id="modalBody">
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn butt" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-muted">
            <div class="col text-center text-light">&copy; Alchemy CSS <?= date('Y') ?></div>
        </div>
    </div>
    
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
