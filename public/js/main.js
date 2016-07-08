$(function () {
    $('#AjaxRequest').submit(function () {
        var form = $(this).serialize();

        var request = $.ajax({
            method: 'GET',
            url: "/post",
            data: form,
            dataType: 'json'
        });

        request.done(function (e) {

            $('#msg').html(e.msg);

            if(e.status)
            {
                $('#AjaxRequest').each(function () {
                    this.reset();
                });
            }
            //for (var k in e) {
            //    $('input[name=' + k + ']').val(e[k]);
            //}
        });

        request.fail(function (e) {
            console.log('fail');
            console.log(e);
        });

        //request.always(function(e){
        //    console.log(e);
        //});

        return false;
    });
});
