<div class="modal fade" id="modal-contato" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Contato</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <label>Código</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            <input class="form-control" id="id-view" placeholder="Id" type="text" readonly>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <label>Nome Completo</label>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input class="form-control" id="nome-view" placeholder="Nome Completo" type="text">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><span class="label label-default">Lista Telefones</span></p>
                        <select id="add-tipo-telefone" class="form-control form-group">
                            <option selected value="0">Selecione o Tipo</option>
                            <option value="1">Celular</option>
                            <option value="2">Residencial</option>
                            <option value="3">Trabalho</option>
                        </select>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><img width="20" height="20" src="assets/img/phone_14402.png"></span>
                            <input class="form-control" name="add-telefone" id="add-telefone" placeholder="Telefone" type="text" maxlength="15">
                        </div>
                        <div class="form-group text-right"><a href="javascript:;" id="btn-add-tel" class="btn btn-primary btn-sm">Adicionar</a></div>
                        <!--<div id="lista-telefones" style="overflow-x: scroll;overflow-y: auto; height: 300px;"></div>-->
                        <div class="panel-body no-padding" style="overflow-y: auto; height: 300px;">
                            <table class="table table-striped">
                                <tbody id="lista-telefones"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p><span class="label label-default">Lista E-Mails</span></p>
                        <select id="add-tipo-email" class="form-control form-group">
                            <option selected value="0">Selecione o Tipo</option>
                            <option value="1">Pessoal</option>
                            <option value="2">Trabalho</option>
                        </select>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><img width="20" height="20" src="assets/img/email_14410.png"></span>
                            <input class="form-control" id="add-email" placeholder="E-Mail" type="text">
                        </div>
                        <div class="form-group text-right"><a href="javascript:;" id="btn-add-email" class="btn btn-primary btn-sm">Adicionar</a></div>
                        <!--<div id="lista-emails" style="overflow-x: scroll;overflow-y: auto; height: 300px;"></div>-->
                        <div class="panel-body no-padding" style="overflow-y: auto; height: 300px;">
                            <table class="table table-striped">
                                <tbody id="lista-emails"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="col-md-6">
                    <div class="col-md-6" id="info-alteracao"></div>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>