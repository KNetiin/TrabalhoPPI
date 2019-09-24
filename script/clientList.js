$(document).ready(() => {
  // ADICIONANDO EVENTO PARA CADA HEADER DO CARD
  $("#location-collapse-header").click(showLocation)
  $("#additional-collapse-header").click(showAdditional)
})

/*************************************************** FUNÇÕES DO CARD ***************************************************/
// MOSTRA SOMENTE COLLAPSE LOCATION
let showLocation = () => {
  $("#location-collapse").slideToggle("fast")
  $("#additional-collapse").hide("fast")
}

// MOSTRA SOMENTE COLLAPSE ADDITIONAL
let showAdditional = () => {
  $("#additional-collapse").slideToggle("fast")
  $("#location-collapse").hide("fast")
}
/**************************************************************************************************************************/
