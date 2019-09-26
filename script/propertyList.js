$(document).ready(() => {
  // MOSTRA SOMENTE COLLAPSE LOCATION
  let showLocation = () => {
    $("#location3-collapse").slideToggle("fast")
    $("#property-collapse").hide("fast")
  }

  // MOSTRA SOMENTE COLLAPSE ADDITIONAL
  let showProperty = () => {
    $("#property-collapse").slideToggle("fast")
    $("#location3-collapse").hide("fast")
  }

  // ADICIONANDO EVENTO PARA CADA HEADER DO CARD
  $("#location3-collapse-header").click(showLocation)
  $("#property-collapse-header").click(showProperty)
})
