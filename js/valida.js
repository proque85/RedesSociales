$(document).ready(function(){

let btns={
btnEnviarFb:$("#enviarFacebook"),
btnEnviarInst:$("#enviarInstagram"),
btnEnviarTw:$("#enviarTwitter"),
btnIconsFb: $(".fb"),
btnIconsinst:$(".inst"),
btnIconsTw:$(".tw"),
btnReset:$("#enviarCancelar"),

};
let form={
mensaje:$('#mensaje'),
archivo:$('#file')
};

let {mensaje,archivo}=form;

/*Proceso desestruturacion*/
let {btnEnviarFb,btnEnviarInst,btnEnviarTw,btnIconsFb,btnIconsinst,btnIconsTw,btnReset}=btns;

    btnEnviarFb.hide();
    btnEnviarInst.hide();
    btnEnviarTw.hide();
    btnReset.hide();
    $("#formulario").hide();

      
    btnIconsFb.click(function(){
        btnEnviarFb.show();
        btnReset.show();
        btnEnviarInst.hide();
        btnEnviarTw.hide();
        $("#formulario").show();
        });

        btnIconsinst.click(function(){
        btnReset.show();
        btnEnviarInst.show();
        btnEnviarTw.hide();
        btnEnviarFb.hide();
        $("#formulario").show();
        });
        btnIconsTw.click(function(){
        btnReset.show();
        btnEnviarTw.show();
        btnEnviarFb.hide();
        btnEnviarInst.hide();
        $("#formulario").show();
        });

        btnReset.click(function(){
            btnEnviarFb.hide();
            btnEnviarInst.hide();
            btnEnviarTw.hide();
            btnReset.hide();
            $("#formulario").hide();        
        });

        function Enviar(proceso) {
            $.ajax(
                {
                    type:'POST',
                    url:'http://localhost/devFacebook/vendor/procesos.php?proceso='+proceso,
                    dataType:'json',
                    data:{'mensaje':mensaje.val(),'archivo':archivo.val()},
                    success(response){
                        var mtable='<table><tr><td> Nombre</td><td>Apellido</td></tr>';
                        for(let i=0; i<response.length;i++){
                         
                            mtable+=
                            '<tr><td>'+response[i].nombres+'</td>'+
                            '<td>'+response[i].apellidos+'</td></tr>'+
                            '<td>'+response[i].proceso+'</td></tr>';
                            }
                            mtable+='</table>';
                            $("#pruebas").html(mtable);
                    },
                    error(err){
                        $("#pruebas").html(`Respuestas:<br>${JSON.stringify(err)}`);
                    }
            
            
                }
            );
        }

        /*validando informacion antes de enviar datos por el api graph*/
        btnEnviarFb.click(function(){
                Enviar("EnviarFb");
        });
        btnEnviarInst.click(function(){
            Enviar("EnviarIns");
        });
        btnEnviarTw.click(function(){
            Enviar("EnviarTw");
        });
        
  });


