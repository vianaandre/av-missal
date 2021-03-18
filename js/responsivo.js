function responsiva_home(param, img1, img2) {
    const tamanha_tela = window.innerWidth
    const img_um = document.querySelector(param)
    const img_dois = document.querySelector(param)

    const imagem = tamanha_tela <= 767 ? img_um.src = img1 : img_dois.src = img2

    return imagem
}
responsiva_home('#img_grupos', '../img/home/foto-grupos-home-mobile.jpg', '../img/home/foto-grupos-home.jpg')
responsiva_home('#vetor_sermoes', '../img/vetor/face-mobile.svg', '../img/vetor/face.svg')