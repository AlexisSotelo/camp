$(".tablas").on("click", ".btnEliminaTutor", function(){
    //mandar a traer el atributo 
    var idTutor = $(this).attr("idTutor");
    // alert(idTutor);
    window.location = "http://localhost/camp/elimina/usuarios/id" + idTutor;
})