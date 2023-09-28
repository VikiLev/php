
/*
    register
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let name = $('input[name="name"]').val(),
        lastname = $('input[name="lastname"]').val(),
        email = $('input[name="email"]').val(),
        password = $('input[name="password"]').val(),
        password_confirm = $('input[name="password_confirm"]').val();

    let form = document.getElementById("form_register"),
        msg = document.getElementById("msg");

    let formData = new FormData();
    formData.append('name', name);
    formData.append('lastname', lastname);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);


    $.ajax({
        url: 'vendor/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success (data) {
            if (data.status) {
                console.log('"registration was successful')
                form.style.display = "none";
                $('#msg').show().addClass('success text-success').text(data.message);
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error text-danger');
                    });
                }
                $('#msg').show().addClass('error text-danger').text(data.message);
            }
        }
    });

});
