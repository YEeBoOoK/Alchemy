<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
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
    $id_level = 1;
    // $id_level = Yii::$app->request->get('id_level');

    if (Yii::$app->user->isGuest){
        $items[] = ['label' => 'Справочник', 'url' => ['/site/directory']];
        $items[] = ['label' => 'Регистрация', 'url' => ['/user/create']];
        $items[] = ['label' => 'Авторизация', 'url' => ['/site/login']];

    } else{
        if(Yii::$app->user->identity->admin==1){
            $items[] = ['label' => 'Административная панель', 'url' => ['/admin']];
            $items[] = ['label' => 'Справочник', 'url' => ['/site/directory']];
            $items[] = ['label' => 'Играть', 'url' => ['level/game', 'id_level' => $id_level]];
        } else {
            $items[] = ['label' => 'Профиль', 'url' => ['/user/profile']];
            $items[] = ['label' => 'Справочник', 'url' => ['/site/directory']];
            $items[] = ['label' => 'Играть', 'url' => ['level/game', 'id_level' => $id_level]];
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
    <script src="/js/app.js"></script>

    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bskeyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-dark">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Информационное сообщение</h1>
                    <button type="button" class="btn-close" data-bsdismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body text-dark" id="modalBody">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn butt" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div> -->

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
