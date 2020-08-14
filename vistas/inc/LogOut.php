<script>
  let btn_salir=document.querySelector(".btn-exit-system");

  btn_salir.addEventListener('click',function(e){
    e.preventDefault();
    Swal.fire({
			title: 'Quiere cerra la session Perro?',
			text: "la session actual se cerrara y saldras del sistema",
			type: 'question',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, exit!',
			cancelButtonText: 'No, cancel'
		}).then((result) => {
			if (result.value) {
            
                let url='<?php echo SERVERURL; ?>ajax/loginAjax.php';
                let token='<?php echo $lc->encryption($_SESSION['token_spm']);?>';
                let usuario='<?php echo $lc->encryption($_SESSION['usuario_spm']);?>';
               
               let datos = new FormData();
               datos.append("token",token); 
               datos.append("usuario",usuario); 

               fetch(url,{
                method: 'POST',
                body: datos
                })
                .then(respuesta => respuesta.json())
                .then(respuesta => {
                    return alertas_ajax(respuesta);
                
               });

			}
		});

  });


</script>