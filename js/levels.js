var levels = [
    {
      name: 'grid-column-start 1',
      instructions: '<p>Алхимия - это увлекательная игра и отличный способ изучения CSS Grid, который позволит получить практический опыт работы с этим мощным инструментом в интересной и захватывающей форме. Вам предстоит создавать различные элементы, используя свойства CSS Grid.</p>',
      board: 'w',
      selector: '> :nth-child(1)',
      style: {'grid-column-start': '3'},
      before: "#table {\n  display: grid;\n  grid-template-columns: repeat(5, 20%);\n  grid-template-rows: repeat(4, 25%);\n}\n\n#water {\n",
      after: "}"
    },
    {
        name: 'color',
        instructions: '<p>Сосу пока</p>',
        board: 'w',
        selector: '> :nth-child(1)',
        style: {'background-color': 'brown'},
        before: "#table {\n  display: grid;\n  grid-template-columns: repeat(5, 20%);\n  grid-template-rows: repeat(4, 25%);\n}\n\n#fair {\n",
        after: "}"
      },
    {
        name: 'grid-column-start 2',
        instructions: '<p>Конечная, выходим</p>',
        board: 'w',
        selector: '> :nth-child(1)',
        style: {'grid-column-start': '5'},
        before: "#table {\n  display: grid;\n  grid-template-columns: repeat(5, 20%);\n  grid-template-rows: repeat(4, 25%);\n}\n\n#steam {\n",
        after: "}"
      },
];

  
  var levelWin = {
    name: 'win',
    instructions: '<p>Вы победили!</p>',
    board: '',
    classes: {'#table, #elements, #overlay': 'win'},
    style: {},
    before: "#pond {\n  display: flex;\n",
    after: "}"
  };