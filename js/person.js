$(documento).ready(function () {

    $('a[data-confirm]').click(function (ev) {

        var href = $(this).attr('href');

        if (!$('#confirm-logout').length) {

            $('body').append('<div class="modal fade" id="confirm-logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" ><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">SAIR<button type="button" class="close " data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"> Tem certeza de que deseja sair?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</ button><a class="btn btn-danger text-white" id="dataComfirmOK">Sair</a></div></div></div></div>');

        }

        $('#dataComfirmOK').attr('href', href);

        $('#confirm-logout').modal({ mostrar: verdadeiro});
    
    return false;

});
    
    });