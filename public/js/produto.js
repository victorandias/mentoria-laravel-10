function deleteRegistroPaginacao(rotaUrl, idDoRegistro) {
    alert(rotaUrl);
    alert(idDoRegistro);
    if (confirm('Tem certeza que deseja deletar o produto ?')){
        $.ajax ({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                id: idDoRegistro,
            },
            beforeSend: function () {
                $.blockUI ({
                    message: 'carregando...',
                    timeout:2000,
                });
            },
        }).done(function (data){
            $.unblockUI();
            if (data.success == true) {
                window.location.reload();
            } else {
                alert('Não foi possível excluir o produto');
            }
        }).fail(function(data) {
            $.unblockUI();
            alert('Não foi possível buscar os dados');
        })
    }
}

$('#marcara_valor').mask('#.##0,00', { reserve: true });