$(document).ready(() => {
    /*************************************************** FUNÇÕES DO NAVBAR ***************************************************/
    $("#navbar-public-home").click(() => {
        showPublicHome();
    })

    $("#navbar-public-properties").click(() => {
        showPublicProperties();
    })

    $("#navbar-private-employees").click(() => {
        showPrivateEmployeesList();
    })

    $("#navbar-private-clients").click(() => {
        showPrivateClientsList();
    })

    $("#navbar-private-properties").click(() => {
        showPrivatePropertiesList();
    })
    
    let showPublicHome = () => {
        $(".myPage").hide("fast");
        $("#page-public-home").show("fast");
    };

    let showPublicProperties = () => {
        $(".myPage").hide("fast");
        $("#page-public-properties").show("fast");
    };

    let showPrivateEmployeesList = () => {
        $(".myPage").hide("fast");
        $("#page-private-employeesList").show("fast");
    };

    let showPrivateClientsList = () => {
        $(".myPage").hide("fast");
        $("#page-private-clientsList").show("fast");
    };

    let showPrivatePropertiesList = () => {
        $(".myPage").hide("fast");
        $("#page-private-propertiesList").show("fast");
    };

    showPublicHome();

    /*************************************************** FUNÇÕES DO STEPPER ***************************************************/

    // QUANDO O MOUSE ESTIVER EM CIMA DO HEADER, SEU FUNDO ESCURECE PARA DAR NOÇÃO DE SER CLICÁVEL
    $(".stepHeader").hover(function() {
        $(this).css("background-color", "#eee")
    }, function() {
        $(this).css("background-color", "#f8f8f8")
    })

    /************************************************** FUNÇÕES DE LISTAGEM **************************************************/
    // $(".btn-cadastro").click(function())

})