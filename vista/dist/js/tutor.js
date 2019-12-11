$(".tablas").on("click", ".btnEliminaTutor", function(){
    //mandar a traer el atributo 
    var idTutor = $(this).attr("idTutor");
    // alert(idTutor);
    swal({
        title: "¿Estas seguro de eliminar este registro?",
        text: "No podras recuperar este registro",
        icon: "warning",
        buttons: ["Cancelar","Si, borrar"],
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            window.location = "http://localhost/camp/elimina/usuarios/" + idTutor;
        }
      });
    
})


$(".tablas").on("click",".btnModificatutorTutor",function(){
    var idTutor = $(this).attr("idTutor");
    var  form = new FormData();

    form.append("idTutor",idTutor);
    
    $.ajax({
        url: "http://localhost/camp/ajax/tutor.ajax.php",
        method: "POST",
        data:form,
        cache: false,
		contentType: false,
        processData: false,
        dataType: "json",
        success: function(result){
            console.log(result);

            $("#EditTutorNombre").val(result.TutorNombre);
            $("#EditTutorApellido").val(result.TutorApellido);
            $("#EditTutorCorreo").val(result.TutorCorreo);
            $("#EditTutorCorreoConfir").val(result.TutorCorreo);
            $("#EditTutorPassHide").val(result.TutorPass);




        }

    })

})