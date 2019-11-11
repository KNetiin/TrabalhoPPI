$(document).ready(() => {
    /*************************************************** FUNÇÕES DA NAVBAR ***************************************************/
    delete $(".myPage")
    let page = localStorage.getItem("page")
    
    if (!page) {
        page = "page-public-home"
    }

    let showPage = (id) => {
        $(".myPage").hide("fast");
        $(`#${id}`).show("fast");
        localStorage.setItem('page', id)
        localStorage.removeItem('formOrList')
    };
    showPage(page)

    $("#navbar-public-home").click(() => {
        showPage("page-public-home")
    })

    $("#navbar-public-properties").click(() => {
        showPage("page-public-properties")
    })

    $("#navbar-private-employees").click(() => {
        showPage("page-private-employeesList")
        document.forms[6]["cep"].value = '';
        document.forms[6]["state"].value = '';
        document.forms[6]["city"].value = '';
        document.forms[6]["district"].value = '';
        document.forms[6]["address"].value = '';
    })

    $("#navbar-private-clients").click(() => {
        showPage("page-private-clientsList")
        document.forms[7]["cep"].value = '';
        document.forms[7]["state"].value = '';
        document.forms[7]["city"].value = '';
        document.forms[7]["district"].value = '';
        document.forms[7]["address"].value = '';
    })

    $("#navbar-private-properties").click(() => {
        showPage("page-private-propertiesList")
        document.forms[8]["cep"].value = '';
        document.forms[8]["state"].value = '';
        document.forms[8]["city"].value = '';
        document.forms[8]["district"].value = '';
        document.forms[8]["address"].value = '';
    })
    
    $("#imgNavbar").click(() => {
        showPage("page-public-home")
    })

    /****************************************************FUNÇÕES DO RODAPÉ*****************************************************/
    function adjustDiv() {
        let div = document.getElementById('conteudo')
        let footer = document.getElementById('footer').clientHeight
        div.style.paddingBottom = `${footer}px`
    }
    adjustDiv();

    /*************************************************** FUNÇÕES DO STEPPER ***************************************************/

    // QUANDO O MOUSE ESTIVER EM CIMA DO HEADER, SEU FUNDO ESCURECE PARA DAR NOÇÃO DE SER CLICÁVEL
    $(".stepHeader").hover(function() {
        $(this).css("background-color", "#eee")
    }, function() {
        $(this).css("background-color", "#f8f8f8")
    })
})
