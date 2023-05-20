<?php
use app\models\Level;
use app\models\UserResponse;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;



/** @var yii\web\View $this */
/** @var app\models\LevelSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alchemy CSS';
// $this->params['breadcrumbs'][] = $this->title;

echo '
  <!-- Содержит контент веб-страницы. Контент, который должен отображаться на странице -->
  <!--<body>-->
  
  <div class="row">
  <h1 class="title">' . Html::encode($this->title) . '</h1>
  <div class="col">';
        
        $levels = $dataProvider->getModels();
        $id_level = Yii::$app->request->get('id_level');
        $user_id = Yii::$app->user->identity->id_user;


        $totalLevel = Level::find()
        ->where(['id_level' => Level::find()->select('id_level')])
        ->orderBy(['id_level' => SORT_DESC])
        ->one();

        $level = Level::find()->where(['id_level' => $id_level])->one();
        $winClass = $level->winClass;
        $removeClass = $level->class2;

        $userResponse = UserResponse::find()->where(['level_id' => $id_level, 'user_id' => $user_id])->one();
        // $correct = $userResponse->is_correct;
        //  let correct = '$correct';
        echo "<script>
                let currentLevel = $id_level;
                let jsWin = '$winClass';
                let removeClass = '$removeClass';
              </script>";
        
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
                    <div class="element '.$level->class.'" style="'.$level->style.'">
                      <div class="bg"></div>
                    </div>
                  </div>

                  <div id="element02">
                    <div id="element2" class="element '.$level->class2.'"> 
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
                        <span id="left" class="arrow left" onmousedown="back()">
                          <!--Треугольник-->
                          <span class="triangle"></span>
                        </span>
                        
                        <!-- Индикатор уровня -->
                        <span id="level-indicator">
                          <!-- Текущий -->
                          <span class="current">'.$level->id_level.'</span>
                            <!-- Текст уровня -->
                            <span id="labelLevel">уровень из</span>
                            <!-- Всего -->
                            <span class="total">'.$totalLevel->id_level.'</span>
                        <!-- <span class="caret">▾</span> -->
                          </span>
                        
                          <!-- Стрелка вправа -->
                          <span id="right" class="arrow right" onmousedown="next()">
                            <!--Треугольник-->
                            <span class="triangle"></span>
                          </span>
                      </div>
                
                </div>
              </section>
              </div>

              <div class="col">
              <section id="sidebar">';
                  echo '<div id="instructions" class="text-instructions" title="'.app\models\Property::find()->one()->name_property . ": " . app\models\Property::find()->one()->definition .'">' . $level->instruction . '</div>';
              echo '
              <div id="editor">
                <div id="css" class="mt-3">
                  <div class="line-numbers">1<br>2<br>3<br>4<br>5<br>6<br>7<br>8<br>9<br>10<br>11<br>12<br>13<br>14<br>15</div>
                  <pre id="before">'.$level->earlier.'</pre>
                  <textarea id="code" autofocus autocapitalize="none"></textarea>
                  <pre id="after">'.$level->after.'</pre>
                </div>';

                $models = UserResponse::find()->where(['level_id' => $id_level, 'user_id' => $user_id]) -> all();

                $is_correct = 0;
                if (!$models) {
                  echo '<button onclick="applyStyle()" id="next" data-correct="' . $is_correct . '">Проверить</button>'; 
                } else {
                  foreach ($models as $model) {
                    if ($model->is_correct == 1) {
                      $is_correct = 1;
                      echo '<button onclick="nextLevel()" id="next">Дальше</button>';
                      break;
                    }
                  }
                  if (!$is_correct) {
                    echo '<button onclick="applyStyle()" id="next" data-correct="' . $is_correct . '">Проверить</button>'; 
                  }
                }

                echo "<script>
                        let correct = $is_correct;
                      </script>";

              echo '</div>';
            }}

            echo "
            </section>
            <!--</div>-->

              <!--</div>-->
              

              <!--<script src='node_modules/jquery/dist/jquery.min.js'></script>-->";
?>