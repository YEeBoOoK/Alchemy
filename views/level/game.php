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
  <h1 class="title">' . Html::encode($this->title) . '</h1>
  <div class="col">';
        
        $levels = $dataProvider->getModels();
        $id_level = Yii::$app->request->get('id_level');
        $level_js = $id_level;
        
        echo "<script>let myJsLevel = '{$level_js}';</script>";
        
        foreach ($levels as $level) {
          if ($level->id_level == $id_level) {
            echo '
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

                  <div id="element">
                    <div class="'.$level->class.'" style="'.$level->style.'">
                      <div class="bg"></div>
                    </div>
                  </div>
                  
                  <div id="table">
                    <div id="element2"class="'.$level->class2.'">
                      <div class="bg"></div>
                    </div>
                  </div>
                  
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
                        </span>
                        
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
              <section id="sidebar">';
                  echo '<div id="instructions" class="text-instructions">' . $level->instruction . '</div>';

              echo '
              <div id="editor">
                <div id="css" class="mt-3">
                  <div class="line-numbers">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10</div>
                  <pre id="before">'.$level->earlier.'</pre>
                  <textarea id="code" autofocus autocapitalize="none"></textarea>
                  <pre id="after">'.$level->after.'</pre>
                </div>
                  <button onclick="applyStyle()" id="next">Дальшееее</button>
              </div>';
            }}

            echo '
            </section>
            <!--</div>-->

              <!--</div>-->

              <!--<script src="node_modules/jquery/dist/jquery.min.js"></script>
              <script src="/js/docs.js"></script>
              <script src="/js/levels.js"></script>
              <script src="/js/game.js"></script>-->';
?>