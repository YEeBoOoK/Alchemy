var game = {
  // level - свойство, которое хранит номер текущего уровня. Оно получает своё значение из localStorage.level, если таковое имеется, или устанавливается в 0 (первый уровень) по умолчанию.
  level: parseInt(localStorage.level, 10) || 0,
  // answers - свойство, которое хранит ответы на решенные уровни. Оно получает своё значение из localStorage.answers, если таковое имеется, или устанавливается в пустой объект {}.
  answers: (localStorage.answers && JSON.parse(localStorage.answers)) || {},
  // solved - свойство, которое хранит массив номеров решенных уровней. Оно получает своё значение из localStorage.solved, если таковое имеется, или устанавливается в пустой массив [].
  solved: (localStorage.solved && JSON.parse(localStorage.solved)) || [],
  // user - свойство, которое хранит имя пользователя. Оно получает своё значение из localStorage.user, если таковое имеется, или устанавливается в пустую строку ''.
  user: localStorage.user || '',
  // changed - свойство, которое используется для отслеживания того, были ли изменены ответы на текущем уровне. Оно устанавливается в false по умолчанию.
  changed: false,

  start: function(){
    // Этот код выполняет две операции с элементами страницы, используя jQuery.
    // Первая операция находит элемент с классом "total" внутри элемента с id "level-counter" и изменяет его текст на длину массива "levels".
    // Вторая операция находит элемент с id "editor" и делает его видимым на странице, если он был скрыт.
    $('#level-counter .total').text(levels.length);
    $('#editor').show();

    // Это часть кода, который генерирует уникальный идентификатор пользователя, если его идентификатор еще не сохранен в localStorage.
    // Когда пользователь заходит на игру в первый раз, у него нет сохраненного идентификатора. 
    // В этом случае код генерирует новый идентификатор, используя текущую дату и случайное число, и сохраняет его в localStorage. 
    // В следующий раз, когда пользователь заходит на игру, код использует сохраненный идентификатор. 
    // Это помогает отслеживать прогресс игрока и сохранять результаты между сеансами игры.
    if (!localStorage.user) {
      game.user = '' + (new Date()).getTime() + Math.random().toString(36).slice(1);
      localStorage.setItem('user', game.user);
    }

    // this.setHandlers(); - устанавливает обработчики событий на элементы игрового поля, такие как клики на клетки, нажатие клавиш и т.д.
    this.setHandlers();
    // this.loadMenu(); - загружает меню игры, которое содержит информацию о текущем уровне и общее количество уровней.
    this.loadMenu();
    // game.loadLevel(levels[game.level]); - загружает текущий уровень, используя массив levels и номер текущего уровня game.level. 
    // Загрузка уровня включает отображение игрового поля, морковей и других элементов уровня, которые игрок должен будет обработать с помощью CSS-свойств.
    game.loadLevel(levels[game.level]);
  },

  setHandlers: function() {
    // Добавляем обработчик событий по клику на элемент с id "next" (на кнопу)
    $('#next').on('click', function() {
      // Фокус на элемент с id "code" (на наш код)
      $('#code').focus();

      // Проверяем отключена ли кнопка
      if ($(this).hasClass('disabled')) {
        // Если не отключена, выполняем метод '.treatment'
        if (!$('.treatment').hasClass('animated')) {
          game.tryagain();
        }
        // Если найден, то выполнение кода прерывается и никаких дополнительных действий не выполняется.
        return;
      }

      // Убираем анимацию
      $(this).removeClass('animated animation');

      // Данный код блокирует обработку событий нажатия на кнопку Next и запускает анимацию исчезновения элемента с классом treatment с использованием эффекта fadeOut() в течение 1 секунды. 
      // После завершения этой анимации, к элементам с классом water и fire добавляется класс correct.
      // Функция fadeOut() скрывает выбранные элементы, изменяя их прозрачность постепенно в течение заданного периода времени и с использованием заданной функции смягчения (в данном случае 'linear', т.е. равномерное изменение). 
      // В данном случае, после завершения анимации, элементы с классами water и fire становятся правильными, что означает, что они были политы водой корректно.
      // Добавление класса correct к этим элементам позволяет визуально отобразить правильность ответа пользователя. 
      // В дальнейшем это может использоваться для вычисления баллов и оценки прохождения уровня игры.
      $('.treatment').fadeOut(1000, 'linear', function() {
        $('.water, .fire').addClass('correct');
      });

      // Добавляем к элементам класс 'disabled'
      $('.arrow, #next').addClass('disabled');

      // после того, как игрок завершает текущий уровень, будет установлена задержка на 2.5 секунды, и затем будет вызвана либо функция game.win() для победы в игре, если это был последний уровень, либо функция game.next() для перехода к следующему уровню, если это не был последний уровень.
      setTimeout(function() {
        if (game.level >= levels.length - 1) {
          game.win();
        } else {
          game.next();
        }
      }, 2500);
    });

    // Этот код добавляет обработчик события "keydown" к элементу с id "code". 
    // Когда пользователь нажимает клавишу на клавиатуре, происходит проверка, является ли код этой клавиши равным 13, что соответствует клавише Enter.
    $('#code').on('keydown', function(e) {
      if (e.keyCode === 13) {

        // Нажата ли одна из следующих клавиш на клавиатуре: Ctrl (Control) или Cmd (Command) для Mac
        if (e.ctrlKey || e.metaKey) {
          // Отменяется стандартное поведение нажатия клавиши
          e.preventDefault();
          // Запускается проверка кода, который написал пользователь
          game.check();
          $('#next').click();
          // Оператор завершает работу функции, предотвращая выполнение любых других действий.
          return;
        }

        // Размер строки для ввода кода?
        var max = $(this).data('lines');
        // Данный код получает значение (текст) из элемента <textarea> с помощью метода val() библиотеки jQuery, который возвращает значение атрибута value элемента формы, и сохраняет его в переменной code. 
        // Это нужно для дальнейшей обработки текста в редакторе кода.
        var code = $(this).val();
        // trim() удаляет пробелы в начале и конце строки, которые могут быть случайно добавлены при копировании и вставке кода, а затем сохраняет "очищенный" код в переменную trim.
        var trim = code.trim();
        // переменная codeLength будет содержать количество строк в тексте code.
        var codeLength = code.split('\n').length;
        // Эта строка кода создает переменную trimLength, которая содержит количество строк кода без учета пустых строк в начале и конце.
        // Для этого сначала мы используем метод trim() для удаления всех пустых символов в начале и конце строки code. 
        // Затем мы используем метод split('\n'), чтобы разделить код на строки, используя символ новой строки \n в качестве разделителя. 
        // Метод split() возвращает массив строк, и мы используем свойство length этого массива, чтобы получить количество строк кода без учета пустых строк в начале и конце.
        var trimLength = trim.split('\n').length;

        // Данное условие проверяет, что количество строк в тексте, введенном пользователем, не превышает заданный максимум (который находится в max). 
        if (codeLength >= max) {

          if (codeLength === trimLength) {
            e.preventDefault();
            $('#next').click();
          } else {
            $('#code').focus().val('').val(trim);
          }
        }
      }
      
    })
    // Этот код добавляет два обработчика событий "input" к полю ввода с кодом.
    // Первый обработчик использует функцию debounce, чтобы отложить вызов функции game.check на 200 миллисекунд после последнего изменения в поле ввода.
    // Это означает, что если пользователь быстро печатает в поле ввода, функция game.check не будет вызываться на каждую введенную букву, а только после некоторой задержки после последнего ввода.
    // Второй обработчик устанавливает значение свойства game.changed в true и добавляет класс "disabled" к кнопке "Next", чтобы заблокировать ее, пока пользователь не изменит код.
    .on('input', game.debounce(game.check, 200))
    .on('input', function() {
      game.changed = true;
      $('#next').removeClass('animated animation').addClass('disabled');
    });

    // В частности, $('#editor') выбирает элемент на странице с идентификатором editor, а затем метод .on() добавляет обработчик событий на указанное событие - в данном случае, окончание анимации.
    // 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend' - это строка, содержащая список имен событий окончания анимации, разделенных пробелами, так как различные браузеры могут использовать разные префиксы для своих имен событий.
    $('#editor').on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      // Когда событие окончания анимации происходит, функция обработчика вызывается, и $(this).removeClass(); удаляет все классы CSS анимации у элемента, на который был применен метод .on().
      $(this).removeClass();
    });

    // $('#labelReset').on('click', function() {
    //   var warningReset = messages.warningReset[game.language] || messages.warningReset.en;
    //   var r = confirm(warningReset);

    //   if (r) {
    //     game.level = 0;
    //     game.answers = {};
    //     game.solved = [];
    //     game.loadLevel(levels[0]);

    //     $('.level-marker').removeClass('solved');
    //   }
    // });

    // $('#language .toggle').on('click', function() {
    //   $('#levelsWrapper').hide();
    //   $('#language .tooltip').toggle();
    // });

    $('body').on('click', function() {
      $('.tooltip').hide();
    });

    $('.tooltip, .toggle, #level-indicator').on('click', function(e) {
      e.stopPropagation();
    });

    // Обработчик события сохраняет ответы пользователя и номер текущего уровня игры в локальное хранилище браузера (используя метод localStorage.setItem()). 
    // Таким образом, при следующем посещении страницы пользователь сможет продолжить игру с того места, где остановился.
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!ЭТО В ПРИНЦИПЕ МОЖНО И НА БД ЗАМЕНИТЬ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


    $(window).on('beforeunload', function() {
      game.saveAnswer();
      localStorage.setItem('level', game.level);
      localStorage.setItem('answers', JSON.stringify(game.answers));
      localStorage.setItem('solved', JSON.stringify(game.solved));
    })
  },
  
  // Метод prev позволяет перейти к предыдущему уровню в игре.
  prev: function() {
    this.level--;

    var levelData = levels[this.level];
    this.loadLevel(levelData);
  },
  
  // В функции next() значение свойства level увеличивается на единицу, затем загружается уровень с помощью метода loadLevel() с передачей в качестве параметра объекта данных для следующего уровня из массива levels.
  next: function() {
    this.level++;

    var levelData = levels[this.level];
    this.loadLevel(levelData);
  },
  
    loadMenu: function() {
      levels.forEach(function(level, i) {
        var levelMarker = $('<span/>').addClass('level-marker').attr({'data-level': i, 'title': level.name}).text(i+1);
  
        // Эта строка проверяет, если уровень уже был решен (имя уровня есть в массиве game.solved), и если да, то добавляет класс "solved" к маркеру уровня (levelMarker). 
        // Это позволяет отображать, какие уровни уже были решены пользователем.
        if ($.inArray(level.name, game.solved) !== -1) {
          levelMarker.addClass('solved');
        }
  
        levelMarker.appendTo('#levels');
      });
  
      $('.level-marker').on('click', function() {
        game.saveAnswer();
  
        var level = $(this).attr('data-level');
        game.level = parseInt(level, 10);
        game.loadLevel(levels[level]);
      });
  
      $('#level-indicator').on('click', function() {
        // $('#language .tooltip').hide();
        $('#levelsWrapper').toggle();
      });
  
      $('.arrow.left').on('click', function() {
        if ($(this).hasClass('disabled')) {
          return;
        }
  
        game.saveAnswer();
        game.prev();
      });
  
      $('.arrow.right').on('click', function() {
        if ($(this).hasClass('disabled')) {
          return;
        }
  
        game.saveAnswer();
        game.next();
      });
    },
  
    loadLevel: function(level) {
      $('#editor').show();
      $('#elements, #table').removeClass().attr('style', '').empty();
      $('#surface, #overlay').removeClass().attr('style', '');
      $('#levelsWrapper').hide();
      $('.level-marker').removeClass('current').eq(this.level).addClass('current');
      $('#level-counter .current').text(this.level + 1);
      $('#before').text(level.before);
      $('#after').text(level.after);
      $('#next').removeClass('animated animation').addClass('disabled');
  
      var instructions = level.instructions || level.instructions;
      $('#instructions').html(instructions);
  
      $('.arrow.disabled').removeClass('disabled');
  
      if (this.level === 0) {
        $('.arrow.left').addClass('disabled');
      }
  
      if (this.level === levels.length - 1) {
        $('.arrow.right').addClass('disabled');
      }
  
      var answer = game.answers[level.name];
      $('#code').val(answer).focus();
  
      this.loadDocs();
  
      var lines = Object.keys(level.style).length;
      $('#code').height(20 * lines).data("lines", lines);
  
      var string = level.board;
      var markup = '';
      var colors = {
        'w': 'water',
        'f': 'fire'
      };
  
      for (var i = 0; i < string.length; i++) {
        var c = string.charAt(i);
        var color = colors[c];
  
        var elements = $('<div/>').addClass('elements ' + color).data('color', color);
        var treatment = $('<div/>').addClass('treatment ' + color).data('color', color);
  
        $('<div/>').addClass('bg').appendTo(elements);
        $('<div/>').addClass('bg').appendTo(treatment);
  
        $('#elements').append(elements);
        $('#table').append(treatment);
      }
  
      var classes = level.classes;
  
      if (classes) {
        for (var rule in classes) {
          $(rule).addClass(classes[rule]);
        }
      }
  
      var selector = level.selector || '';
      $('#elements ' + selector).css(level.style);
  
      game.changed = false;
      game.applyStyles();
      game.check();
    },
  
    loadDocs: function() {
      $('#instructions code').each(function() {
        var code = $(this);
        var text = code.text();
  
        if (text in docs) {
          code.addClass('help');
          code.on('mouseenter', function(e) {
            if ($('#instructions .tooltip').length === 0) {
              var html = docs[text] || docs[text];
              var tooltipX = code.offset().left;
              var tooltipY = code.offset().top + code.height() + 13;
              $('<div class="tooltip"></div>').html(html).css({top: tooltipY, left: tooltipX}).appendTo($('#instructions'));
            }
          }).on('mouseleave', function() {
            $('#instructions .tooltip').remove();
          });
        }
      });
    },
  
    applyStyles: function() {
      var level = levels[game.level];
      var code = $('#code').val();
      var selector = level.selector || '';
      $('#table ' +  selector).attr('style', code);
  
      if (!selector) {
        if (code) {
          $('#surface, #overlay').attr('style', code);
        } else {
          $('#surface, #overlay').attr('style', '');
        }
      }
  
      game.saveAnswer();
    },
    
    check: function() {    
      game.applyStyles();
  
      var level = levels[game.level];
      var elements = {};
      var treatments = {};
      var correct = true;
  
      $('.treatment').each(function() {
        var position = {};
  
        position.top = Math.round(this.getBoundingClientRect().top);
        position.left = Math.round(this.getBoundingClientRect().left);
        position.width = Math.floor(parseFloat(window.getComputedStyle(this).width));
        position.height = Math.floor(parseFloat(window.getComputedStyle(this).height));
  
        var key = JSON.stringify(position);
        var val = $(this).data('color');
        treatments[key] = val;
      });
  
      $('.elements').each(function() {
        var position = {};
  
        position.top = Math.round(this.getBoundingClientRect().top);
        position.left = Math.round(this.getBoundingClientRect().left);
        position.width = Math.floor(parseFloat(window.getComputedStyle(this).width));
        position.height = Math.floor(parseFloat(window.getComputedStyle(this).height));
  
        var key = JSON.stringify(position);
        var val = $(this).data('color');
  
        if (!(key in treatments) || treatments[key] !== val) {
          correct = false;
        }
      });
  
      if (correct) {
        ga('send', {
          hitType: 'event',
          eventCategory: level.name,
          eventAction: 'correct',
          eventLabel: $('#code').val()
        });
              
        if ($.inArray(level.name, game.solved) === -1) {
          game.solved.push(level.name);
        }
  
        $('[data-level=' + game.level + ']').addClass('solved');
        $('#next').removeClass('disabled').addClass('animated animation');
      } else {
        ga('send', {
          hitType: 'event',
          eventCategory: level.name,
          eventAction: 'incorrect',
          eventLabel: $('#code').val()
        });
      }
    },
  
    saveAnswer: function() {
      var level = levels[this.level];
      game.answers[level.name] = $('#code').val();
    },
  
    tryagain: function() {
      $('#editor').addClass('animated shake');
    },
  
    win: function() {
      var solution = $('#code').val();
  
      this.loadLevel(levelWin);
  
      $('#editor').hide();
      $('#code').val(solution);
      $('#share').show();
    },
  
    transform: function() {
      var scale = 1 + ((Math.random() / 5) - 0.2);
      var rotate = 360 * Math.random();
      scale = 1;
      rotate = 0;
  
      return {'transform': 'scale(' + scale + ') rotate(' + rotate + 'deg)'};
    },
  
    debounce: function(func, wait, immediate) {
      var timeout;
      return function() {
        var context = this, args = arguments;
        var later = function() {
          timeout = null;
          if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
      };
    }
  };
  
  $(document).ready(function() {
    game.start();
  
    var d = document.documentElement.style;
  
    // if (!('gridArea' in d)) {
    //   var warning = messages.warningUnsupported[game] || messages.warningUnsupported;
    //   $('#editor, #level-counter, #instructions').hide();
    //   $('<div>' + warning + '</div>').insertAfter($('#editor'));
    // }
  });
  