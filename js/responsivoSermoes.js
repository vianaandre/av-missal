function responsiva_sermoes(param, img1, img2) {
    const tamanha_tela = window.innerWidth
    const img_um = e => e.src = img1
    const img_dois = e => e.src = img2
    const tag_img = document.querySelectorAll(param)

    const imagem = tamanha_tela <= 767 ? tag_img.forEach(img_um) : tag_img.forEach(img_dois)
}
responsiva_sermoes('.icn_sermoes', '../img/vetor/face-mobile.svg', '../img/vetor/face.svg')
