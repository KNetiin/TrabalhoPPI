$(document).ready(() => {

  /*************************************************** FUNÇÕES DO STEPPER ***************************************************/

  // QUANDO O MOUSE ESTIVER EM CIMA DO HEADER, SEU FUNDO ESCURECE PARA DAR NOÇÃO DE SER CLICÁVEL
  $(".stepHeader").hover(function() {
      $(this).css("background-color", "#eee")
    }, function() {
      $(this).css("background-color", "#f8f8f8")
    }
  )
})
