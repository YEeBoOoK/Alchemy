// ПЕРЕХОД НА УРОВНИ ПО СТРЕЛОЧКАМ 

function back() {
    let newLevel = currentLevel;
    newLevel = currentLevel - 1;

    // Обновляем страницу с новым id_level
    if (newLevel > 0) {
        window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
    }
};

function next() {
    let newLevel = currentLevel;
    newLevel = currentLevel + 1;

    // Обновляем страницу с новым id_level
    if (newLevel <= lastLevel && correct === 1) {
        window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
    }
};


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

function addAnswer(level_id, style) {
    let form = new FormData();
    form.append('level_id', level_id);
    const trimmedResponse = style.replace(/\s/g, ''); // удалить все пробелы
    // console.log(trimmedResponse);
    form.append('response', trimmedResponse);
    // form.append('is_correct', correct);
    fetch('https://dp-osmanova.сделай.site/user-response/create', {
        method: 'POST',
        body: form,
    })

    .then((response) => response.json())
    .then((data) => {
        let сorrect = data.is_correct; // Получаем значение is_correct из ответа

        let title = document.getElementById('staticBackdropLabel');
        let body = document.getElementById('modalBody');

        if (сorrect === 1 && level_id !== lastLevel) {
            animate();
            title.innerText = 'Информационное сообщение';
            body.innerHTML = '<p>Все верно, Вы гений, не иначе</p>';
            let myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {});
            answerCorrect();
            setTimeout(() => {     
                myModal.show(); 
            }, 3500);
        } else if (сorrect === 1 && level_id === lastLevel) {
            animate();
            title.innerText = 'Информационное сообщение';
            body.innerHTML = '<p>Все верно, Вы гений, не иначе. <br> На данный момент, Вы выполнили последний уровень! Похвалите себя и возвращайтесь позже</p>';
            let myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {});
            theEnd();
            setTimeout(() => {     
                myModal.show(); 
            }, 3500);
        } else {
            title.innerText = 'Информационное сообщение';
            body.innerHTML = '<p>Вы не глупий, но ответ глупий</p>';
            let myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {}); 
            myModal.show(); 
        } 
        
    });
}

// ДОБАВЛЯЮ ЧИТАЛКУ НА НАЖАТИЕ КНОПКИ "ЗАКРЫТЬ" (В МОДАЛЬНОМ ОКНЕ)

function answerCorrect() {
    var close = document.getElementById("close");
    close.addEventListener("click", function() { 
        let newLevel = currentLevel + 1;
        window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
    });
}


// ПРИМЕНЕНИЕ СТИЛЯ К ЭЛЕМЕНТУ НА ИГРОВОМ СТОЛЕ

function applyStyle() {
    const codeTextArea = document.getElementById('code'); // получаем ссылку на элемент textarea
    const element = document.getElementById('element2'); // получаем ссылку на элемент div
    const style = codeTextArea.value; // получаем значение из textarea
    element.setAttribute('style', style); // устанавливаем значение свойства у элемента div
    // elementDiv.style = style;
    const level_id = currentLevel; // значение уровня, которое надо отправить
    addAnswer(level_id, style);
}


// ФУНКЦИЯ ДЛЯ КНОПКИ "ДАЛЬШЕ" НА УЖЕ ПРОЙДЕННЫХ ПОЛЬЗОВАТЕЛЕМ УРОВНЯХ

function nextLevel() {
    let newLevel = currentLevel + 1;
    window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
}

// АНИМАЦИЯ, КОТОРАЯ ПОЯВЛЯЕТСЯ ПРИ ВЕРНОМ ОТВЕТЕ ПОЛЬЗОВАТАЛЯ И МЕНЯЕТ КЛАСС НА "ПОЛУЧИВШИЙСЯ ЭЛЕМЕНТ"

function animate() {
    let element2 = document.getElementById('element2');
    element2.classList.remove(removeClass);
    element2.classList.add('magic');

    setTimeout(() => {        
        element2.classList.remove('magic');
        element2.classList.add(jsWin);
    }, 3000); // здесь 3000 - это время в миллисекундах, через которое нужно заменить класс
}

// ИГРОК ПРОШЕЛ ПОСЛЕДНИЙ УРОВЕНЬ, ЕМУ ВСПЛЫВАЕТ МОДАЛЬНОЕ ОКНО, КНОПКА "ЗАКРЫТЬ" обновляет страницу

function theEnd() {
    var close = document.getElementById("close");
    close.addEventListener("click", function() { 
        window.location.href = 'https://dp-osmanova.сделай.site/game/' + lastLevel;
    });
}