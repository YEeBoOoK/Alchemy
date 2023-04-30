<?php
use app\models\Level;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LevelSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alchemy CSS';
$this->params['breadcrumbs'][] = $this->title;

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
        </div>
        <!-- Счётчик уровня -->
      <div id="level-counter"> 
        <!-- Стрелка влева -->
        <span class="arrow left">
            <!-- Треугольник -->
          <span class="triangle"></span>
        </span>';

        // $model=$dataProvider->getModels();
        $id_lavel = 1;
        $model = new Level;
        $levels = $model::findOne($id_level);
        foreach ($levels as $level) {
        echo '
        <!-- Индикатор уровня -->
        <span id="level-indicator">
          <!-- Текущий -->
          <span class="current">'.$level->id_level.'</span>
          <!-- Текст уровня -->
          <span id="labelLevel">уровень из</span>
          <!-- Всего -->
          <span class="total">3</span>
          <!-- <span class="caret">▾</span> -->
        </span>
        <!-- Стрелка вправа -->
        <span class="arrow right">
            <!-- Треугольник -->
          <span class="triangle"></span>
        </span>
      </div>
      
      </div>
    </section>
    </div>

    <div class="col">
      <section id="sidebar">
        <h1><?= Html::encode($this->title) ?></h1>';
    
        // $currentLevel = null;
        //     if ($level->id_level != $currentLevelId) {
        //         $currentLevel = $level;
        //         break;
        //     }
            
            echo '<div id="instructions" class="text-instructions">' . $level->instruction . '</div>';

    echo '
    <!--<div class="container-element">
      <img class="element" src="web/img/water.gif" alt="element">
      <div class="element">+</div>
      <img class="element" src="web/img/water.gif" alt="element">
      <div class="element">=</div>
      <div class="element">???</div>
    </div>-->

    <div id="editor">
      <div id="css" class="mt-3">
        <div class="line-numbers">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
        <pre id="before">'.$level->earlier.'</pre>
        <textarea id="code" autofocus autocapitalize="none"></textarea>
        <pre id="after">'.$level->after.'</pre>
      </div>
        <button disabled="disabled" id="next">Дальшееее</button>
    </div>';
  }

  echo '
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