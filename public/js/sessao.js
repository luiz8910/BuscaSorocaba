$(function(){
    $('#shopping').change(function () {
        var shopping = $('#shopping').val();

        var request = $.ajax({
            method: 'GET',
            url: '/ajaxSalas/'+shopping,
            data: shopping,
            dataType: 'json'
        });

        request.done(function (e) {
            console.log('Done');
            console.log(e);

            $('#sala').empty();

            var list = '';

            for (var k in e) {
                list += "<option value="+e[k].id+">"+ "Sala " +e[k].numero+"</option>";
            }

            $('#sala').attr('disabled', false).append(list);
        });

        request.fail(function (e){
            console.log('Fail');
            console.log(e);
        });
    });

    return false;
});