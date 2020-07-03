const toggleMenuElem = document.getElementById('toggleMenu');

const checkRotate = () => {
    if(toggleMenuElem.childNodes[1].style.transform === 'rotate(180deg)') {
        toggleMenuElem.childNodes[1].style.transform = 'rotate(0deg)'
    }
    else {
        toggleMenuElem.childNodes[1].style.transform = 'rotate(180deg)';
    }
}

document.getElementById('toggleMenu').addEventListener('click', (event) => {
    if(document.getElementById('navMenu').style.left === "-40px") {
        document.getElementById('navMenu').style.left = `-200px`;
        toggleMenuElem.style.backgroundColor = '#fff';
        checkRotate();
    } else {
        document.getElementById('navMenu').style.left = `-40px`;
        toggleMenuElem.style.backgroundColor = '#ccc';
        checkRotate();
    }
})