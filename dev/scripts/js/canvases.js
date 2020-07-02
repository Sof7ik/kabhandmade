const messageElem = document.querySelector('div.messages');
class MyError {
    constructor (message)
    {
        messageElem.insertAdjacentHTML('beforeend', 
        `
        <div class="message">
            <span class="material-icons">error_outline</span>
            <p>${message}</p>
        </div>
        `)
        messageElem.style.display = 'flex';
        messageElem.style.padding = '5px 25px 5px 5px';

        document.querySelector('div.messages > span.close').addEventListener('click', this.closeErrorsWindow)
    }

    closeErrorsWindow () {
        if (messageElem) {
            messageElem.style.display = 'none';
            document.querySelectorAll('div.messages div.message').forEach( (elem) => {
                elem.remove();
            })
        }
        document.querySelector('div.messages > span.close').removeEventListener('click', this.closeErrorsWindow)
    }
}

// const centerImage = document.querySelector('img.example-kozhzam');

const canvasCenterElem = document.getElementById('canvasCenter');
const canvasSidesElem = document.getElementById('canvasSides');

const canvasCenter = canvasCenterElem.getContext('2d');
canvasCenter.beginPath();
//приезжаем в начало
canvasCenter.moveTo(105, 4);
//вниз
canvasCenter.lineTo(100, 150);
// вправо
canvasCenter.lineTo(215, 150);
//вверх
canvasCenter.lineTo(200, 4);
//в начало
canvasCenter.quadraticCurveTo(150, -2, 105, 4);

// canvasCenter.stroke();

//=======
const canvasSides = canvasSidesElem.getContext('2d');
//приезжаем в начало
canvasSides.moveTo(200, 4);
canvasSides.quadraticCurveTo(205, 4, 249, 25);
canvasSides.quadraticCurveTo(170, 40, 236, 75);
canvasSides.quadraticCurveTo(250, 80, 280, 85);

canvasSides.lineTo(245, 150);
canvasSides.lineTo(215, 150);
canvasSides.lineTo(200, 4);

canvasSides.moveTo(100, 150);
canvasSides.lineTo(56, 150);
canvasSides.lineTo(25, 85);

canvasSides.quadraticCurveTo(43, 85, 80, 70);
canvasSides.quadraticCurveTo(100, 60, 100, 50);
canvasSides.quadraticCurveTo(100, 40, 80, 30);
canvasSides.quadraticCurveTo(70, 25, 55, 25);
canvasSides.quadraticCurveTo(75, 10, 110, 3);
canvasSides.lineTo(100, 150);
canvasSides.closePath();

// canvasSides.stroke();

// ---------------------------------------------------------------------------------------------
// Обработка парметров

//чекбоксы стартового номера, логотипа мотоцикла
const checkBoxes = document.querySelectorAll('.input-for-hidden');

const checkNumber = (event) => {
    if ( (/\D/ig.exec(event.target.value)) )
    {
        new MyError('Введен недопустимый символ');
        event.target.value = event.target.value.slice(0, -1)
    }
}

const checkLogoName = (event) => {
    if ( (/\d/ig.exec(event.target.value)) )
    {
        new MyError('Введен недопустимый символ');
        event.target.value = event.target.value.slice(0, -1)
    }
}

//если checked - показываем инпут для ввода марки мота или номера
checkBoxes.forEach(elem => {
    elem.addEventListener('change', (event) => {
        if(event.target.checked)
        {
            if(event.target.id === 'places__start-number') 
            {
                document.getElementById('example-num').src = './img/render/num.png';
                document.getElementById('places__start-number-hidden-input').addEventListener('input', checkNumber);
            }
            else {
                document.getElementById('places__start-number-hidden-input').removeEventListener('input', checkNumber);
            }

            if(event.target.id === 'places__moto-logo')
            {
                document.getElementById('example-num').src = './img/render/logo-2.png';
                document.getElementById('places__moto-logo-hidden-input').addEventListener('input', checkLogoName);
            }
            else {
                document.getElementById('places__moto-logo-hidden-input').removeEventListener('input', checkLogoName);
            }

            changePrice(500)
            document.getElementById('example-num').style.display = "block";
            document.getElementById(event.target.id + '-hidden-input').style.display = 'block';
        }

        else
        {
            document.getElementById('example-num').style.display = "none";

            changePrice(-500);
            document.getElementById(event.target.id + '-hidden-input').style.display = 'none';
        }
    })
})

// Обработчик мест сиденья

// По клику на определенный параметр:
//      1) Ему накидывается класс 'active';
//      2) берется value из инпута, подставляется как переменная каваса и именно этот канвас перекрашивается;

