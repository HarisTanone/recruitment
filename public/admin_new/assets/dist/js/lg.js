$(document).ready(function () {
    $('#logout').click(function (e) {
        e.preventDefault();
        swal({
                title: "Logout",
                text: "Are You Sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = '{{url("keluar")}}'
                }
            });
    });
    $('.reset').click(function (e) {
        e.preventDefault();
        $('#reset-pw').modal('show')
        $.get("{{url('new/cari/')}}" + $('#user_id').val(),
            function (data) {
                $('#id').val(data.data.id)
                $('#name').val(data.data.name)
                $('#email').val(data.data.email)
                $('#role').val(data.role)
            },
            "json"
        );
    });
    $('#data-form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{url('new/update')}}",
            data: $(this).serialize(),
            dataType: "json",
            success: function (res) {
                if (res.status == 200) {
                    swal({
                        title: "Success",
                        text: res.message,
                        icon: "success"
                    });
                    $('#reset-pw').modal('hide')
                }
            }
        });
    });
});
