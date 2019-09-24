<div class="container-fluid" id="mainNavbar">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php#">
            <img src="images/logoppi6.png" alt="logo-confraria">
        </a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="employee.php#">Funcionários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="client.php#">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="propertiesP.php#">Imóveis neto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="properties.php#">Imóveis farofa</a>
                    </li>
                </ul>
            </div>
        </div>
        <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#modalExemplo" type="button">Login</button>
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
                    <form action="" class="formLogin">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="username">Nome de usuário</label>
                                <input type="email" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Usuário">
                            </div>
                            <div class="form-group row">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="password" placeholder="Senha">
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