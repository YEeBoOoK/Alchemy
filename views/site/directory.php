<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Alchemy CSS — Справочник';
$this->params['breadcrumbs'][] = 'Справочник';
?>

<h1 class="mb-3">Справочник</h1>

<div class="accordion" id="accordionPanelsStayOpenExample">
  
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
        Обратная связь
      </button>
    </h2>

    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
        <b>Уважаемые пользователи,</b>
        <br><br>
        Если у вас возникли вопросы, сложности или есть предложения по улучшению нашего веб-приложения, мы будем рады получить ваше сообщение. 
        Вы можете связаться с нами по адресу <b><i>css.alchemy@gmail.com</i></b>. Cделаем все возможное, чтобы помочь вам и улучшить веб-приложение. 
        <br><br>
        <b>Спасибо!</b>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Grid-template-columns
      </button>
    </h2>

    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
      <div class="accordion-body">
        Данное свойство определяет количество колонок сетки, а так же их ширину.  
        <br><br>
        Вы можете задать ширину каждой колонки по отдельности:
        <div class="text-center">
          <img class="p-3 directory-photo" src="/web/photoDirectory/grid-template-columns(2).png" alt="grid-template-columns">
        </div>
        Или установить одинаковую ширину сразу для всех колонок, используя функцию <code>repeat()</code>.
        Использование в качестве единицы измерения fr (дробной единицы), позволит сделать ширину всех колонок одинакового размера.
        <div class="text-center">
          <img class="p-3 directory-photo" src="/web/photoDirectory/grid-template-columns (4).png" alt="grid-template-columns">
        </div>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Accordion Item #3
      </button>
    </h2>

    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
      <div class="accordion-body">
        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>





  
</div>