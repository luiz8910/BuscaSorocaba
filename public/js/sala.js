$(function(){
    $('#shoppingSala').change(function () {
        $('#numSala').attr('disabled', false).val('');
        $('#erroSala').attr('hidden', true);
    });

    $('#numSala').change(function () {
       var shopping = $('#shoppingSala').val();

        var request = $.ajax({
            method: 'GET',
            url: '/salaAjax/'+shopping,
            data: shopping,
            dataType: 'json'
        });

        request.done(function(e){
            console.log('done');
            console.log(e);

            var numSala = $('#numSala').val();
            var botao = true;

            for(var k in e)
            {
                if(e[k].numero == numSala)
                {
                    botao = false;
                }
            }

            if(botao)
            {
                $('#botaoSala').attr('disabled', false);
                $('#erroSala').attr('hidden', true);
            }
            else{
                $('#erroSala').attr('hidden', false);
                $('#botaoSala').attr('disabled', true);
            }

        });

        request.fail(function (e) {
            console.log('fail');
            console.log(e);
        })
    });


});