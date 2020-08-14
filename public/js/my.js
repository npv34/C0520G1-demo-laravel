$(document).ready(function () {
    $('.user-item').hover(function () {
        $(this).css('background-color','red')
        $(this).css('color','white')

    }, function () {
        $(this).css('background-color','white')
        $(this).css('color','black')
    })

    $('#show-hide-name').click(function () {
        $('.user-name').toggle();
    })

    $('#show-hide-all').click(function () {
        $('.user-name').toggle();
        $('.user-email').toggle();
    })

    let origin = location.origin
    function getListUser() {
        $.ajax({
            url: origin + '/admin/users',
            method: 'GET',
            success: function () {
                console.log(1)
            }
        })
    }

    getListUser();

    function deleteUser(idUser) {
        $.ajax({
            url: origin + '/admin/users/' + idUser + '/delete',
            method: 'GET',
            success: function (result) {
                console.log(result);
                $('#user-'+idUser).remove();
            }
        })
    }

    $('.delete-user').click(function () {
        if (confirm("ban chac chan muon xoa")){
            let id = $(this).attr('data-id');
            //console.log(id);
            deleteUser(id);
        }
    })

    $('#search-user').keyup(function () {
        let value = $(this).val();
        console.log(value);
    })

})
