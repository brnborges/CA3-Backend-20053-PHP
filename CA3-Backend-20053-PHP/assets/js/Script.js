$(document).ready(function() {


    // JS functions
    $('.openModal').on('click', function() {
        var id = $(this).data('id');
        var href = '?controller=veiculo&acao=deletarVeiculo';
        $('#href').attr('href', href + '&id=' + id);
        $('#myModal').modal('show');
    });

    $("#data").datepicker({
        format: " yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });

    // JS Post functions

    $( "#cadastro" ).on('submit', function( event ) {
        if(!validar()){
            event.preventDefault();
        }
    });

    function validar() {    
        var i = 0, counter = 0, funcao;
        funcao = document.forms[0].elements['caracteristica[]'];
            for (; i < funcao.length; i++) {
                if (funcao[i].checked) {
                        counter++;
                    }
            }
        if (counter < 2 ) {
            alert("Select at least 2 categories!\n\nCategories were chosen: " + counter);
                return false;
            }
            alert("Register successfull!.");
            return true;       
    }

    // JS Plate functions

    $("#placa").on('keypress',function (e){
        const regex = new RegExp("^[a-zA-Z0-9\b]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        
        if(regex.test(str)){
            return true;
        }
        e.preventDefault();
        return false;
    });

    $("#placa").on('blur', function(){
        const  placaOld = this.value;
        this.value = placa(placaOld).toUpperCase();
    });

    function placa(placa){
        const parte1 = placa.slice(0,1);
        const parte2 = placa.slice(1,2);
        const parte3 = placa.slice(2,6);

        if (placa.length <= 6 && placa != "") {
            let placaAjustada = `${parte1}-${parte2}-${parte3}`;
            return placaAjustada;
        }
        return placa;
    }
})