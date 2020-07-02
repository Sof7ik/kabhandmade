let price = 0;

function changePrice(priceChange)
{
    price += priceChange;
    document.querySelector('p.price > span').textContent = price;
}

changePrice(1000);

// чекбоксы на лого мотоцикла и стартовый номер. Если что-то чекнтуто, то выбираем все, кроме этого 
// и пихаем ему атрибут disabled. Если убираем check с чекбокса, то атрибуты со всех чекбоксов удаляем
document.querySelectorAll('input.canDisabled').forEach( elem => {
    elem.addEventListener('change', event => {
        if (elem.checked)
        {
            document.querySelectorAll('input.canDisabled').forEach(element => {
                if (element !== elem)
                {
                    element.setAttribute('disabled', 'disabled');
                }
            });
        }
        else
        {
            document.querySelectorAll('input.canDisabled').forEach( element => {
                element.removeAttribute('disabled');
            })
        }
    })
})

//======== Обработка чекбоксов на доп. параметрах

// обработка антискользящих полос
let selectPosition;
let selectType;
let ribbonsColor = 'yellow';

const changeRibbonsImage = (event, color = ribbonsColor) => {
    
    // в этой функции мы получаем текущие <option> в двух селектах
    const getCurrentValue = element => {
        if(element)
        {
            return element.options[element.options.selectedIndex].value;
        }
    }

    // в эту функцию передаем селекты, в которых нужно узнать текущие <option> и все возможные комбинации полос по расположению и форме
    const checkPositionAndType = (selectPosition, selectType, position, type) => {
        if (getCurrentValue(selectPosition) === position && getCurrentValue(selectType) === type)
        {
            document.getElementById('example-ribbons').src = `./img/render/ribbons/${position}/${type}/${color}.png`;
        }
    }

    checkPositionAndType(selectPosition, selectType, 'all', 'fabric', ribbonsColor);
    checkPositionAndType(selectPosition, selectType, 'all', 'rubber-arrow', ribbonsColor);
    checkPositionAndType(selectPosition, selectType, 'all', 'rubber-circle', ribbonsColor);
    checkPositionAndType(selectPosition, selectType, 'all', 'rubber-rhombus', ribbonsColor);

    checkPositionAndType(selectPosition, selectType, 'back', 'fabric', ribbonsColor);
    checkPositionAndType(selectPosition, selectType, 'back', 'rubber-arrow', ribbonsColor);
    checkPositionAndType(selectPosition, selectType, 'back', 'rubber-circle', ribbonsColor);
    checkPositionAndType(selectPosition, selectType, 'back', 'rubber-rhombus', ribbonsColor);
}

// ===== это обработка внутренних чекбоксов на полосках и усиленных боках
document.querySelectorAll('input[type="checkbox"].external-param-checkbox').forEach(checkBox => {
    checkBox.addEventListener('change', event => {
        
        if(event.target.checked){
            if(event.target.id === 'places__ribbons')
            {
                document.getElementById('example-ribbons').style.display = "block";

                changePrice(500);

                // выбираем див с 2-умя селектами
                document.querySelector(`div#${event.target.parentElement.id} + div`).style.display = "block";

                // в selectPosition и selectType записываем селекты
                selectPosition = document.getElementById('hidden-select-ribbons-position');
                selectType = document.getElementById('hidden-select-ribbons-type');
                
                // и накидываем на них listener по change-у
                document.querySelectorAll('#ext-param-ribbons + div.selects').forEach(elem => {
                    elem.addEventListener('change', changeRibbonsImage)
                })
            }

            if(event.target.id === 'places__external-sides')
            {
                document.querySelector('img.example-ext-sides').style.display = "block";
                changePrice(1000);
            }
        }

        else
        {
            if (event.target.id === 'places__ribbons')
            {
                document.getElementById('example-ribbons').style.display = "none";

                changePrice(-500);

                document.querySelector(`div#${event.target.parentElement.id} + div`).style.display = "none";

                document.querySelectorAll('#ext-param-ribbons + div.selects').forEach(elem => {
                    elem.removeEventListener('change', changeRibbonsImage)
                })
            }

            if (event.target.id === 'places__external-sides')
            {
                changePrice(-1000);
                document.querySelector('img.example-ext-sides').style.display = "none";
            }
        }  
    })
})
