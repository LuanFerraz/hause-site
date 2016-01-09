$( document ).ready(function() {




$('.btn').click(function(e){
	e.preventDefault();
	currButton = this;
	$(currButton).text('Enviando...');
	
	 $.ajax({
		url: 'http://hause.com.br/mail/email.php',
		type: "post",
		data: {
			nome: $('[name=nome]').val(),
			email: $('[name=email]').val(),
			assunto: $('[name=assunto]').val(),
			mensagem: $('[name=mensagem]').val()
		},
		beforeSend:function(){
			$(currButton).attr('disabled',true);
		},
		success: function(json) {
			alert('Mensagem enviada com sucesso!');
			$('.btn').text('Enviar');
			$(currButton).removeAttr('disabled',false);
		},
		error: function(response) {
			alert('Problema ao enviar email!');
			$('.btn').text('Enviar');
			$(currButton).removeAttr('disabled',false);
		}
	});

});

});