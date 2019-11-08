<?php
    require_once "utility/conexaoMysql.php";
?>

<div class="card-deck">
    <?php
        class Cliente 
        {
            public $customerName;
            public $cpf;
            public $phone;
            public $cellphone;
            public $email;
            public $zipCode;
            public $state;
            public $city;
            public $district;
            public $address;
            public $addressNumber;
            public $complement;
            public $gender;
            public $maritalStatus;
            public $profession;
        }
        
        try {
            $arrayClientes = null;
            
            $SQL = "
                SELECT *
                FROM PropCustomers
            ";

            // Função definida no arquivo conexaoMysql.php
            $conn = conectaAoMySQL();

            $result = $conn->query($SQL);
            if (! $result)
                throw new Exception('Ocorreu uma falha na listagem: ' . $conn->error);
            
            if ($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    $cliente = new Cliente();

                    $cliente->customerName = $row["customerName"];
                    $cliente->cpf = $row["cpf"];
                    $cliente->phone = $row["phone"];
                    $cliente->cellphone = $row["cellphone"];
                    $cliente->email = $row["email"];
                    $cliente->zipCode = $row["zipCode"];
                    $cliente->state = $row["state"];
                    $cliente->city = $row["city"];
                    $cliente->district = $row["district"];
                    $cliente->address = $row["address"];
                    $cliente->addressNumber = $row["addressNumber"];
                    $cliente->complement = $row["complement"];
                    $cliente->gender = $row["gender"];
                    $cliente->maritalStatus = $row["maritalStatus"];
                    $cliente->profession = $row["profession"];
        
                    $arrayClientes[] = $cliente;
                }
            }
            $conn->close();
        }
        catch (Exception $e) {
            $msgErro = $e->getMessage();
            $conn->close();
        }
        
        if ($arrayClientes != null)
        {
            foreach ($arrayClientes as $cliente)
            {
                $mycpf = preg_replace("/[^0-9]/", "", $cliente->cpf);
                echo "
                    <div class='card myCard mb-2'>
                        <div class='card-body'>
                            <h5 class='card-title'>$cliente->customerName</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>$cliente->cpf</h6>
                            <div class='row card-text'>
                                <div class='col-sm-4'> <p class='card-text'>Telefone: </p> </div>
                                <div class='col-sm-8'> <p class='ml-2 card-text text-muted'>$cliente->phone</p> </div>
                            </div>
                            <div class='row card-text'>
                                <div class='col-sm-4'> <p class='card-text'>Celular: </p> </div>
                                <div class='col-sm-8'> <p class='ml-2 card-text text-muted'>$cliente->cellphone</p> </div>
                            </div>
                            <div class='row card-text'>
                                <div class='col-sm-4'> <p class='card-text'>E-mail: </p> </div>
                                <div class='col-sm-8'> <p class='ml-2 card-text text-muted'>$cliente->email</p> </div>
                            </div>

                            <!-- LOCATION INFORMATIONS -->
                            <div class='collapseHeader' onclick='showLocationCollapseClient(`$cliente->cpf`)'>
                                <p class='mb-0'>Informações de Localização</p>
                            </div>
                            <div id='location$mycpf' class='collapseBody'>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>CEP: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->zipCode</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Rua: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->address</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Número: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->addressNumber</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Complemento: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->complement</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Bairro: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->district</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Cidade: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->city</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Estado: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->state</p> </div>
                                </div>
                            </div>

                            <!-- ADDITIONAL INFORMATIONS -->
                            <div class='collapseHeader' onclick='showAdditionalCollapseClient(`$cliente->cpf`)'>
                                <p class='mb-0'>Informações Adicionais</p>
                            </div>
                            <div id='additional$mycpf' class='collapseBody'>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Gênero: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->gender</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Estado Civil: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->maritalStatus</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Profissão: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$cliente->profession</p> </div>
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
function showLocationCollapseClient(cpf) {
    let id = cpf.replace(/[^0-9]/g,'');
    $(`#location${id}`).slideToggle("fast")
    $(`#additional${id}`).hide("fast")
}

// MOSTRA SOMENTE COLLAPSE ADDITIONAL
let showAdditionalCollapseClient = (cpf) => {
    let id = cpf.replace(/[^0-9]/g,'');
    $(`#additional${id}`).slideToggle("fast")
    $(`#location${id}`).hide("fast")
}
</script>
