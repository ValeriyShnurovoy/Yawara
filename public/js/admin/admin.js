$( document ).ready(function() {    

    $(".configuration").on("change", ".accessValue", function () {
    	sendAccessConfiguration($(this));
    });

    $(".userrole").on("change", ".role_id", function () {
        sendUserRole($(this));
    });
});

function sendAccessConfiguration(chk)
{	
    let data = {
        role_id: $(chk).data('id'),
        controller: $(chk).closest('tr').data('controller')
    };
    let requestUrl = urlAccessConfigurationCreate;
    if (!$(chk).prop('checked')) {
        requestUrl = urlAccessConfigurationDelete;
    }
    $.ajax({
        url: requestUrl,
        type: "POST",
        data: data,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            alert('Сhanged!');
        },
        error: function (msg) {
            console.log(msg);
        }
    });
}

function sendUserRole(slt)
{
    let data = {
        id: $(slt).closest('tr').data('id'),
        role_id: $(slt).val()
    }

    $.ajax({
        url: urlUserRoleUpdate,
        type: "POST",
        data: data,
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            alert('Сhanged!');
        },
        error: function (msg) {
            console.log(msg);
        }
    });

}