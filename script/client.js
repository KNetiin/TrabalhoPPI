$(document).ready(() => {
  // MOSTRAR INICIALMENTE O STEP PERSONAL
  showPersonal()

  // ADICIONANDO EVENTO PARA CADA HEADER DO STEPPER
  $("#personal-header").click(showPersonal)
  $("#location-header").click(showLocation)
  $("#additional-header").click(showAdditional)
})

/*************************************************** FUNÇÕES DO STEPPER ***************************************************/
// INDICA QUAL É O STEP A SER MOSTRADO
let step = 0

// MOSTRA SOMENTE STEP PERSONAL
let showPersonal = () => {
  step = 0
  $("#personal").show("fast")
  $("#location").hide("fast")
  $("#additional").hide("fast")
  $("#next").show("fast")
  $("#save").hide("fast")
  $("#back").hide("fast")
}

// MOSTRA SOMENTE STEP LOCATION
let showLocation = () => {
  step = 1
  $("#personal").hide("fast")
  $("#location").show("fast")
  $("#additional").hide("fast")
  $("#back").show("fast")
  $("#next").show("fast")
  $("#save").hide("fast")
}

// MOSTRA SOMENTE STEP ADDITIONAL
let showAdditional = () => {
  step = 2
  $("#personal").hide("fast")
  $("#location").hide("fast")
  $("#additional").show("fast")
  $("#back").hide("fast")
  $("#next").hide("fast")
  $("#save").show("fast")
}

// RESPONSÁVEL POR PASSAR O STEPPER PARA FRENTE
let nextStep = () => {
  if (step === 0) {
    showLocation()
  } else if (step === 1) {
    showAdditional()
  }
}

// RESPONSÁVEL POR PASSAR O STEPPER PARA TRÁS
let backStep = () => {
  if (step === 1) {
    showPersonal()
  } else if (step === 2) {
    showLocation()
  }
}
/**************************************************************************************************************************/
