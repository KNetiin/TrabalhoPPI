$(document).ready(() => {
    /************************************************** FUNÇÕES PARA ALTERNAR **************************************************/
    let showFormProperty = () => {
        $("#propertiesListDiv").hide("fast")
        $("#PropertyFormDiv").show("fast")
        localStorage.setItem('formOrList', "form")
    }

    let showListProperty = () => {
        $("#propertiesListDiv").show("fast")
        $("#propertyFormDiv").hide("fast")
        localStorage.setItem('formOrList', "list")
    }

    $("#button-properties-list").click(showFormProperty)

    let formOrList = localStorage.getItem("formOrList")

    if (formOrList === "form") {
        showFormProperty()
    }
    /*************************************************** FUNÇÕES DO STEPPER ***************************************************/
    // INDICA QUAL É O STEP A SER MOSTRADO
    let step = 0

    // MOSTRA SOMENTE STEP INITIAL
    let showInitialStepProperty = () => {
        step = 0
        $("#initial-property-form").show("fast")
        $("#property-property-form").hide("fast")
        $("#location-property-form").hide("fast")
        $("#images-property-form").hide("fast")
        $("#next-property-form").show("fast")
        $("#save-property-form").hide("fast")
        $("#back-property-form").hide("fast")
    }

    // MOSTRA SOMENTE STEP PROPERTY
    let showPropertyStepProperty = () => {
        step = 1
        $("#initial-property-form").hide("fast")
        $("#property-property-form").show("fast")
        $("#location-property-form").hide("fast")
        $("#images-property-form").hide("fast")
        $("#back-property-form").show("fast")
        $("#next-property-form").show("fast")
        $("#save-property-form").hide("fast")
    }

    // MOSTRA SOMENTE STEP LOCATION
    let showLocationStepLocation = () => {
        step = 2
        $("#initial-property-form").hide("fast")
        $("#property-property-form").hide("fast")
        $("#location-property-form").show("fast")
        $("#images-property-form").hide("fast")
        $("#back-property-form").show("fast")
        $("#next-property-form").show("fast")
        $("#save-property-form").hide("fast")
    }

    // MOSTRA SOMENTE STEP PROFESSIONAL
    let showImagesStepLocation = () => {
        step = 3
        $("#initial-property-form").hide("fast")
        $("#property-property-form").hide("fast")
        $("#location-property-form").hide("fast")
        $("#images-property-form").show("fast")
        $("#back-property-form").show("fast")
        $("#next-property-form").hide("fast")
        $("#save-property-form").show("fast")
    }

    // RESPONSÁVEL POR PASSAR O STEPPER PARA TRÁS
    let backStepProperty = () => {
        if (step === 1) {
            showInitialStepProperty()
        } else if (step === 2) {
            showPropertyStepProperty()
        } else if (step === 3) {
            showLocationStepLocation()
        }
    }

    // RESPONSÁVEL POR PASSAR O STEPPER PARA FRENTE
    let nextStepProperty = () => {
        if (step === 0) {
            showPropertyStepProperty()
        } else if (step === 1) {
            showLocationStepLocation()
        } else if (step === 2) {
            showImagesStepLocation()
        }
    }

    $("#button-property-back").click(backStepProperty)
    $("#button-property-next").click(nextStepProperty)
    $("#button-property-save").click(showListProperty)

    // ADICIONANDO EVENTO PARA CADA HEADER DO STEPPER
    $("#initial-property-header").click(showInitialStepProperty)
    $("#property-property-header").click(showPropertyStepProperty)
    $("#location-property-header").click(showLocationStepLocation)
    $("#images-property-header").click(showImagesStepLocation)

})
