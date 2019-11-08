<?php
    require_once "utility/conexaoMysql.php";
?>

<div class="card-deck">
    <?php
        class Funcionario 
        {
            public $employeeName;
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
            public $userName;
            public $userPassword;
            public $enterprisePhone;
            public $profession;
            public $salary;
            public $dateOfEntry;
        }
        
        try {
            $arrayFuncionarios = null;
            
            $SQL = "
                SELECT *
                FROM Employees
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
                    $funcionario = new Funcionario();

                    $funcionario->employeeName = $row["employeeName"];
                    $funcionario->cpf = $row["cpf"];
                    $funcionario->phone = $row["phone"];
                    $funcionario->cellphone = $row["cellphone"];
                    $funcionario->email = $row["email"];
                    $funcionario->zipCode = $row["zipCode"];
                    $funcionario->state = $row["state"];
                    $funcionario->city = $row["city"];
                    $funcionario->district = $row["district"];
                    $funcionario->address = $row["address"];
                    $funcionario->addressNumber = $row["addressNumber"];
                    $funcionario->complement = $row["complement"];
                    $funcionario->userName = $row["userName"];
                    $funcionario->userPassword = $row["userPassword"];
                    $funcionario->enterprisePhone = $row["enterprisePhone"];
                    $funcionario->profession = $row["profession"];
                    $funcionario->salary = $row["salary"];
                    $funcionario->dateOfEntry = $row["dateOfEntry"];
        
                    $arrayFuncionarios[] = $funcionario;
                }
            }
            $conn->close();
        }
        catch (Exception $e) {
            $msgErro = $e->getMessage();
            $conn->close();
        }
        
        if ($arrayFuncionarios != null)
        {
            foreach ($arrayFuncionarios as $funcionario)
            {
                $mycpf = preg_replace("/[^0-9]/", "", $funcionario->cpf);
                echo "
                    <div class='card myCard mb-2'>
                        <div class='card-body'>
                            <h5 class='card-title'>$funcionario->employeeName</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>$funcionario->cpf</h6>
                            <div class='row card-text'>
                                <div class='col-sm-4'> <p class='card-text'>Telefone: </p> </div>
                                <div class='col-sm-8'> <p class='ml-2 card-text text-muted'>$funcionario->phone</p> </div>
                            </div>
                            <div class='row card-text'>
                                <div class='col-sm-4'> <p class='card-text'>Celular: </p> </div>
                                <div class='col-sm-8'> <p class='ml-2 card-text text-muted'>$funcionario->cellphone</p> </div>
                            </div>
                            <div class='row card-text'>
                                <div class='col-sm-4'> <p class='card-text'>E-mail: </p> </div>
                                <div class='col-sm-8'> <p class='ml-2 card-text text-muted'>$funcionario->email</p> </div>
                            </div>

                            <!-- LOCATION INFORMATIONS -->
                            <div class='collapseHeader' onclick='showLocationCollapseEmployee(`$funcionario->cpf`)'>
                                <p class='mb-0'>Informações de Localização</p>
                            </div>
                            <div id='location$mycpf' class='collapseBody'>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>CEP: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->zipCode</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Rua: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->address</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Número: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->addressNumber</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Complemento: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->complement</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Bairro: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->district</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Cidade: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->city</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Estado: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->state</p> </div>
                                </div>
                            </div>

                            <!-- PROFESSIONAL INFORMATIONS -->
                            <div class='collapseHeader' onclick='showProfessionalCollapseEmployee(`$funcionario->cpf`)'>
                                <p class='mb-0'>Informações Professionais</p>
                            </div>
                            <div id='professional$mycpf' class='collapseBody'>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Usuário: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->userName</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Senha: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->userPassword</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Ramal: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->enterprisePhone</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Cargo: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->profession</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Salário: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>R$$funcionario->salary</p> </div>
                                </div>
                                <div class='row card-text'>
                                    <div class='col-sm-5'> <p class='card-text'>Data de Entrada: </p> </div>
                                    <div class='col-sm-7'> <p class='ml-2 card-text text-muted'>$funcionario->dateOfEntry</p> </div>
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
function showLocationCollapseEmployee(cpf) {
    let id = cpf.replace(/[^0-9]/g,'');
    $(`#location${id}`).slideToggle("fast")
    $(`#professional${id}`).hide("fast")
}

// MOSTRA SOMENTE COLLAPSE PROFESSIONAL
let showProfessionalCollapseEmployee = (cpf) => {
    let id = cpf.replace(/[^0-9]/g,'');
    $(`#professional${id}`).slideToggle("fast")
    $(`#location${id}`).hide("fast")
}
</script>