// ПЕРЕХОД НА УРОВНИ ПО СТРЕЛОЧКАМ 
function back() {
    let newLevel = previousLevelId;
    newLevel = previousLevelId;
    if (newLevel > 0) {
        window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
    }
};

function next() {
    let newLevel = levelId;
    if (newLevel <= lastLevel && correct === 1) {
        window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
    }
};

// ОТПРАВКА РЕЗУЛЬТАТА НА КНОПКУ ENTER (т.к. с пк удобнее на клавиатуре кнопу нажать, нежели на кнопку "Проверить")
var textarea = document.querySelector('textarea');
var button = document.querySelector('#next');
textarea.addEventListener('keydown', function(event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        button.click();
    }
});


// ДОБАВЛЕНИЕ ОТВЕТА ПОЛЬЗОВАТЕЛЯ В БАЗУ
function addAnswer(level_id, style) {
    let form = new FormData();
    form.append('level_id', level_id);
    const trimmedResponse = style.replace(/\s/g, ''); // удалить все пробелы
    form.append('response', trimmedResponse);
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
            body.innerHTML = '<p>Отлично! Уровень пройден!</p>';
            let myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {});
            answerCorrect();
            setTimeout(() => {     
                myModal.show(); 
            }, 3500);
        } else if (сorrect === 1 && level_id === lastLevel) {
            animate();
            title.innerText = 'Информационное сообщение';
            body.innerHTML = '<p>Отлично сыграно! Уровень пройден!<br> На данный момент, Вы выполнили последний уровень! Похвалите себя и возвращайтесь позже</p>';
            let myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {});
            theEnd();
            setTimeout(() => {     
                myModal.show(); 
            }, 3500);
        } else {
            title.innerText = 'Информационное сообщение';
            body.innerHTML = '<p>К сожалению, ответ пока неверен, но мы уверены, Вы на верном пути!<br> Не сдавайтесь и у Вас обязательно все получится!</p>';
            let myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {}); 
            myModal.show(); 
        } 
    });
}

// ДОБАВЛЯЮ ЧИТАЛКУ НА НАЖАТИЕ КНОПКИ "ЗАКРЫТЬ" (В МОДАЛЬНОМ ОКНЕ)
function answerCorrect() {
    var close = document.getElementById("close");
    close.addEventListener("click", function() { 
        let newLevel = levelId;
        window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
    });
}

// ПРИМЕНЕНИЕ СТИЛЯ К ЭЛЕМЕНТУ НА ИГРОВОМ СТОЛЕ
function applyStyle() {
    const codeTextArea = document.getElementById('code');
    const element = document.getElementById('element2');
    const style = codeTextArea.value; // получаем значение из textarea
    element.setAttribute('style', style); // устанавливаем значение свойства у элемента div
    const level_id = currentLevel;
    addAnswer(level_id, style);
}


// ФУНКЦИЯ ДЛЯ КНОПКИ "ДАЛЬШЕ" НА УЖЕ ПРОЙДЕННЫХ ПОЛЬЗОВАТЕЛЕМ УРОВНЯХ
function nextLevel() {
    let newLevel = levelId;
    window.location.href = 'https://dp-osmanova.сделай.site/game/' + newLevel;
}

// АНИМАЦИЯ, КОТОРАЯ ПОЯВЛЯЕТСЯ ПРИ ВЕРНОМ ОТВЕТЕ ПОЛЬЗОВАТАЛЯ И МЕНЯЕТ КЛАСС НА "ПОЛУЧИВШИЙСЯ ЭЛЕМЕНТ"
function animate() {
    let element2 = document.getElementById('element2');
    let classesToRemove = removeClass.split(' '); // Разделение строки на классы
    let firstClass = classesToRemove[0]; // Получение первого класса
    element2.classList.remove(firstClass); // Удаление первого класса
    element2.classList.add('magic');
    setTimeout(() => {        
        element2.classList.remove('magic');
        element2.classList.add(jsWin);
    }, 3000); // здесь 3000 - это время в миллисекундах, через которое нужно заменить класс
}

// ИГРОК ПРОШЕЛ ПОСЛЕДНИЙ УРОВЕНЬ, ЕМУ ВСПЛЫВАЕТ МОДАЛЬНОЕ ОКНО, КНОПКА "ЗАКРЫТЬ" обновляет страницу
function theEnd() {
    document.getElementById("close").addEventListener("click", function() {
        window.location.reload();
    });
}