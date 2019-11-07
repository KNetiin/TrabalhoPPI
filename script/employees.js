$(document).ready(() => {
    /************************************************** FUNÇÕES PARA ALTERNAR **************************************************/
    let showForm = () => {
        $("#employeesListDiv").hide("fast")
        $("#employeeFormDiv").show("fast")
        localStorage.setItem('formOrList', "form")
    }

    let showList = () => {
        $("#employeesListDiv").show("fast")
        $("#employeeFormDiv").hide("fast")
        localStorage.setItem('formOrList', "list")
    }

    $("#button-employees-list").click(showForm)

    let formOrList = localStorage.getItem("formOrList")

    if (formOrList === "form") {
        showForm()
    }
    /*************************************************** FUNÇÕES DO STEPPER ***************************************************/
    // INDICA QUAL É O STEP A SER MOSTRADO
    let step = 0

    // MOSTRA SOMENTE STEP PERSONAL
    let showPersonalStepEmployee = () => {
        step = 0
        $("#personal-employee-form").show("fast")
        $("#location-employee-form").hide("fast")
        $("#professional-employee-form").hide("fast")
        $("#next-employee-form").show("fast")
        $("#save-employee-form").hide("fast")
        $("#back-employee-form").hide("fast")
    }

    // MOSTRA SOMENTE STEP LOCATION
    let showLocationStepEmployee = () => {
        step = 1
        $("#personal-employee-form").hide("fast")
        $("#location-employee-form").show("fast")
        $("#professional-employee-form").hide("fast")
        $("#back-employee-form").show("fast")
        $("#next-employee-form").show("fast")
        $("#save-employee-form").hide("fast")
    }

    // MOSTRA SOMENTE STEP PROFESSIONAL
    let showProfessionalStepEmployee = () => {
        step = 2
        $("#personal-employee-form").hide("fast")
        $("#location-employee-form").hide("fast")
        $("#professional-employee-form").show("fast")
        $("#back-employee-form").show("fast")
        $("#next-employee-form").hide("fast")
        $("#save-employee-form").show("fast")
    }

    // RESPONSÁVEL POR PASSAR O STEPPER PARA TRÁS
    let backStepEmployee = () => {
        if (step === 1) {
            showPersonalStepEmployee()
        } else if (step === 2) {
            showLocationStepEmployee()
        }
    }

    // RESPONSÁVEL POR PASSAR O STEPPER PARA FRENTE
    let nextStepEmployee = () => {
        if (step === 0) {
            showLocationStepEmployee()
        } else if (step === 1) {
            showProfessionalStepEmployee()
        }
    }

    $("#button-employee-back").click(backStepEmployee)
    $("#button-employee-next").click(nextStepEmployee)
    // $("#button-employee-save").click(showList)

    // ADICIONANDO EVENTO PARA CADA HEADER DO STEPPER
    $("#personal-header").click(showPersonalStepEmployee)
    $("#location-header").click(showLocationStepEmployee)
    $("#professional-header").click(showProfessionalStepEmployee)

    /***************************************************** FUNÇÕES LIST *****************************************************/
    // MOSTRA SOMENTE COLLAPSE LOCATION
    let showLocationCollapseEmployee = () => {
        $("#location-collapse").slideToggle("fast")
        $("#professional-collapse").hide("fast")
    }

    // MOSTRA SOMENTE COLLAPSE ADDITIONAL
    let showProfessionalCollapse = () => {
        $("#professional-collapse").slideToggle("fast")
        $("#location-collapse").hide("fast")
    }

    // ADICIONANDO EVENTO PARA CADA HEADER DO CARD
    $("#location-collapse-header").click(showLocationCollapseEmployee)
    $("#professional-collapse-header").click(showProfessionalCollapse)
})
