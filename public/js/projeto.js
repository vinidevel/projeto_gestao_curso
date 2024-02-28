function deleteRegistroPaginacao(rotaUrl, idRegistro){

    if(confirm('Deseja confirmar a exclusão?')){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: idRegistro,
            },
            beforeSend: function(){
                $.blockUI({
                    message: "excluindo...",
                    timeout: 2000,
                });
            },
        }).done(function(data){
            $.unblockUI();
            if (data.success == true){
                window.location.reload();
            }else{
                alert("Não foi possivel excluir")
            }
        }).fail(function (data){
            $.unblockUI();
            alert('Não foi possivel excluir!');
        })
    }
}

