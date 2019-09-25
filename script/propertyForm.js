$(document).ready(() => {
  // MOSTRAR INICIALMENTE O STEP PERSONAL
  showInitial()

  // ADICIONANDO EVENTO PARA CADA HEADER DO STEPPER
  $("#initial-header").click(showInitial)
  $("#property-header").click(showProperty)
  $("#location-header").click(showLocation)
})

/*************************************************** FUNÇÕES DO STEPPER ***************************************************/
// INDICA QUAL É O STEP A SER MOSTRADO
let step = 0

// MOSTRA SOMENTE STEP INITIAL
let showInitial = () => {
  step = 0
  $("#initial").show("fast")
  $("#property").hide("fast")
  $("#location").hide("fast")
  $("#next").show("fast")
  $("#save").hide("fast")
  $("#back").hide("fast")
}

// MOSTRA SOMENTE STEP PROPERTY
let showProperty = () => {
  step = 1
  $("#initial").hide("fast")
  $("#property").show("fast")
  $("#location").hide("fast")
  $("#back").show("fast")
  $("#next").show("fast")
  $("#save").hide("fast")
}

// MOSTRA SOMENTE STEP LOCATION
let showLocation = () => {
  step = 2
  $("#initial").hide("fast")
  $("#property").hide("fast")
  $("#location").show("fast")
  $("#back").hide("fast")
  $("#next").hide("fast")
  $("#save").show("fast")
}

// RESPONSÁVEL POR PASSAR O STEPPER PARA FRENTE
let nextStep = () => {
  if (step === 0) {
    showProperty()
  } else if (step === 1) {
    showLocation()
  }
}

// RESPONSÁVEL POR PASSAR O STEPPER PARA TRÁS
let backStep = () => {
  if (step === 1) {
    showInitial()
  } else if (step === 2) {
    showProperty()
  }
}
/**************************************************************************************************************************/
