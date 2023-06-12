<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Alchemy CSS — grid-column-end';
$this->params['breadcrumbs'][] = ['label' => 'Справочник', 'url' => ['directory/index']];
$this->params['breadcrumbs'][] = 'grid-column-end';
?>

<div class="bg-content">
    <h1 class="title">grid-column-end</h1><hr>
<!-- Краткая сводка -->    
    <p>CSS свойство <code>grid-column-end</code> определяет, на каком столбце завершится элемент или сколько столбцов он будет охватывать в макете сетки.
    В то время, как свойство <code>grid-column-start</code> указывает, с какого столбца элемент должен начинаться или сколько столбцов он должен занимать</p>
    <p>Таким образом, эти свойства позволяют управлять расположением и размерами элементов в сетке, устанавливая начальные и конечные столбцы, которые они занимают.</p>
    <br>
<!-- Синтаксис -->
    <h2>Синтаксис</h2>

    <?php 
        $property = app\models\Property::findOne(['id_property' => 3]);
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
                <td>Автоматическое размещение, автоматический диапазон клеток или дефолтное растягивание элемента, равное одному. Значение по умолчанию.</td>
            </tr>

            <tr>
                <td>line</td>
                <td>Целое число, соответствующее конечной грани элемента в макете сетки. Если задано отрицательное целое число, то отсчет ведется в обратном порядке, начиная с конечного края явной сетки макета. Значение 0 недопустимо.</td>
            </tr>

            <tr>
                <td>line-name</td>
                <td>Строковое значение указывающее на именованный столбец в макете сетки. Элемент будет расположен до начальной грани указанного элемента.</td>
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
                <img class="p-3 square-photo" src="/web/photoDirectory/grid-column-end_positive-integer.png" alt="grid-column-end">
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
        grid-column-end: 2;
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
        grid-column-end: -4;
    }
</code></pre>

        </div>

        <div class="col-lg">
            <div class="text-start">
                <img class="p-3 square-photo" src="/web/photoDirectory/grid-column-end_negative-integer.png" alt="grid-column-end">
            </div>
        </div>
    </div>
   
    
    <p>Пример использования со значением auto:</p>
    
    <div class="row">
        <div class="col-lg">
            <div class="text-start">
                <img class="p-3 square-photo" src="/web/photoDirectory/grid-column-end_auto.png" alt="grid-column-end">
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
        grid-column-end: auto;
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
        grid-column-end: span 3;
    }
</code></pre>

        </div>

        <div class="col-lg">
            <div class="text-start">
                <img class="p-3 square-photo" src="/web/photoDirectory/grid-column-end_span.png" alt="grid-column-end">
            </div>
        </div>
    </div>
</div>