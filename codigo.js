$(buscarReg());

function buscarReg(conformidad)
{
    $.ajax({
        url : 'busqueda.php',
        type : 'POST',
        dataType : 'html',
        data : { conformidad: conformidad },
    })

    .done(function(resultado){
        $("#tabla").html(resultado);
    })
}

$(document).on('keyup', '#buscar', function(){
    var valorbuscar=$(this).val();
    if (valorbuscar!="")  
    {
        obtener_registro(valorbuscar)
    }
    else
    {
        obtener_registro();
    }
})

if (issef(#buscar)) {

}