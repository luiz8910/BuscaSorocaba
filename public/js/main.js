$(function () {
    var requestList = $.ajax({
        method: 'GET',
        url: '/get',
        data:{ListAll: 'list'},
        dataType: 'json'
    });

    requestList.done(function (e) {
        console.log(e);

        var table = '<thead> <tr> <th>#</th> <th>Name</th> <th>Email</th> <th>Telefone</th> </tr> </thead>';

        for(var k in e)
        {
            table += '<tr><th scope="row">'+e[k].id+'</th>';
            table += '<td>'+e[k].name+'</td>';
            table += '<td>'+e[k].email+'</td>';
            table += '<td>'+e[k].tel+'</td>';
            table += '</tr>';
        }

        table += '</tbody>';

        $('#contacts').html(table);

    });

    $('#AjaxRequest').submit(function () {
        var form = $(this).serialize();

        var request = $.ajax({
            method: 'GET',
            url: "/post",
            data: form,
            dataType: 'json'
        });

        request.done(function (e) {
            //console.log('done');

            $('#msg').html(e.msg);

            if(e.status)
            {
                $('#AjaxRequest').each(function () {
                    this.reset();
                });

                var table = '<tr><th scope="row">'+e.contacts.id+'</th>';
                table += '<td>'+e.contacts.name+'</td>';
                table += '<td>'+e.contacts.email+'</td>';
                table += '<td>'+e.contacts.tel+'</td>';
                table += '</tr>';

                $('#contacts tbody').prepend(table);
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
