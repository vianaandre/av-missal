function menu_active () {
    const active = document.getElementById('active')

    active.classList.toggle('menu_active')
}
document.getElementById('toogle_menu').addEventListener('click', menu_active)

