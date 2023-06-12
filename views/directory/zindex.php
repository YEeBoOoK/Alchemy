<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Alchemy CSS — Z-index';
$this->params['breadcrumbs'][] = ['label' => 'Справочник', 'url' => ['directory/index']];
$this->params['breadcrumbs'][] = 'z-index';
?>

<div class="bg-content">
    <h1 class="title">z-index</h1><hr>
<!-- Краткая сводка -->
    <p>На странице любые позиционированные элементы могут накладываться друг на друга в определенном порядке.</p>
    <p>z-index — это css свойство, определяющее положение позиционированного элемента по оси z.</p>
    <p>Оно работает только для элементов, у которых значение <code>position: absolute | fixed | relative;</code></p>
    <br>
<!-- Синтаксис -->
    <h2>Синтаксис</h2>

    <?php 
        $property = app\models\Property::findOne(['id_property' => 1]);
        echo '<p>'.$property->name_property. ': ' .$property->definition.'</p>';
    ?>

    <table class="table table-striped-columns">

        <thead>
            <tr>
                <th scope="col">Значение</th>
                <th scope="col">Описание</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>auto</td>
                <td>Значение по умолчанию. Устанавливает порядок расположения. Наследуется от родительского элемента</td>
            </tr>

            <tr>
                <td>number</td>
                <td>Задает порядок расположения элемента. Допускаются положительные и отрицательные целые числа</td>
            </tr>

            <tr>
                <td>initial</td>
                <td>Устанавливает свойство в значение по умолчанию.</td>
            </tr>

            <tr>
                <td>inherit</td>
                <td>Значение наследуется от родительского элемента.</td>
            </tr>

        </tbody>

    </table>

<!-- Пример -->
    <br>
    <p>Например, на поле есть 2 элемента:</p>
    
    <div class="row">
        <div class="col-lg">
<pre>
    <code>
    #water, #box {
        position: relative;
    }
    
    #water {
        z-index: 39;
    }

    #box {
        z-index: 40;
    }
    </code>
</pre>
        </div>

        <div class="col-lg">
            <div class="text-start">
                <img class="p-3 square-photo" src="/web/photoDirectory/z-index(1).png" alt="z-index">
            </div>
        </div>
        
</div>
    
<p>
Вы можете переместить капельку на передний план следующими способами:
</p>
<div class="row">
    <div class="col-lg">
        <p>1. Увеличьте значение z-index #water, чтобы он стал больше, чем индекс элемента #box:</p>
        <pre><code>
    ...
    #water {
        z-index: 41;
    }

    #box {
        z-index: 40;
    }
        </code></pre>
    </div>

    <div class="col-lg">
        <p>2. Уменьшите значение z-index #box, чтобы он стал меньше, чем индекс элемента #water:</p>
        <pre><code>
    ...
    #water {
        z-index: 39;
    }

    #box {
        z-index: 38;
    }
        </code></pre>
    </div>
</div>
        <div class="text-center">
          <img class="p-3 square-photo" src="/web/photoDirectory/z-index(2).png" alt="z-index">
        </div>

</div>