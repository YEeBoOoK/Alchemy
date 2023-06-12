<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Alchemy CSS — grid-column-start';
$this->params['breadcrumbs'][] = ['label' => 'Справочник', 'url' => ['directory/index']];
$this->params['breadcrumbs'][] = 'grid-column-start';
?>

<div class="bg-content">
    <h1 class="title">grid-column-start</h1><hr>
<!-- Краткая сводка -->
    <p>CSS-свойство <code>grid-column-start</code> определяет начальную позицию элемента в макете сетки, или какое количество столбцов будет охватывать элемент.</p>
    <p>Отсчет граней ведется слева направо от левого края элемента.</p>
    <br>
<!-- Синтаксис -->
    <h2>Синтаксис</h2>

    <?php 
        $property = app\models\Property::findOne(['id_property' => 2]);
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
                <td>Автоматическое размещение, автоматический диапазон клеток или дефолтное растягивание элемента, равное одному. Наследуется от родительского элемента.</td>
            </tr>

            <tr>
                <td>line</td>
                <td>Целое число, соответствующее начальной грани элемента в макете сетки. Если задано отрицательное целое число, то отсчет ведется в обратном порядке, начиная с конечного края явной сетки макета. Значение 0 недопустимо.</td>
            </tr>

            <tr>
                <td>line-name</td>
                <td>Строковое значение указывающее на именованный столбец в макете сетки. Элемент будет расположен относительно начальной грани указанного элемента.</td>
            </tr>

            <tr>
                <td>span line</td>
                <td>Ключевое слово span используется с целым числом. Элемент растянется на указанное количество ячеек. Если число не задано, то по умолчанию используется значение 1. Недопустимы отрицательные значения и 0.</td>
            </tr>

            <tr>
                <td>initial</td>
                <td>Значение по умолчанию.</td>
            </tr>

            <tr>
                <td>inherit</td>
                <td>Наследуется от родительского элемента.</td>
            </tr>

        </tbody>

    </table>

<!-- Пример -->
    <br>
    <p>Пример использования с положительным целым числом:</p>
    
    <div class="row">
        <div class="col-lg">
            <div class="text-start">
                <img class="p-3 square-photo" src="/web/photoDirectory/grid-column-start_positive-integer.png" alt="grid-column-start">
            </div>
        </div>
        <div class="col-lg">
<pre><code>
    #table {
        display: grid;
        grid-template-columns: repeat(5, 20%);
        grid-template-rows: repeat(4, 25%);
    } 
    
    #water {
        grid-column-start: 2;
    }

</code></pre>
        </div>
    </div>


    <p>Пример использования с отрицательным целым числом:</p>
    
    <div class="row">
        <div class="col-lg">
<pre><code>
    #table {
        display: grid;
        grid-template-columns: repeat(5, 20%);
        grid-template-rows: repeat(4, 25%);
    } 
    
    #water {
        grid-column-start: -5;
    }
</code></pre>

        </div>

        <div class="col-lg">
            <div class="text-start">
                <img class="p-3 square-photo" src="/web/photoDirectory/grid-column-start_negative-integer.png" alt="grid-column-start">
            </div>
        </div>
    </div>
   
    
    <p>Пример использования со значением auto:</p>
    
    <div class="row">
        <div class="col-lg">
            <div class="text-start">
                <img class="p-3 square-photo" src="/web/photoDirectory/grid-column-start_auto.png" alt="grid-column-start">
            </div>
        </div>
        <div class="col-lg">
<pre><code>
    #table {
        display: grid;
        grid-template-columns: repeat(5, 20%);
        grid-template-rows: repeat(4, 25%);
    } 
    
    #water {
        grid-column-start: auto;
    }

</code></pre>
        </div>
    </div>


    <p>Пример использования со span:</p>
    
    <div class="row">
        <div class="col-lg">
<pre><code>
    #table {
        display: grid;
        grid-template-columns: repeat(5, 20%);
        grid-template-rows: repeat(4, 25%);
    } 
    
    #water {
        grid-column-start: span 3;
    }
</code></pre>

        </div>

        <div class="col-lg">
            <div class="text-start">
                <img class="p-3 square-photo" src="/web/photoDirectory/grid-column-start_span.png" alt="grid-column-start">
            </div>
        </div>
    </div>
</div>