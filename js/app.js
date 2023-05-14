// При нажатии на стрелочку уровень перелистывается
window.onload = function() {
    var arrow = document.querySelector('.arrow.right');
    arrow.addEventListener('click', function() {
        // var currentLevel = parseInt('<?php $id_level = Yii::$app->request->get('id_level'); ?>');
        // var currentLevel = parseInt('<?php echo Yii::$app->request->get(id_level); ?>');
        
        // let currentLevel = myJsLevel;
        let newLevel = currentLevel + 1;
        newLevel = myJsLevel + 1;

        // Обновляем страницу с новым id_level
        window.location.href = 'https://dp-osmanova.сделай.site/level/game/' + newLevel;
    });
}

// ОТПРАВКА РЕЗУЛЬТАТА НА КНОПКУ ENTER (т.к. с пк удобнее на клавиатуре кнопу нажать, нежели на кнопку "Проверить")

// Получаем элемент textarea и кнопку
var textarea = document.querySelector('textarea');
var button = document.querySelector('#next');

// Назначаем обработчик события keydown на textarea
textarea.addEventListener('keydown', function(event) {
// Проверяем, была ли нажата клавиша "Enter" и не нажата ли клавиша "Shift" одновременно
    if (event.key === 'Enter' && !event.shiftKey) {
        // Отменяем стандартное поведение браузера при нажатии на клавишу "Enter"
        event.preventDefault();

        // Эмулируем нажатие кнопки при помощи метода click()
        button.click();
    }
});










// ДОБАВЛЕНИЕ ОТВЕТА ПОЛЬЗОВАТЕЛЯ В БАЗУ
// function addAnswer(level_id, styleValue) {
//     let form = new FormData();
//     form.append('level_id', level_id);
//     form.append('response', styleValue);
//     fetch('https://pr-osmanova.сделай.site/user-response/create', {method: 'POST', body: form})
//     .then(response=>response.text())
//     .then(result=>{
//         console.log(result)
//         let title=document.getElementById('staticBackdropLabel');
//         let body=document.getElementById('modalBody');
//         if (result==='false'){
//             title.innerText='Ошибка';
//             body.innerHTML="<p>Ошибка отправки ответа</p>"
//         } else {
//             title.innerText='Информационное сообщение';
//             body.innerHTML="<p>Все верно, Вы гений, не иначе</p>"
//         }
//         let myModal = new
//         bootstrap.Modal(document.getElementById("staticBackdrop"), {});
//         myModal.show();
//     })
// }

// // 
// function applyStyle() {
//     const codeTextArea = document.getElementById("code"); // получаем ссылку на элемент textarea
//     const elementDiv = document.getElementById("element2"); // получаем ссылку на элемент div
//     const styleValue = codeTextArea.value; // получаем значение из textarea
//     elementDiv.setAttribute("style", styleValue); // устанавливаем значение свойства grid-row-start у элемента div
//     // elementDiv.style = styleValue; // устанавливаем значение свойства grid-row-start у элемента div
//     addAnswer();
// }











// window.onload = function() {
//     var arrow = document.querySelector('.arrow.right');
//     arrow.addEventListener('click', function() {
//       var currentLevel = parseInt('<?php echo $id_level; ?>');
//       var newLevel = currentLevel + 1;
//       // Обновляем страницу с новым id_level
//       window.location.href = 'https://dp-osmanova.сделай.site/level/game/' + newLevel;
//     });
//   }


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


function addAnswer(level_id, style) {
    let form = new FormData();
    form.append('level_id', level_id);
    const trimmedResponse = style.replace(/\s/g, ''); // удалить все пробелы
    // console.log(trimmedResponse);
    form.append('response', trimmedResponse);
    fetch('https://dp-osmanova.сделай.site/user-response/create', {
        method: 'POST',
        body: form,
    })

    .then((response) => response.text())
        .then((result) => {
            let title = document.getElementById('staticBackdropLabel');
            let body = document.getElementById('modalBody');
            if (result === 'false') {
                title.innerText = 'Ошибка';
                body.innerHTML = '<p>К сожалению, ответ неверен(</p>';
            } else {
                title.innerText = 'Информационное сообщение';
                body.innerHTML = '<p>Все верно, Вы гений, не иначе</p>';
            }
            let myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {});
            setTimeout(() => {        
               myModal.show(); 
            }, 3500);

            
            var close = document.getElementById("close");
            close.addEventListener("click", function() { 
            //    content.innerHTML = "One";
                let newLevel = currentLevel + 1;
                window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
            });
    });
}

// function answerCorrect() {
// }



function applyStyle() {
    const codeTextArea = document.getElementById('code'); // получаем ссылку на элемент textarea
    const element = document.getElementById('element2'); // получаем ссылку на элемент div
    const style = codeTextArea.value; // получаем значение из textarea
    element.setAttribute('style', style); // устанавливаем значение свойства у элемента div
    // elementDiv.style = style;
    const level_id = 1; // значение уровня, которое надо отправить
    addAnswer(level_id, style);
    animate();
}

function nextLevel() {
    let newLevel = currentLevel + 1;
    // Обновляем страницу с новым id_level
    window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
}


// function animate() {
//     let element2 = document.getElementById('element2');
//     let currentClass = element2.getAttribute('class');
//     let winClass = jsWin;

//     element2.classList.remove('element', 'currentClass');
//     element2.classList.add('element', 'magic');

//     setTimeout(() => {        
//         element2.classList.remove('element', 'magic');
//         element2.classList.add('element', 'winClass');
//     }, 3000); // здесь 3000 - это время в миллисекундах, через которое нужно заменить класс
// }

function animate() {
    let element2 = document.getElementById('element2');
    let currentClass = element2.getAttribute('class');

    element2.classList.remove('element', 'currentClass');
    element2.classList.add('element', 'magic');

    setTimeout(() => {        
        element2.classList.remove('element', 'magic');
        element2.classList.add('element', jsWin);
    }, 3000); // здесь 3000 - это время в миллисекундах, через которое нужно заменить класс
}