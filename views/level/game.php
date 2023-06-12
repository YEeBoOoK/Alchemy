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

$this->title = 'Alchemy CSS — веб-приложение для изучения CSS Grid';

echo '
  <div class="row">
  <h1 class="title">Alchemy CSS</h1>';
        $levels = $dataProvider->getModels();
        $id_level = Yii::$app->request->get('id_level');
        $user_id = Yii::$app->user->identity->id_user;

        $totalLevel = Level::find()
        ->where(['id_level' => Level::find()->select('id_level')])
        ->orderBy(['id_level' => SORT_DESC])
        ->one();

        // Определение текущего уровня по его id
        $currentLevel = Level::find()
            ->select('id_level')
            ->where(['<=', 'id_level', $id_level])
            ->count();

        $nextLevel = Level::find()
          ->select('id_level')
          ->where(['>=', 'id_level', $id_level])
          ->count();

          if ($currentLevel == $totalLevel->id_level) {
            $levelId = $totalLevel->id_level;
          } else {
            $levelId = Level::find()->select('id_level')->where(['>', 'id_level', $currentLevel])->orderBy(['id_level' => SORT_ASC])->limit(1)->scalar();
          }
        

        // $previousLevelId = Level::find()->select('id_level')
        // ->where(['<', 'id_level', $currentLevel])
        // ->andWhere(['>', 'id_level', 0])
        // ->orderBy(['id_level' => SORT_DESC])->limit(1)->scalar();

        if ($currentLevel == 1) {
            $previousLevelId = 1;
        } else {
            $previousLevelId = Level::find()
                ->select('id_level')
                ->where(['<', 'id_level', $currentLevel])
                ->orderBy(['id_level' => SORT_DESC])
                ->limit(1)
                ->scalar();
        }




        // Определение общего количества записей в таблице Level
        $totalLevels = Level::find()->count();
        
        $level = Level::find()->where(['id_level' => $id_level])->one();

        if (!$level) {
          $redirectUrl = Url::to(['game/1']);
          Yii::$app->response->redirect($redirectUrl);
          Yii::$app->end();
        } else {
          $winClass = $level->winClass;
          $removeClass = $level->class2;
        }

        echo "<script>
                let previousLevelId = $previousLevelId;
                let currentLevel = $id_level;
                let levelId = $levelId;
                let jsWin = '$winClass';
                let removeClass = '$removeClass';
                let lastLevel = $totalLevel->id_level;
              </script>";
        
        foreach ($levels as $level) {
          if ($level->id_level == $id_level) {
            $property = app\models\Property::findOne(['id_property' => $level->property_id]);
            echo '
            <div id="instructions" class="text-instructions m-2" title="'.$property->name_property. ":" .$property->definition.'">' . $level->instruction . '</div>
            <div class="col">
              <section class="py-2">
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
                        <span id="left" class="arrow left" title="Предыдущий уровень" onmousedown="back()">
                          <!--Треугольник-->
                          <span class="triangle"></span>
                        </span>
                        
                        <!-- Индикатор уровня -->
                        <span id="level-indicator">
                          <!-- Текущий -->
                          <span class="current" title="Текущий уровень">'.$currentLevel.'</span>
                            <!-- Текст уровня -->
                            <span id="labelLevel">уровень из</span>
                            <!-- Всего -->
                            <span class="total" title="Последний уровень">'.$totalLevels.'</span>
                        <!-- <span class="caret">▾</span> -->
                          </span>
                        
                          <!-- Стрелка вправа -->
                          <span id="right" class="arrow right" title="Следующий уровень" onmousedown="next()">
                            <!--Треугольник-->
                            <span class="triangle"></span>
                          </span>
                      </div>
                
                </div>
              </section>
              </div>

              <div class="col p-0">
              <section id="sidebar">
                <div id="editor">
                  <div id="css" class="mt-2">
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
                    if (($model->is_correct == 1) && ($model->level_id < $totalLevel->id_level)) {
                      $is_correct = 1;
                      echo '<button onclick="nextLevel()" id="next">Дальше</button>';
                      break;
                    } 
                  }
                    
                    if ($model->level_id == $totalLevel->id_level) {
                      echo '<p class="bg-dark px-3 py-2 text-success text-end">Вы прошли последний уровень</p>';
                    } else if (!$is_correct) {
                    echo '<button onclick="applyStyle()" id="next" data-correct="' . $is_correct . '">Проверить</button>'; 
                  }
                }

                echo "<script>let correct = $is_correct;</script>";
                echo '</div></section>';}}
                echo "</div></div>";
?>