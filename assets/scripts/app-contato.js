$(function() {
	function IsEmail(email) {
	    var exclude = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	    if (email.search(exclude) != -1) {
	        return false;
	    } else {
	        return true;
	    }
	}

    function listarTelefone(id){
        var url = 'controller/Telefone.php';
        var dados_post  = 'acao=listar' + '&id=' + id;
        var tel = '';
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){

            },
            success: function(data){
                $.each(data.dados, function (i, val) {
                    if(data.dados[i].tipo == '1'){
                        var tipo = 'Celular';
                    }
                    if(data.dados[i].tipo == '2'){
                        var tipo = 'Residencial';
                    }
                    if(data.dados[i].tipo == '3'){
                        var tipo = 'Trabalho';
                    }
                    tel +=  '<div class="alert alert-info alert-dismissible" role="alert">'
                            + '<button type="button" data-contato="' + data.dados[i].id_contato + '" data-id="' + data.dados[i].id + '" class="close del-tel" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'
                            + '<i class="fa fa-phone"></i>&nbsp;&nbsp;' + data.dados[i].fone + ' - ' + tipo
                            + '</div>';
                });
                $('#lista-telefones').html(tel);
            },
            error: function(data){
                console.log(data);
            }
        });
    }

    function deletarTelefone(id, idContato){
        var url = 'controller/Telefone.php';
        var dados_post  = 'acao=deletar' + '&id=' + id;
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
                
            },
            success: function(data){
                listarTelefone(idContato);
            },
            error: function(data){
                console.log(data);
            }
        });
    }

    function listarEmail(id){
        var url = 'controller/Email.php';
        var dados_post  = 'acao=listar' + '&id=' + id;
        var mail = '';
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){

            },
            success: function(data){
                $.each(data.dados, function (i, val) {
                    if(data.dados[i].tipo == '1'){
                        var tipo = 'Pessoal';
                    }
                    if(data.dados[i].tipo == '2'){
                        var tipo = 'Trabalho';
                    }
                    mail +=  '<div class="alert alert-info alert-dismissible" role="alert">'
                            + '<button type="button" data-contato="' + data.dados[i].id_contato + '" data-id="' + data.dados[i].id + '" class="close del-email" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'
                            + '<i class="fa fa-at"></i>&nbsp;&nbsp;' + data.dados[i].email + ' - ' + tipo
                            + '</div>';
                });
                $('#lista-emails').html(mail);
            },
            error: function(data){
                console.log(data);
            }
        });
    }

    function deletarEmail(id, idContato){
        var url = 'controller/Email.php';
        var dados_post  = 'acao=deletar' + '&id=' + id;
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
                
            },
            success: function(data){
                listarTelefone(idContato);
                listarEmail(idContato);
            },
            error: function(data){
                console.log(data);
            }
        });
    }

	function listar(offsete = 0){
    	var url = 'controller/Contato.php';
        var dados_post  = 'acao=listar' + '&off=' + offsete;
        var tr = '';
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
            	$('#btn-atualizar').html('<i class="fa fa-repeat fa-spin"></i>');
            	$('#btn-atualizar').addClass('disabled');
            },
            success: function(data){
                $.each(data.dados, function (i, val) {
                	tr += 	'<tr>'
								+ '<td>' + data.dados[i].id + '</td>'
								+ '<td>' + data.dados[i].nome + '</td>'
								+ '<td>'
									+ '<div class="btn-group"><a id="modal" data-id="' + data.dados[i].id + '" href="#modal-contato" role="button" class="btn btn-primary btn-sm" data-toggle="modal">Visualizar</a>'
									+ '<button id="btn-deletar-' + data.dados[i].id + '" data-id="' + data.dados[i].id + '" role="button" class="btn btn-danger btn-sm deletar">Deletar</button></div>'
								+ '</td>'
							+ '</tr>';
                });
                $('#btn-atualizar').html('Atualizar');
                $('#btn-atualizar').removeClass('disabled');
                $('#tabela-listar').html(tr);
            },
            error: function(data){
            	console.log(data);
            }
        });
    }
    listar();

    function listar2(){
        var url = 'controller/Contato.php';
        var dados_post  = 'acao=listar2';
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
                $('#btn-atualizar').html('<i class="fa fa-repeat fa-spin"></i>');
                $('#btn-atualizar').addClass('disabled');
            },
            success: function(data){
                $('#pagination-demo').twbsPagination({
                    totalPages: data,
                    visiblePages: 5,
                    onPageClick: function (event, page) {
                        listar((page-1)*6);
                    }
                });
            },
            error: function(data){
                console.log(data);
            }
        });
    }
    listar2();

    function deletar(id){
    	var url = 'controller/Contato.php';
        var dados_post  = 'acao=deletar' + '&id=' + id;
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
            	$('#btn-deletar-' + id).html('<i class="fa fa-repeat fa-spin"></i>');
            },
            success: function(data){
            	console.log(data);
            	if(data == 'true'){
                	$('#info-deletar').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Contato deletado com sucesso.</i></div>');
                	listar();
                }else{
                	$('#info-deletar').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Erro ao deletar Contato.</i></div>');
                }
            },
            error: function(data){
            	console.log(data);
            }
        });
    }

    function view(id){
    	var url = 'controller/Contato.php';
        var dados_post  = 'acao=view' + '&id=' + id;
        
        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
            	
            },
            success: function(data){
            	console.log(data);
            	$.each(data.dados, function (i, val) {
                	$('#id-view').val(data.dados[i].id);
                	$('#nome-view').val(data.dados[i].nome);
                	$('#email-view').val(data.dados[i].email);
                	$('#telefone-view').val(data.dados[i].telefone);
                    listarTelefone(data.dados[i].id);
                    listarEmail(data.dados[i].id);
                });
            },
            error: function(data){
            	console.log(data);
            }
        });
    }

	$('.opcao').css({
		'background-color': '#2B333E',
		'border-left-color': '#2B333E'
	});
	$(document).on('click', '.opcao', function(){
		var subPage = $(this).attr('data-menu');
		$('.panel').attr('hidden', 'hidden');
		$('#' + subPage).removeAttr('hidden');
		$('.opcao').removeClass('active');
		$(this).addClass('active');
		$('.opcao').css({
			'background-color': '#2B333E',
			'border-left-color': '#2B333E'
		});
		$(this).css({
			'background-color': '#252c35',
			'border-left-color': '#00AAFF'
		});
		$('.menu').removeClass('active');
		$('#pages').addClass('active');
		if(subPage == 'lista'){
			listar();
		}
	});

	$(document).on('click', '.menu', function(){
		$('.menu').removeClass('active');
		$(this).addClass('active');
		$('.opcao').removeClass('active');
		$('.opcao').css({
			'background-color': '#2B333E',
			'border-left-color': '#2B333E'
		});
	});


	$(document).on('click', '#btn-novo', function(){
        var Nome = $('#nome').val();
        var Email = $('#email').val();
        var Telefone = $('#telefone').val();

        var url = 'controller/Contato.php';
        var dados_post  = 'acao=novo'
        				 + '&nome='+ Nome
        				 + '&email=' + Email
        				 + '&telefone=' + Telefone;
        
        if (Nome == '') {
            $('#nome').focus();
            return false;
        }

        if (Email == '') {
            $('#email').focus();
            return false;
        }

        if (Telefone == '') {
            $('#telefone').focus();
            return false;
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
            	$('#btn-novo').html('<i class="fa fa-repeat fa-spin"></i>');
            	$('#btn-novo').addClass('disabled');
            },
            success: function(data){
            	$('#btn-novo').html('Salvar');
            	$('#btn-novo').removeClass('disabled');
                if(data == 'true'){
                	$('#info-novo').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i><i class="fa fa-check-circle"></i>&nbsp;&nbsp;Contato salvo com sucesso.</i></div>');
                }else{
                	$('#info-novo').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Erro ao salvar Contato.</i></div>');
                }
            },
            error: function(data){
            	console.log(data);
            	$('#info-novo').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i><i class="fa fa-times-circle"></i>&nbsp;&nbsp;Erro ao salvar Contato.</i></div>');
            }
        });

    });

    $(document).on('click', '#btn-add-tel', function(){
        var Tipo = $('#add-tipo-telefone').val();
        var Telefone = $('#add-telefone').val();
        var idContato = $('#id-view').val();

        var url = 'controller/Telefone.php';
        var dados_post  = 'acao=novo'
                         + '&id_contato='+ idContato
                         + '&tipo=' + Tipo
                         + '&telefone=' + Telefone;
        
        if (Telefone == '') {
            $('#add-telefone').focus();
            return false;
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
                $('#btn-add-tel').html('<i class="fa fa-repeat fa-spin"></i>');
                $('#btn-add-tel').addClass('disabled');
            },
            success: function(data){
                $('#btn-add-tel').html('Adicionar');
                $('#btn-add-tel').removeClass('disabled');
                listarTelefone(idContato);
                console.log(data);
            },
            error: function(data){
                console.log(data);
            }
        });

    });

    $(document).on('click', '#btn-add-email', function(){
        var Tipo = $('#add-tipo-email').val();
        var Email = $('#add-email').val();
        var idContato = $('#id-view').val();

        var url = 'controller/Email.php';
        var dados_post  = 'acao=novo'
                         + '&id_contato='+ idContato
                         + '&tipo=' + Tipo
                         + '&email=' + Email;
        
        if (Email == '') {
            $('#add-email').focus();
            return false;
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: dados_post,
            dataType: 'json',
            beforeSend: function(){
                $('#btn-add-email').html('<i class="fa fa-repeat fa-spin"></i>');
                $('#btn-add-email').addClass('disabled');
            },
            success: function(data){
                $('#btn-add-email').html('Adicionar');
                $('#btn-add-email').removeClass('disabled');
                listarTelefone(idContato);
                listarEmail(idContato);
                console.log(data);
            },
            error: function(data){
                console.log(data);
            }
        });

    });

    $(document).on('click', '#btn-atualizar', function(){
        listar();
    });

    $(document).on('click', '.deletar', function(){
        var id = $(this).attr('data-id');
        deletar(id);
    });

    $(document).on('click', '[data-toggle="modal"]', function(){
        var id = $(this).attr('data-id');
        view(id);
    });

    $(document).on('click', '.del-tel', function(){
        var id  = $(this).attr('data-id');
        var idc = $(this).attr('data-contato');
        deletarTelefone(id, idc);
    });

    $(document).on('click', '.del-email', function(){
        var id  = $(this).attr('data-id');
        var idc = $(this).attr('data-contato');
        deletarEmail(id, idc);
    });

});