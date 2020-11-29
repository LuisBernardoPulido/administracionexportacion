function cambioproductor(){
    var productor = document.getElementById('perfilusuario-c01_id').value;

    if(productor){
        parametro = {"productor": productor};
        $.ajax({
            type: 'GET',
            url: 'index.php?r=perfil-usuario-exportador/buscarproductor',
            data: parametro,
            dataType: "json",
            success: function (res) {
                document.getElementById('perfilusuario-a02_nombre').value = res[0];
                document.getElementById('perfilusuario-a02_apaterno').value = res[1];
                document.getElementById('perfilusuario-a02_amaterno').value = res[2];
                document.getElementById('users-email').value = res[3];
                document.getElementById('perfilusuario-a02_telfono').value = res[4];
                document.getElementById('perfilusuario-a02_direccion').value = res[5];
            }
        });
    }

}