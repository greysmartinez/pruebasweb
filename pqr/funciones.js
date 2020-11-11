$(function(){
     $("#mostrar").html(mostrar(1));
     $('#brad').change(function(){
        mostrar(1);
      }); 
      $('#basu').change(function(){
        mostrar(1);
      }); 
     $('#best').change(function(){
         mostrar(1);
     });
     $('#btipo').change(function(){
        mostrar(1);
      });
      $('#buser').change(function(){
        mostrar(1);
      });
 });  

 function mostrar(page){
        var rad = $("#brad").val();
        var tipo = $("#btipo").val();
         var asunto = $("#basu").val();
        var est = $("#best").val();
        var user = $("#buser").val();
        $.ajax({
                type: 'GET',
                data: 'rad='+rad+'&tipo='+tipo+'&asunto='+asunto+'&est='+est+'&user='+user+'&page='+page,
                url: 'pqr/lista.php',
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
                url: 'pqr/acciones.php', //
                success: function(resultado){
                     alert(resultado);
                     mostrar(1);

                }
               });
    }
}
function editarpqr(id,est){
    var page = $("#page").val();
    var confirmar = confirm("Esta seguro de cambiar de estado?");
    if(confirmar){
         $.ajax({
            type: 'GET',
            data: 'id='+id+'&est='+est+'&sw=2',  //
            url: 'pqr/acciones.php', //
            success: function(t){
                 alert(t);
                 mostrar(page);
            }
           });
       }
}
function registrar_pqr(){
 
        var tipo = $("#ftipo").val();
        var asunto = $("#fasunto").val();
        var user = $("#fuser").val();
        var estado = $("#festado").val();
        var registro = $("#freg").val();
        var limite = $("#flim").val();

        if (tipo===''){
            alert('Debe seleccionar el tipo de PQR') 
            $("#ftipo").focus();
            return false;
         }
         if (asunto===''){
            alert('debe ingresar EL ASUNTO') 
            $("#fasunto").focus();
            return false;
         }
         
    $.ajax({
            type: 'GET',
            data: 'tipo='+tipo+'&asunto='+asunto+'&user='+user+'&estado='+estado+'&registro='+registro+'&limite='+limite+'&sw=1',
            url: 'pqr/acciones.php', 
            success: function(resultado){
               alert(resultado);
               lista_pqr();
            }
           });
}
function borrarpqr(id){
    var c = confirm("Esta seguro de eliminar este items?");
    if(c){
         $.ajax({
                type: 'GET',
                data: 'id='+id+'&sw=3',  //
                url: 'pqr/acciones.php', //
                success: function(resultado){
                     alert(resultado);
                     mostrar(1);

                }
               });
    }
}