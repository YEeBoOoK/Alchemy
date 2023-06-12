<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Alchemy CSS — Справочник';
$this->params['breadcrumbs'][] = 'Справочник';

$this->params['meta_description'] = 'Здесь Вы можете найти объяснения свойств css grid';
$this->params['meta_keywords'] = 'Справочник, справочные материалы, гайд';
?>

<h1 class="mb-3">Справочник</h1>

<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item mb-3">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Обратная связь
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <b>Уважаемые пользователи,</b>
        <br><br>
        Если у вас возникли вопросы, сложности или есть предложения по улучшению нашего веб-приложения, мы будем рады получить ваше сообщение. 
        Вы можете связаться с нами, заполнив форму обратной связи в разделе "Поддержка". Cделаем все возможное, чтобы помочь вам и улучшить веб-приложение. 
        <br><br>
        <b>Спасибо!</b>
      </div>
    </div>
  </div>
</div>

<div class="card-group">

  <div class="card mx-2">
    <a href="https://dp-osmanova.сделай.site/directory/zindex">
      <div class="card-body">
        <h5 class="card-title">z-index</h5>
        <!-- <p class="card-text text-dark">Это более широкая карточка с вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту. Этот контент немного длиннее.</p> -->
      </div>
    </a>
    <div class="card-footer">
      <small class="text-muted">Уровень 1</small>
    </div>
  </div>

  <div class="card mx-2">
    <a href="https://dp-osmanova.сделай.site/directory/grid-column-start">
      <div class="card-body">
        <h5 class="card-title">grid-colunn-start</h5>
        <!-- <p class="card-text text-dark">Под этой карточкой есть вспомогательный текст, который является естественным введением к дополнительному содержанию.</p> -->
      </div>
    </a>
    <div class="card-footer">
      <small class="text-muted">Уровень 2 и 3</small>
    </div>
  </div>

  <div class="card mx-2">
    <a href="https://dp-osmanova.сделай.site/directory/grid-column-end">
      <div class="card-body">
        <h5 class="card-title">grid-colunn-end</h5>
        <!-- <p class="card-text text-dark">Это более широкая карта С вспомогательным текстом ниже в качестве естественного перехода к дополнительному контенту. Эта карточка имеет даже более длинный контент, чем первая, чтобы показать действие одинаковой высоты.</p> -->
      </div>
    </a>
    <div class="card-footer">
      <small class="text-muted">Уровень 4</small>
    </div>
  </div>

</div>