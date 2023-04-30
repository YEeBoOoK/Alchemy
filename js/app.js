// window.onload = function() {
//     var arrow = document.querySelector('.arrow.right');
//     arrow.addEventListener('click', function() {
//       var currentLevel = parseInt('<?php echo $id_level; ?>');
//       var newLevel = currentLevel + 1;
//       // Обновляем страницу с новым id_level
//       window.location.href = 'https://dp-osmanova.сделай.site/level/game/' + newLevel;
//     });
//   }


window.onload = function() {
    var arrow = document.querySelector('.arrow.right');
    arrow.addEventListener('click', function() {
    //   var currentLevel = parseInt('<?php $id_level = Yii::$app->request->get('id_level'); ?>');
    // var currentLevel = parseInt('<?php echo Yii::$app->request->get(id_level); ?>');
    let currentLevel = myJsLevel;

    let newLevel = currentLevel + 1;
    // let newLevel = myJsLevel + 1;

    // Обновляем страницу с новым id_level
    window.location.href = 'https://dp-osmanova.сделай.site/level/game/' + newLevel;
});
}


// var colors = {
//     'w': 'water',
//     'f': 'fire',
//     'e': 'earth',
//     'a': 'air',
//   };


//   $('.treatment').fadeOut(1000, 'linear', function() {
//     $('.carrot, .water').addClass('correct');
//   });
// var color = colors[c];


// window.onload = function() {
//     var arrow = document.querySelector('.arrow.left');
//     arrow.addEventListener('click', function() {
//     //   var currentLevel = parseInt('<?php $id_level = Yii::$app->request->get('id_level'); ?>');
//     // var currentLevel = parseInt("<?php echo Yii::$app->request->get('id_level', 1); ?>");
//     var currentLevel = 2;

//     var newLevel = currentLevel - 1;
//     // Обновляем страницу с новым id_level
//     window.location.href = 'https://dp-osmanova.сделай.site/level/game/' + newLevel;
// });
// }


// JavaScript-код для изменения стиля элемента на основе введенного текста
// const Element = document.getElementById("element"); // получаем элемент по id
// const Code = document.getElementById("code"); // получаем инпут по id

// Code.addEventListener("textarea", () => { // добавляем слушатель события "textarea"
//   const textareaText = Code.value; // получаем значение введенного текста
//   Element.style.color = textareaText; // изменяем цвет текста элемента на значение введенного текста
// });

function applyStyle() {
    const codeTextArea = document.getElementById("code"); // получаем ссылку на элемент textarea
    const elementDiv = document.getElementById("element2"); // получаем ссылку на элемент div
  
    const styleValue = codeTextArea.value; // получаем значение из textarea

    elementDiv.setAttribute("style", styleValue); // устанавливаем значение свойства grid-row-start у элемента div
  
    // elementDiv.style = styleValue; // устанавливаем значение свойства grid-row-start у элемента div
}


// var game = {
//     loadLevel: function(level) {
//         $('#editor').show();
//         $('#element, #table').removeClass().attr('style', '').empty();
//         $('#surface, #overlay').removeClass().attr('style', '');
//         $('#levelsWrapper').hide();
//         $('.level-marker').removeClass('current').eq(this.level).addClass('current');
//         $('#level-counter .current').text(this.level + 1);
//         $('#before').text(level.before);
//         $('#after').text(level.after);
//         $('#next').removeClass('animated animation').addClass('disabled');
    
//         var instructions = level.instructions || level.instructions;
//         $('#instructions').html(instructions);
    
//         $('.arrow.disabled').removeClass('disabled');
    
//         if (this.level === 0) {
//           $('.arrow.left').addClass('disabled');
//         }
    
//         if (this.level === levels.length - 1) {
//           $('.arrow.right').addClass('disabled');
//         }
    
//         var answer = game.answers[level.name];
//         $('#code').val(answer).focus();
    
//         this.loadDocs();
    
//         var lines = Object.keys(level.style).length;
//         $('#code').height(20 * lines).data("lines", lines);
    
//         var string = level.board;
//         var markup = '';
//         var colors = {
//           'w': 'water',
//           'f': 'fire',
//           'e': 'earth',
//           'a': 'air',
//         };
    
//         for (var i = 0; i < string.length; i++) {
//           var c = string.charAt(i);
//           var color = colors[c];
    
//           var element = $('<div/>').addClass('element ' + color).data('color', color);
//           var treatment = $('<div/>').addClass('treatment ' + color).data('color', color);
    
//           $('<div/>').addClass('bg').appendTo(element);
//           $('<div/>').addClass('bg').appendTo(treatment);
    
//           $('#element').append(element);
//           $('#table').append(treatment);
//         }
    
//         var classes = level.classes;
    
//         if (classes) {
//           for (var rule in classes) {
//             $(rule).addClass(classes[rule]);
//           }
//         }
    
//         var selector = level.selector || '';
//         $('#element ' + selector).css(level.style);
    
//         game.changed = false;
//         game.applyStyles();
//         game.check();
//       },
// }