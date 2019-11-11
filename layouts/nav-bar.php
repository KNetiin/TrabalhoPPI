<div class="container-fluid" id="mainNavbar">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" id="imgNavbar" href="index.php#">
            <img src="images/logoppi6.png" alt="logo-confraria">
        </a>
        <div class="collapse navbar-collapse mt-md-3" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <!-- PUBLIC -->
                    <li class="nav-item">
                        <p class="nav-link" id="navbar-public-home">Home</p>
                    </li>
                    <li class="nav-item">
                        <p class="nav-link" id="navbar-public-properties">Imóveis</p>
                    </li>

                    <!-- PRIVATE -->
                    <?php
                        require_once "utility/autenticacao.php";

                        if (checkUsuarioLogado()) {
                            echo "
                                <li class='nav-item dropdown'>
                                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                        Área Privada
                                    </a>
                                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                        <p class='dropdown-item' id='navbar-private-employees'>Funcionários</p>
                                        <p class='dropdown-item' id='navbar-private-clients'>Clientes</p>
                                        <p class='dropdown-item' id='navbar-private-properties'>Imóveis</p>
                                    </div>
                                </li>
                            ";
                        }
                    ?>
                </ul>
            </div>
        </div>
        <?php
            require_once "utility/autenticacao.php";

            if (!checkUsuarioLogado()) {
                echo "
                    <button class='btn btn-outline-success my-2 my-sm-0' data-toggle='modal' data-target='#modalExemplo' type='button'>
                        Login
                    </button>
                ";
                } else {
                    echo "
                    <button class='btn btn-outline-danger my-2 my-sm-0' type='button'>
                        Logout
                    </button>
                ";
                }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="http://fuguete-e-farofa.atwebpages.com/utility/autenticacao.php" class="formLogin" method="POST">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="username">Nome de usuário</label>
                                <input class="form-control" name="username" aria-describedby="emailHelp" placeholder="Usuário">
                            </div>
                            <div class="form-group row">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" name="password" placeholder="Senha">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>