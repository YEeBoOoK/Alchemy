<?php
/** @var yii\web\View $this */

$this->title = "Alchemy CSS"; 

use app\models\Level;

echo '
  <!-- Содержит контент веб-страницы. Контент, который должен отображаться на странице -->
  <!--<body>-->

  <div class="row">
  <div class="col">
    <section id="view">
      <div id="board">
        <div id="overlay">
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
        </div>

        <div id="elements"></div>
        <div id="table"></div>
        
        <div id="surface">
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
          <span class="piece"></span>
        </div>';

        foreach ($levels as $level) {
        echo '
        <!-- Счётчик уровня -->
      <div id="level-counter"> 
        <!-- Стрелка влева -->
        <span class="arrow left">
            <!-- Треугольник -->
          <span class="triangle"></span>
        </span>
        <!-- Индикатор уровня -->
        <span id="level-indicator">
          <!-- Текущий -->
          <span class="current">'.$level->id_level.'</span>
          <!-- Текст уровня -->
          <span id="labelLevel">уровень из</span>
          <!-- Всего -->
          <span class="total">4</span>
          <!-- <span class="caret">▾</span> -->
        </span>
        <!-- Стрелка вправа -->
        <span class="arrow right">
            <!-- Треугольник -->
          <span class="triangle"></span>
        </span>
      </div>';
        }

      echo '</div>
    </section>
    </div>

    <div class="col">
    <section id="sidebar">
        <div>
            <h1 class="title">Алхимия CSS</h1>
        </div>';
    
    // Выводим инструкции для каждого уровня
    foreach ($levels as $level) {
        echo '<div id="instructions">'.$level->instruction.'</div>';
    }

    echo '
    <!--<div class="container-element">
      <img class="element" src="web/img/water.gif" alt="element">
      <div class="element">+</div>
      <img class="element" src="web/img/water.gif" alt="element">
      <div class="element">=</div>
      <div class="element">???</div>
    </div>-->

    <div id="editor">
      <div id="css">
        <div class="line-numbers">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
        <pre id="before">'.$level->earlier.'</pre>
        <textarea id="code" autofocus autocapitalize="none"></textarea>
        <pre id="after">'.$level->after.'</pre>
      </div>
        <button id="next">Дальшееее</button>
    </div>

  </section>
  </div>

    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <!--<script src="/js/docs.js"></script>
    <script src="/js/levels.js"></script>
    <script src="/js/game.js"></script>-->

    <!--</body>-->
</html>
<script>
i = 0;
function updateCounter() {
  $.ajax({
      type: "GET",
      url: "<?= Url::toRoute("/game/counter")?>",
      dataType: "text",
      success: function (response) {
          // Добавляем условие, если не совпадают переменные
          if (i != response) {
              // Приравниваем i к response
              i = response;
          }
          // С помощью jquery будем искать элемент с id counter и в его html прописывать текст
          // i — переменная счётчик (объявляем в самом верху)
          $("#counter").html("Решено заявок: " + response);
      }
  });
}
</script>'
;
?>