var i = 0
const idLinks = document.querySelectorAll('.links-relative #links-secao')
const max = idLinks.length

function nextLinks () {
    idLinks[i].classList.remove('select-opac-um')
    i++
    if(i > (max - 1)) {
        i = 0
    }
    idLinks[i].classList.add('select-opac-um')
}
function prevLinks () {
    idLinks[i].classList.remove('select-opac-um')
    if(i == 0) {
        i = max
    }
    idLinks[--i].classList.add('select-opac-um')
}

document.getElementById('direiraSeta').addEventListener('click', nextLinks)
document.getElementById('esquerdaSeta').addEventListener('click', prevLinks)