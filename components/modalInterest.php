<button class="btn btn-primary" data-toggle="modal" data-target="#interest" type="button">Tenho Interesse!</button>
<!-- Modal -->
<div class="modal fade" id="interest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contate-nos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="formLogin">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="username">Nome Completo</label>
                        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Usuário">
                    </div>
                    <div class="form-group row">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group row">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" placeholder="Telefone">
                    </div>
                    <div class="form-group row">
                        <label for="description">Descrição da Proposta</label>
                        <textarea class="form-control" rows="5" placeholder="Descrição"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>