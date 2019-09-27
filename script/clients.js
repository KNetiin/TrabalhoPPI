$(document).ready(() => {
    /************************************************** FUNÇÕES PARA ALTERNAR **************************************************/
    let showForm = () => {
        $("#clientsListDiv").hide("fast")
        $("#clientFormDiv").show("fast")
        localStorage.setItem('formOrList', "form")
    }

    let showList = () => {
        $("#clientsListDiv").show("fast")
        $("#clientFormDiv").hide("fast")
        localStorage.setItem('formOrList', "list")
    }

    $("#button-clients-list").click(showForm)

    let formOrList = localStorage.getItem("formOrList")

    if (formOrList === "form") {
        showForm()
    }
    /*************************************************** FUNÇÕES DO STEPPER ***************************************************/
    // INDICA QUAL É O STEP A SER MOSTRADO
    let step = 0

    // MOSTRA SOMENTE STEP PERSONAL
    let showPersonalStepClient = () => {
        step = 0
        $("#personal-client-form").show("fast")
        $("#location-client-form").hide("fast")
        $("#additional-client-form").hide("fast")
        $("#next-client-form").show("fast")
        $("#save-client-form").hide("fast")
        $("#back-client-form").hide("fast")
    }

    // MOSTRA SOMENTE STEP LOCATION
    let showLocationStepClient = () => {
        step = 1
        $("#personal-client-form").hide("fast")
        $("#location-client-form").show("fast")
        $("#additional-client-form").hide("fast")
        $("#back-client-form").show("fast")
        $("#next-client-form").show("fast")
        $("#save-client-form").hide("fast")
    }

    // MOSTRA SOMENTE STEP ADDITIONAL
    let showAdditional = () => {
        step = 2
        $("#personal-client-form").hide("fast")
        $("#location-client-form").hide("fast")
        $("#additional-client-form").show("fast")
        $("#back-client-form").hide("fast")
        $("#next-client-form").hide("fast")
        $("#save-client-form").show("fast")
    }

    // RESPONSÁVEL POR PASSAR O STEPPER PARA TRÁS
    let backStep = () => {
        if (step === 1) {
            showPersonalStepClient()
        } else if (step === 2) {
            showLocationStepClient()
        }
    }

    // RESPONSÁVEL POR PASSAR O STEPPER PARA FRENTE
    let nextStep = () => {
        if (step === 0) {
            showLocationStepClient()
        } else if (step === 1) {
            showAdditional()
        }
    }

    $("#button-client-back").click(backStep)
    $("#button-client-next").click(nextStep)
    $("#button-client-save").click(showList)

    // ADICIONANDO EVENTO PARA CADA HEADER DO STEPPER
    $("#personal-client-header").click(showPersonalStepClient)
    $("#location-client-header").click(showLocationStepClient)
    $("#additional-header").click(showAdditional)

    /***************************************************** FUNÇÕES LIST *****************************************************/
    // MOSTRA SOMENTE COLLAPSE LOCATION
    let showLocationCollapseClient = () => {
        $("#location2-collapse").slideToggle("fast")
        $("#additional-collapse").hide("fast")
    }

    // MOSTRA SOMENTE COLLAPSE ADDITIONAL
    let showAdditionalCollapse = () => {
        $("#additional-collapse").slideToggle("fast")
        $("#location2-collapse").hide("fast")
    }

    // ADICIONANDO EVENTO PARA CADA HEADER DO CARD
    $("#location2-collapse-header").click(showLocationCollapseClient)
    $("#additional-collapse-header").click(showAdditionalCollapse)
})
