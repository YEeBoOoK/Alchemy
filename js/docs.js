// В данном случае, ключом является строка 'grid-area', а значение -- строка с описанием свойства. При использовании фигурных скобок, внутри них необходимо указывать ключ-значение в формате {ключ: значение}.
var docs = {
    'grid-area':'<p>Определяет позицию и размер grid-элемента внутри grid-сетки.</p><p><code>&lt;grid-row-start&gt; / &lt;grid-column-start&gt; / &lt;grid-row-end&gt; / &lt;grid-column-end&gt;</code></p>',
  
    'grid-column':'<p>Определяет позицию grid-элемента внутри grid-столбцов.</p><p><code>&lt;grid-column-start&gt; / &lt;grid-column-end&gt;</code></p>',
  
    'grid-column-end':'<p>Определяет конечную позицию grid-элемента внутри grid-столбцов.</p><p><code>&lt;integer&gt;</code> <code>span &lt;integer&gt;</code></p>',
  
    'grid-column-start': '<p>Определяет начальную позицию grid-элемента внутри grid-столбцов.</p><p><code>&lt;integer&gt;</code> <code>span &lt;integer&gt;</code></p>',
  
    'grid-row': '<p>Определяет позицию grid-элемента внутри grid-строк.</p><p><code>&lt;grid-row-start&gt; / &lt;grid-row-end&gt;</code></p>',
  
    'grid-row-end':  '<p>Определяет конечную позицию grid-элемента внутри grid-строк.</p><p><code>&lt;integer&gt;</code> <code>span &lt;integer&gt;</code></p>',
  
    'grid-row-start': '<p>Определяет начальную позицию grid-элемента внутри grid-строк.</p><p><code>&lt;integer&gt;</code> <code>span &lt;integer&gt;</code></p>',
  
    'grid-template': '<p>Определяет размер и названия для grid-строк и столбцов.</p><p><code>&lt;grid-template-rows&gt; / &lt;grid-template-columns&gt;</code></p>',
  
    'grid-template-areas': '<p>Определяет названные grid-зоны.</p><p><code>&lt;grid-name&gt;</code></p>',
  
    'grid-template-columns': '<p>Определяет размер и названия для grid-столбцов.</p><p><code>&lt;length&gt;</code> <code>&lt;percentage&gt;</code> <code>&lt;flex&gt;</code> <code>max-content</code> <code>min-content</code> <code>minmax(min, max)</code></p>',
    
    'grid-template-rows': '<p>Определяет размер и названия для grid-строк.</p><p><code>&lt;length&gt;</code> <code>&lt;percentage&gt;</code> <code>&lt;flex&gt;</code> <code>max-content</code> <code>min-content</code> <code>minmax(min, max)</code></p>',
    
    'order': '<p>Определяет порядок grid-элемента.</p><p><code>&lt;integer&gt;</code></p>',
  };
  