<?php
    class House {
        public $code;
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
        // Abaixo informações somente referentes à casa
        public $hasPool;
        public $immobArea;
    }

    $queryImages = "
    Select codImmob, imageName from ImagesProperties;
    ";

    function getHouses($conn, $queryHouseInformations) {
        $arrHouses = null;

        $result = $conn->query($queryHouseInformations);
        if (!$result)
            echo ("Erro ao buscar Casas");

        if ($result->num_row >= 0) {
            while ($row = $result->fetch_assoc()) {
                $house = new House();

                $house->code = $row['immobileCode'];
                $house->codProp = $row['codProp'];
                $house->purpose = $row['purpose'];
                $house->availability = $row['availability'];
                $house->description = $row['description'];
                $house->rooms = $row['rooms'];
                $house->suites = $row['suites'];
                $house->livingRooms = $row['livingRooms'];
                $house->diningRooms = $row['diningRooms'];
                $house->parkingSpaces = $row['parkingSpaces'];
                $house->immobileValue = $row['immobileValue'];
                $house->zipCode = $row['zipCode'];
                $house->state = $row['state'];
                $house->city = $row['city'];
                $house->district = $row['district'];
                $house->address = $row['address'];
                $house->addressNumber = $row['addressNumber'];
                $house->complement = $row['complement'];
                $house->hasPool = $row['hasPool'];
                $house->immobArea = $row['immobArea'];
                $arrHouses[] = $house;
            }

        }
        return $arrHouses;
    }

    function writeCardHouses($arrHouses, $conn) {
        if ($arrHouses !== null && count($arrHouses) > 0) {
            foreach ($arrHouses as $house) {
                if ($house->availability === '1') {
                    $availability = "Disponível";
                } else {
                    $availability = "Indisponível";
                }
                if ($house->complement !== "") {
                    $complement = $house->complement;
                } else {
                    $complement = "Nenhum";
                }
                // Aqui em baixo, procuraremos no banco todas as imagens da casa da iteração
                $arrImages = null;
                $queryImages = "
                    SELECT imageName FROM ImagesProperties WHERE codImmob = '$house->code'
                ";
                $result = $conn->query($queryImages);
                if ($result->num_row >= 0) {
                    while ($row = $result->fetch_assoc()) {
                        $arrImages[] = $row['imageName'];
                    }
                }
                echo "
                <div class='container-fluid'>
                    <div class='card myCard'>
                        <div class='row' id='cardRow'>
                            <div class='col-md-3 d-flex align-items-center flex-column text-center' style='padding-top: auto;'>
                                <div>
                                    <p>$house->description</p>
                                </div>
                                <div>
                                    <button class='btn btn-secondary' data-toggle='modal' data-target='#$house->code' type='button'>Mais informações</button>
                                    <!-- Modal -->
                                    <div class='modal fade' id='$house->code' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabel'>Detalhes do Imóvel</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <form action='' class='formLogin'>
                                                    <div class='modal-body'>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Tipo do imóvel:</h6>
                                                                <p>Casa</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Interesse:</h6>
                                                                <p>$house->purpose</p>
                                                            </div>
                                                        </div>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Preço de Venda/Locação</h6>
                                                                <p>R$ $house->immobileValue</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Status:</h6>
                                                                <p>$availability</p>
                                                            </div>
                                                        </div>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col'>
                                                                <h6>Descrição:</h6>
                                                                <p>$house->description</p>
                                                            </div>
                                                        </div>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Quantidade de Quartos:</h6>
                                                                <p>$house->rooms</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Quantidade de Suítes:</h6>
                                                                <p>$house->suites</p>
                                                            </div>
                                                        </div>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Quantidade de Salas de Estar:</h6>
                                                                <p>$house->livingRooms</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Quantidade de Salas de Jantar:</h6>
                                                                <p>$house->diningRooms</p>
                                                            </div>
                                                        </div>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Quantidade de Vagas na Garagem:</h6>
                                                                <p>$house->parkingSpaces</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-6'>
                                                                <h6>Área Total:</h6>
                                                                <p>$house->immobArea</p>
                                                            </div>
                                                        </div>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col'>
                                                                <h6>CEP</h6>
                                                                <p>$house->zipCode</p>
                                                            </div>
                                                        </div>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col-xs-12 col-md-4'>
                                                                <h6>Estado:</h6>
                                                                <p>$house->state</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-4'>
                                                                <h6>Cidade:</h6>
                                                                <p>$house->city</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-4'>
                                                                <h6>Bairro:</h6>
                                                                <p>$house->district</p>
                                                            </div>
                                                        </div>
                                                        <div class='row myDescriptionRow justify-content-center'>
                                                            <div class='col-xs-12 col-md-4'>
                                                                <h6>Logradouro:</h6>
                                                                <p>$house->address</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-4'>
                                                                <h6>Número:</h6>
                                                                <p>$house->addressNumber</p>
                                                            </div>
                                                            <div class='col-xs-12 col-md-4'>
                                                                <h6 style='word-wrap: initial;'>Complemento:</h6>
                                                                <p>$complement</p>
                                                            </div>
                                                        </div>
                                                        <h6 style='border-top: 1px solid grey; padding-top: 5px;'>Imagens do Imóvel</h6>
                                                        <div class='row justify-content-center'>
                                                            <div class='row mt-3'>
                                                                <div class='col'>
                                                                    <ul class='list-group'>";
                                                                    
                                                                    foreach ($arrImages as $image) {
                                                                        echo " <li class='list-group-item myListImages'>
                                                                            <img src='pages/private/properties/images/$image' class='imgProp' alt='img1'>
                                                                         </li>";
                                                                    } 
                                                                        echo "
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='mt-1'>
                                    <button class='btn btn-primary' data-toggle='modal' data-target='#interest' type='button'>Tenho Interesse!</button>
                                    <!-- Modal -->
                                    <div class='modal fade' id='interest' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title' id='exampleModalLabel'>Contate-nos</h5>
                                                    <button type='button' class='close' data-dismiss='modal' aria-label='Fechar'>
                                                        <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                </div>
                                                <form action='' class='formLogin'>
                                                    <div class='modal-body'>
                                                        <div class='form-group row'>
                                                            <label for='username'>Nome Completo</label>
                                                            <input type='email' class='form-control' aria-describedby='emailHelp' placeholder='Usuário'>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <label for='email'>Email</label>
                                                            <input type='email' class='form-control' placeholder='Email'>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <label for='telefone'>Telefone</label>
                                                            <input type='text' class='form-control' placeholder='Telefone'>
                                                        </div>
                                                        <div class='form-group row'>
                                                            <label for='description'>Descrição da Proposta</label>
                                                            <textarea class='form-control' rows='5' placeholder='Descrição'></textarea>
                                                        </div>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancelar</button>
                                                        <button type='submit' class='btn btn-primary'>Enviar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-md-9 propertieImages'>
                                <div class='row'>";
                                    for ($i = 0; $i <= 2; $i++) {
                                        $image = $arrImages[$i];
                                        echo "<div class='col-md-4 imgPresentation'>
                                                <img src='pages/private/properties/images/$image' class='imgProp' alt='img1'>
                                            </div>";
                                    }
                                    echo "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }

?>