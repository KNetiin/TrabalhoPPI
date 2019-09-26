$(document).ready(() => {
  // MOSTRA SOMENTE COLLAPSE LOCATION
  let showLocation = () => {
    $("#location2-collapse").slideToggle("fast")
    $("#professional-collapse").hide("fast")
  }

  // MOSTRA SOMENTE COLLAPSE ADDITIONAL
  let showProfessional = () => {
    $("#professional-collapse").slideToggle("fast")
    $("#location2-collapse").hide("fast")
  }

  // ADICIONANDO EVENTO PARA CADA HEADER DO CARD
  $("#location2-collapse-header").click(showLocation)
  $("#professional-collapse-header").click(showProfessional)
})
