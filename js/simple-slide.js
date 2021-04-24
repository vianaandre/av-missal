let time = 7000, 
i = 0, 
img = document.querySelectorAll('.slide'), 
max = img.length

const style = img[0].style
style.background = 'url("img/home/bg-intro-home.jpg") no-repeat center'
style.backgroundSize = 'cover'
const styleDois = img[1].style
styleDois.background = 'url("img/home/bg-intro-home-2.jpg") no-repeat center'
styleDois.backgroundSize = 'cover'
const styleTres = img[2].style
styleTres.background = 'url("img/home/bg-intro-home-3.jpg") no-repeat center'
styleTres.backgroundSize = 'cover'

function nextSlides() {
    img[i].classList.remove('select')
    i++ 
    if(i > (max - 1)) {
        i = 0
    }
    img[i].classList.add('select')
}

function start () {
    setInterval( () => {
        nextSlides()
    }, time)
}

window.addEventListener('load', start)

// exportar
