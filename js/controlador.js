$(function(){
 
     $('#des').change(function(){
        mostrar_line(1);
      }); 
        $('#est').change(function(){
        mostrar_line(1);
      }); 
 });  
 function lista_usuarios(){
     
      $.ajax({
                type: 'GET',
                url: 'usuarios/index.php',
                success: function(t) {
                    $("#contenedor").html(t);
                }
     
});
 }
 function lista_pqr(){
     
      $.ajax({
                type: 'GET',
                url: 'pqr/index.php',
                success: function(t) {
                    $("#contenedor").html(t);
                }
     
});
 }
function mostrar_datos(id){

        $.ajax({
                type: 'GET',
                data: 'id='+id+'&sw=4',
                url: 'usuarios/acciones.php',
            success: function(d){
                var p = eval(d);
                    $("#id").val(p[0]);
                    $("#femail").val(p[3]);
                    $("#fnom").val(p[1]);
                    $("#fape").val(p[2]);
                    $("#fcel").val(p[5]);
                    $("#fdir").val(p[6]);
                    $("#fest").val(p[7]);
                     $("#ftipo").val(p[8]);
            
            }
        });
    }
function save(){
 
        var email = $("#email").val();
        var pwd = $("#pwd").val();
        var nom = $("#nom").val();
        var ape = $("#ape").val();
        var cel = $("#cel").val();
        var dir = $("#dir").val();

        if (email===''){
            alert('debe ingresar el email') 
            $("#email").focus();
            return false;
         }
         if (pwd===''){
            alert('debe ingresar la contraseña') 
            $("#pwd").focus();
            return false;
         }
         if (nom===''){
            alert('debe ingresar tu nombre') 
            $("#nom").focus();
            return false;
         }
    $.ajax({
            type: 'GET',
            data: 'email='+email+'&pwd='+pwd+'&nom='+nom+'&ape='+ape+'&cel='+cel+'&dir='+encodeURIComponent(dir)+'&sw=1',
            url: 'usuarios/acciones.php', 
            success: function(resultado){
               alert(resultado);
               limpiar()
            }
           });
}
function update(){
        var id = $("#id").val();

        var email = $("#femail").val();
        var est = $("#fest").val();
        var nom = $("#fnom").val();
        var ape = $("#fape").val();
        var cel = $("#fcel").val();
        var dir = $("#fdir").val();
        var tipo = $("#ftipo").val();

        if (email===''){
            alert('debe ingresar el email'); 
            $("#email").focus();
            return false;
         }
         if (est===''){
            alert('debes de seleccionar el estado'); 
            $("#pwd").focus();
            return false;
         }
         if (nom===''){
            alert('debe ingresar tu nombre'); 
            $("#nom").focus();
            return false;
         }
    $.ajax({
            type: 'GET',
            data: 'id='+id+'&email='+email+'&est='+est+'&nom='+nom+'&ape='+ape+'&cel='+cel+'&dir='+encodeURIComponent(dir)+'&tipo='+tipo+'&sw=2',
            url: 'usuarios/acciones.php', 
            success: function(resultado){
                alert(resultado);
               lista_usuarios();
            }
           });
}
function limpiar(){
        var email = $("#email").val('');
        var pwd = $("#pwd").val('');
        var nom = $("#nom").val('');
        var ape = $("#ape").val('');
        var cel = $("#cel").val('');
        var dir = $("#dir").val('');
        $("#ModalRegistrar").modal("hide");
}
function validar(){
        var pas = $("#pas").val();
        var use = $("#use").val();

        if (use===''){
            alert('debe ingresar el email'); 
            $("#use").focus();
            return false;
         }
         if (pas===''){
            alert('debes de ingresar la contraseña'); 
            $("#pas").focus();
            return false;
         }
    $.ajax({
            type: 'GET',
            data: 'use='+use+'&pas='+pas+'&sw=5',
            url: 'usuarios/acciones.php', 
            success: function(resultado){
                if(resultado=='true'){
                    location.href='index.php';
                }else{
                    alert("Usuario o contraseña invalida!");
                    return false;
                }
                
               
            }
           });
}

