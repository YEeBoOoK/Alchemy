<?php
/** @var yii\web\View $this */

$this->title = 'Alchemy CSS — Административная панель';
// $this->params['breadcrumbs'][] = 'Административная панель';
?>
<h1 class="mb-3">Административная панель</h1>

<a href="property/index" class="btn mb-3 admin-butt">
    <img class="admin-panel" src="/web/img/instruction.png" alt="Инструкции">
</a>

<a href="level/index?sort=-id_level" class="btn mb-3 admin-butt">
    <img class="admin-panel" src="/web/img/level.png" alt="Уровни">
</a>

<a href="level-answer/index?sort=-level_id" class="btn mb-3 admin-butt">
    <img class="admin-panel" src="/web/img/answer.png" alt="Правильные ответы">
</a>

<!-- <a href="user/index" class="btn btn-light mb-3">Пользователи</a> -->