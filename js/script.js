// chamando o simpleAnime
if(window.SimpleAnime) {
    new SimpleAnime()
}
// chamando o simpleForm 
if(window.SimpleForm) {
    new SimpleForm({
        form: '.formphp',
        button: '#enviar',
        erro: '<div class="form_erro"><h2>Erro no Envio</h2><p>Um erro houve no envio do formulário, tente entrar em contato com nós pelo email ...</p></div>',
        sucesso:'<div class="form_sucesso"><h2>Formulário enviado com Sucesso</h2><p>Em breve entraremos em contato, fique no aguardo!!!</p></div>',
    })
}



