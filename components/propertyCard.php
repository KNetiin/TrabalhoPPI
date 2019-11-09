<?php
    require_once "utility/conexaoMysql.php";
?>

<div class="card-deck">
    <?php
        class Imovel 
        {
            public $immobileCode;
            public $codProp;
            public $purpose;
            public $availability;
            public $description;
            public $rooms;
            public $suites;
            public $livingRooms;
            public $diningRooms;
            public $parkingSpaces;
            public $immobileValue;
            public $zipCode;
            public $state;
            public $city;
            public $district;
            public $address;
            public $addressNumber;
            public $complement;
            public $hasPool;
            public $immobArea;
            public $apartmentNumber;
            public $apartmentFloor;
            public $condominiumValue;
            public $imovel;
            public $type;
            public $interest;
            public $disponibilidade;
            public $piscina;
        }
        
        try {
            $arrayImoveis = null;
            
            // Função definida no arquivo conexaoMysql.php
            $conn = conectaAoMySQL();

            $houseSQL = "
                SELECT *
                FROM Immobile INNER JOIN ImmobHouse ON Immobile.immobileCode = ImmobHouse.codImmob;
            ";

            $result = $conn->query($houseSQL);
            if (! $result)
                throw new Exception('Ocorreu uma falha na listagem: ' . $conn->error);
            
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $imovel = new Imovel();

                    $imovel->immobileCode = $row["immobileCode"];
                    $imovel->codProp = $row["codProp"];
                    $imovel->purpose = $row["purpose"];
                    $imovel->availability = $row["availability"];
                    $imovel->description = $row["description"];
                    $imovel->rooms = $row["rooms"];
                    $imovel->suites = $row["suites"];
                    $imovel->livingRooms = $row["livingRooms"];
                    $imovel->diningRooms = $row["diningRooms"];
                    $imovel->parkingSpaces = $row["parkingSpaces"];
                    $imovel->immobileValue = $row["immobileValue"];
                    $imovel->zipCode = $row["zipCode"];
                    $imovel->state = $row["state"];
                    $imovel->city = $row["city"];
                    $imovel->district = $row["district"];
                    $imovel->address = $row["address"];
                    $imovel->addressNumber = $row["addressNumber"];
                    $imovel->complement = $row["complement"];
                    $imovel->hasPool = $row["hasPool"];
                    $imovel->immobArea = $row["immobArea"];
                    $imovel->apartmentNumber = "";
                    $imovel->apartmentFloor = "";
                    $imovel->condominiumValue = "";
                    $imovel->imovel = 'Casa';
                    $imovel->type = 'casa';
        
                    if ($imovel->purpose === 'venda') {
                        $imovel->interest = 'Venda';
                    } else {
                        $imovel->interest = 'Locação';
                    }

                    if ($imovel->availability) {
                        $imovel->disponibilidade = 'Disponível';
                    } else {
                        $imovel->disponibilidade = 'Indisponível';
                    }

                    if ($imovel->hasPool) {
                        $imovel->piscina = 'Possui';
                    } else {
                        $imovel->piscina = 'Não Possui';
                    }

                    $arrayImoveis[] = $imovel;
                }
            }

            $apartSQL = "
                SELECT *
                FROM Immobile INNER JOIN ImmobApart ON Immobile.immobileCode = ImmobApart.codImmob
            ";

            $result = $conn->query($apartSQL);
            if (! $result)
                throw new Exception('Ocorreu uma falha na listagem: ' . $conn->error);
            
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $imovel = new Imovel();

                    $imovel->immobileCode = $row["immobileCode"];
                    $imovel->codProp = $row["codProp"];
                    $imovel->purpose = $row["purpose"];
                    $imovel->availability = $row["availability"];
                    $imovel->description = $row["description"];
                    $imovel->rooms = $row["rooms"];
                    $imovel->suites = $row["suites"];
                    $imovel->livingRooms = $row["livingRooms"];
                    $imovel->diningRooms = $row["diningRooms"];
                    $imovel->parkingSpaces = $row["parkingSpaces"];
                    $imovel->immobileValue = $row["immobileValue"];
                    $imovel->zipCode = $row["zipCode"];
                    $imovel->state = $row["state"];
                    $imovel->city = $row["city"];
                    $imovel->district = $row["district"];
                    $imovel->address = $row["address"];
                    $imovel->addressNumber = $row["addressNumber"];
                    $imovel->complement = $row["complement"];
                    $imovel->hasPool = "";
                    $imovel->immobArea = "";
                    $imovel->apartmentNumber = $row["apartmentNumber"];
                    $imovel->apartmentFloor = $row["apartmentFloor"];
                    $imovel->condominiumValue = $row["condominiumValue"];
                    $imovel->type = 'apartamento';
                    $imovel->imovel = 'Apartamento';
                    $imovel->piscina = '';

                    if ($imovel->purpose === 'venda') {
                        $imovel->interest = 'Venda';
                    } else {
                        $imovel->interest = 'Locação';
                    }

                    if ($imovel->availability) {
                        $imovel->disponibilidade = 'Disponível';
                    } else {
                        $imovel->disponibilidade = 'Indisponível';
                    }
        
                    $arrayImoveis[] = $imovel;
                }
            }
            $conn->close();
        }
        catch (Exception $e) {
            $msgErro = $e->getMessage();
            $conn->close();
        }
        
        if ($arrayImoveis != null)
        {
            foreach ($arrayImoveis as $imovel)
            {
                echo "
                    <div class='card myCard mb-2'>
                        <div class='card-body'>
                            <h5 class='card-title'>$imovel->imovel</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>$imovel->interest</h6>
                            <div class='row card-text'>
                                <div class='col-sm-6'> <p class='card-text'>Disponibilidade: </p> </div>
                                <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->disponibilidade</p> </div>
                            </div>
                            <div class='row card-text'>
                                <div class='col-sm-6'> <p class='card-text'>CPF do Proprietário: </p> </div>
                                <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->codProp</p> </div>
                            </div>
                            <div class='row card-text'>
                                <div class='col-sm-6'> <p class='card-text'>Descrição: </p> </div>
                                <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->description</p> </div>
                            </div>

                            <!-- PROPERTY INFORMATIONS -->
                            <div class='collapseHeader' onclick='showInformationsCollapseProperties(`$imovel->immobileCode`)'>
                                <p class='mb-0'>Informações do Imóvel</p>
                            </div>
                            <div id='informations$imovel->immobileCode' class='collapseBody'>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Qtd(s) de Quartos: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->rooms</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Qtd(s) de Suítes: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->suites</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Qtd(s) de Salas de Estar: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->livingRooms</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Qtd(s) de Salas de Jantar: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->diningRooms</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Qtd(s) de Vagas na Garagem: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->parkingSpaces</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Preço de Venda/Locação: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>R$$imovel->immobileValue</p> </div>
                                </div>
                ";
                if ($imovel->type === 'casa') {
                    echo "
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Área Total:</p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->immobArea m²</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Piscina: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->piscina</p> </div>
                                </div>
                            </div>
                    ";
                } else {
                    echo "
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Andar: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->apartmentFloor</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Apartamento:</p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->apartmentNumber</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Valor do Condomínio: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>R$$imovel->condominiumValue</p> </div>
                                </div>
                            </div>
                    ";

                }
                echo "
                            <!-- LOCATION INFORMATIONS -->
                            <div class='collapseHeader' onclick='showLocationCollapseProperties(`$imovel->immobileCode`)'>
                                <p class='mb-0'>Informações de Localização</p>
                            </div>
                            <div id='location$imovel->immobileCode' class='collapseBody'>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>CEP: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->zipCode</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Rua: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->address</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Número: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->addressNumber</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Complemento: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->complement</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Bairro: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->district</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Cidade: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->city</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-6'> <p class='card-text'>Estado: </p> </div>
                                    <div class='col-sm-6'> <p class='ml-2 card-text text-muted'>$imovel->state</p> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    ?>
    </div>
        
    <script>
    // MOSTRA SOMENTE COLLAPSE LOCATION
    function showInformationsCollapseProperties(id) {
        $(`#informations${id}`).slideToggle("fast")
        $(`#location${id}`).hide("fast")
    }
    
    // MOSTRA SOMENTE COLLAPSE PROFESSIONAL
    let showLocationCollapseProperties = (id) => {
        $(`#location${id}`).slideToggle("fast")
        $(`#informations${id}`).hide("fast")
    }
    </script>
