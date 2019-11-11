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
        document.forms[4]["cep"].value = '';
        document.forms[4]["state"].value = '';
        document.forms[4]["city"].value = '';
        document.forms[4]["district"].value = '';
        document.forms[4]["address"].value = '';
    })

    $("#navbar-private-clients").click(() => {
        showPage("page-private-clientsList")
        document.forms[5]["cep"].value = '';
        document.forms[5]["state"].value = '';
        document.forms[5]["city"].value = '';
        document.forms[5]["district"].value = '';
        document.forms[5]["address"].value = '';
    })

    $("#navbar-private-properties").click(() => {
        showPage("page-private-propertiesList")
        document.forms[6]["cep"].value = '';
        document.forms[6]["state"].value = '';
        document.forms[6]["city"].value = '';
        document.forms[6]["district"].value = '';
        document.forms[6]["address"].value = '';
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

function buscaEndereco(zipCode) {
    if (zipCode.length != 9)
        return;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function (e)
    {
        if (xmlhttp.status == 200)
        {
            if (xmlhttp.responseText != "")
            {
                try
                {
                    address = JSON.parse(xmlhttp.responseText);
                    document.forms[4]["state"].value = address.state;
                    document.forms[4]["city"].value = address.city;
                    document.forms[4]["district"].value = address.district;
                    document.forms[4]["address"].value = address.address;
                    document.forms[5]["state"].value = address.state;
                    document.forms[5]["city"].value = address.city;
                    document.forms[5]["district"].value = address.district;
                    document.forms[5]["address"].value = address.address;
                    document.forms[6]["state"].value = address.state;
                    document.forms[6]["city"].value = address.city;
                    document.forms[6]["district"].value = address.district;
                    document.forms[6]["address"].value = address.address;
                }
                catch (e)
                {
                    alert("A string retornada pelo servidor não é um JSON válido: " + xmlhttp.responseText);
                }
            }
            else
                alert("CEP não encontrado");
        }
    }

    xmlhttp.open("GET", "http://fuguete-e-farofa.atwebpages.com/utility/buscaEndereco.php?zipCode=" + zipCode, true);
    xmlhttp.send();
}
