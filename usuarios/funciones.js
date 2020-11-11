$(function(){
     $("#mostrar").html(mostrar(1));
     $('#bnom').change(function(){
        mostrar(1);
      }); 
      $('#bape').change(function(){
        mostrar(1);
      }); 
     $('#bema').change(function(){
         mostrar(1);
     });
     $('#best').change(function(){
        mostrar();
      });
 });  

 function mostrar(page){
        var ema = $("#bema").val();
        var nom = $("#bnom").val();
         var ape = $("#bape").val();
        var est = $("#best").val();
        $.ajax({
                type: 'GET',
                data: 'ema='+ema+'&nom='+nom+'&ape='+ape+'&est='+est+'&page='+page,
                url: 'usuarios/lista.php',
            success: function(d){
                $("#mostrar").html(d);
            }
        });
    }
function borrar(id){
    var c = confirm("Esta seguro de eliminar este items?");
    if(c){
         $.ajax({
                type: 'GET',
                data: 'id='+id+'&sw=3',  //
                url: 'usuarios/acciones.php', //
                success: function(resultado){
                     alert(resultado);
                     mostrar(1);

                }
               });
    }
}
function editar(id){
     $.ajax({
            type: 'GET',
            data: 'id='+id+'',  //
            url: 'usuarios/formulario.php', //
            success: function(t){
                 $("#contenedor").html(t);
            }
           });
}
function formulariopqr(id){
     
      $.ajax({
                type: 'GET',
                data: 'id='+id,
                url: 'pqr/formulario.php',
                success: function(t) {
                    $("#contenedor").html(t);
                }
     
});
 }