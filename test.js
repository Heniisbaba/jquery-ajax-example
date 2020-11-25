function addUser() {
    var email = $('#email').val
    var name = $('#name').val
    var password = $('#password').val
    var data = {
        "email": email,
        "name": name,
        "password": password,
    };
    $.ajax({
        url: "data.php",
        method: 'post',
        data: data,
        success: function(data) {
            if (data == 'success') {

                location.reload();
            }
        },
        error: function() { alert("Something went horribly wrong"); }
    });
}