const paramsRadios = document.querySelectorAll('.param-input');
let currentCanvas;
paramsRadios.forEach( elem => {
    elem.addEventListener('change', event => {

        if(document.querySelector('label.active-param')) {
            document.querySelector('label.active-param').classList.remove('active-param');
        }

        document.querySelector('input#' + elem.id + '+label').classList.add('active-param');

        if (document.querySelector('label.active-param').classList.contains('label-no-active'))
        {
            document.querySelector('div.colors').style.display = 'none';
        }
        else {
            document.querySelector('div.colors').style.display = 'block';
        }

        // это чтобы не выделялись черным стратовый номер и логотип мотоцикла
        // if (!document.querySelector('input#' + elem.id + '+label').classList.contains('label-no-active')) {
        //     document.querySelector('input#' + elem.id + '+label').classList.add('active-param');
        // }

        if(document.getElementById(elem.value) != null)
        {
            currentCanvas = document.getElementById(elem.value).getContext('2d');
            console.log('currentCanvas -', document.getElementById(elem.value));
        }
    })
    
})

//=======================================================================
//тут мы обрабатываем активный цвет.
const colorsElems = document.querySelectorAll('div.colors > div div');

colorsElems.forEach( (elem) => {
    elem.addEventListener('click', (event) => {
        // чтобы не было ошибки при запуске, т.к. изначально ни один цвет не выбран.
        if(document.querySelector('div.color.active-color'))
        {
            document.querySelector('div.color.active-color').classList.remove('active-color');
        }

        // при нажатии на див с цветом ему накидывается класс активного, там scale() и outline.
        // event.target.classList.add('active-color');

        //переменная, в которую записывается значение bgColor активного цвета(дива)
        let newColor = event.target.style.backgroundColor;

        //заливаем канвас
        if(currentCanvas !== undefined)
        {
            event.target.classList.add('active-color');
            currentCanvas.fillStyle = newColor;
            currentCanvas.clearRect(0, 0, 500, 500);
            currentCanvas.fill();
        } else {
            new MyError('Выберите положение')
            
            // console.warn('Выберите положение');
        }
        
        // это для верхних параметров - потом мб дополню на дополнительные
        // если выбран параметр, меняем цвет левого дива
        // БЕЗ ПРОВЕРКИ НЕ РАБОТАЕТ, ПОТОМУ ЧТО ЕСЛИ НЕ ВЫБРАНО, ТО НЕТ label.active-param
        if(document.querySelector('label.active-param > div > div.param-color'))
        {
            document.querySelector('label.active-param > div > div.param-color').style.background = newColor;
        }
        
    })
})

const changeExtSidesColor = (event) => {
    if (event.target.classList.contains('color') && document.getElementById('example-ext-sides'))
    {
        document.getElementById('example-ext-sides').src = `./img/render/ext-sides/ext-sides-${event.target.style.backgroundColor}.png`;
    }
}

const changeRibbonsColor = (event) => {
    if (event.target.classList.contains('color') && document.getElementById('example-ribbons'))
    {
        // document.getElementById('example-ext-sides').src = `./img/render/ext-sides/ext-sides-${event.target.style.backgroundColor}.png`;
        // console.log('img changed');
        ribbonsColor = event.target.style.backgroundColor;
        changeRibbonsImage('', ribbonsColor);
    }
}
console.log(document.querySelectorAll('input[type="radio"].param-input'));
document.querySelectorAll('input[type="radio"].param-input').forEach( (elem)=> {
    elem.addEventListener('change', (event) => {
        target = event.target;

        if (document.getElementById('places__radio-ribbons').checked)
        {
            // console.log('checked ribbons');

            document.querySelector('div.color.colors__white').style.display = 'block';
            document.querySelector('div.color.colors__black').style.display = 'none';

            document.querySelectorAll('div.colors > div').forEach( (colorElem) => {
                colorElem.removeEventListener('click', changeExtSidesColor);
                colorElem.addEventListener('click', changeRibbonsColor);
            })
        }

        if (document.getElementById('places__radio-extSides').checked) 
        {
            // console.log('checked ext sides');
            document.querySelector('div.color.colors__black').style.display = 'block';
            document.querySelector('div.color.colors__white').style.display = 'none';
            document.querySelectorAll('div.colors > div').forEach( (colorElem) => {
                colorElem.removeEventListener('click', changeRibbonsColor);
                colorElem.addEventListener('click', changeExtSidesColor);
            })
        }

        if (
            document.getElementById('places__radio-center').checked ||
            document.getElementById('places__radio-sides').checked ||
            document.getElementById('places__radio-number').checked ||
            document.getElementById('places__radio-logo').checked
        ) {

            document.querySelector('div.color.colors__black').style.display = 'block';
            document.querySelector('div.color.colors__white').style.display = 'block';

            document.querySelectorAll('div.colors > div').forEach( (colorElem) => {
                colorElem.removeEventListener('click', changeExtSidesColor);
                colorElem.removeEventListener('click', changeRibbonsColor);
            })
        }
    })
})

setInterval(() => {
    if (document.querySelector('div.messages')) {

        if (document.querySelectorAll('div.messages div.message').length === 1) {
            messageElem.style.display = 'none';
        }
    
        if (document.querySelector('div.messages div.message:last-child')) {
            document.querySelector('div.messages div.message:last-child').style.minWidth = '0px';
            document.querySelector('div.messages div.message:last-child').remove();
        }
    }
}, 2000)