$(document).ready(function () {

    jQuery.validator.addMethod(
        "regex",
        function (value, element, param) {
            return value.match(new RegExp("^" + param + "$"));
        }
    );
    var ALPHA_REGEX = "[a-zA-Z_ ]*";
    var ALPHA_REGEXn = "[0-99-0_ ]*";

    jQuery.validator.addMethod(
        'Uppercase',
        function (value) {
            return /[A-Z]/.test(value);
        },
        'Your password must contain at least one Uppercase Character.'
    );
    jQuery.validator.addMethod(
        'Lowercase',
        function (value) {
            return /[a-z]/.test(value);
        },
        'Your password must contain at least one Lowercase Character.'
    );
    jQuery.validator.addMethod(
        'Specialcharacter',
        function (value) {
            return /[!@#$%^&*()_-]/.test(value);
        },
        'Your password must contain at least one Special Character.'
    );
    jQuery.validator.addMethod(
        'Onedigit',
        function (value) {
            return /[0-9]/.test(value);
        },
        'Your password must contain at least one digit.'
    );
    jQuery.validator.addMethod(
        "noSpace",
        function (value, element) {
            return value == '' || value.trim().length != 0;
        },
        "No space please and don't leave it empty");

    $("#regform").validate({
        rules: {
            name: {
                required: true,
                minlength: 2,
                regex: ALPHA_REGEX,
                noSpace: true,
            },
            address: {
                required: true,
            },
            contact: {
                required: true,
                minlength: 10,
                maxlength: 10,
                regexno: ALPHA_REGEXn,
                noSpace: true,
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                maxlength: 18,
                minlength: 8,
            },
            checkbox: {
                required: true,
            }
        },
        messages: {
            name: {
                required: " Please enter your name",
                minlength: "Name need to be at least 2 characters long",
                regex: "Please enter characters only"
            },
            email: {
                required: " Please enter your email",
            },
            address: {
                required: " Please enter your address",
            },
            password: {
                required: "Please enter your password",
                minlength: "Password need to be at least 8 characters long",
                maxlength: "Password need to be atleast  18 characters long",
            },
            contact: {
                required: "Please enter your phone no",
                minlength: "phone number must be 10 digits",
                maxlength: "phone number must be 10 digits",
                regexno: "please enter digits only"
            },
            checkbox: {
                required: "Please except our terms conditions"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                Uppercase: true,
                Lowercase: true,
                Specialcharacter: true,
                Onedigit: true,
                maxlength: 18,
                minlength: 8,
            }
        },
        messages: {
            email: {
                required: " Please enter your email",
            },
            password: {
                required: "Please enter your password",
                minlength: "Password need to be at least 8 characters long",
                maxlength: "Password need to be atleast  18 characters long",
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('.nav-link').click(function () {
        // e.preventDefault();
        $('.nav-link').removeClass('active bg-gradient-primary');
        $(this).addClass('active bg-gradient-primary');
    });

    $("#useredit").validate({
        rules: {
            name: {
                required: true,
            },
            },
        messages: {
            name: {
                required: " Please enter your car company name",
            },
           
        },
        submitHandler: function (form) {
            alert("dddd");
            var formData = new FormData(form);
            alert("ddddddg");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                url: "/Admin/editProfile",
                type: "JSON",
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,
                success: function (response) {
                    // console.log(response);
                    // alert(response);
                    var data = JSON.parse(response);
                    if (data["status"] == 0) {
                        alert(data["message"]);
                    } else {
                        $("#updateModal").modal("hide");
                        // $("#ajaxeditUser").modal("hide");
                        swal("Good job!", "The car has been saved!", "success");
                    }
                },
            });
        },
    });



    $('body').on('click', '.deleteUser', function () {

        var id = $(this).next('input').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var hidetr = $(this).parents('tr');
                    $.ajax({
                        url: "/admin/deleteuser",
                        data: { 'id': id },
                        type: "JSON",
                        method: "get",
                        success: function (response) {
                            var data = JSON.parse(response);
                            var status = data['status'];
                            if (status == '1') {
                                hidetr.hide();
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Your imaginary file is safe!");
                            }
                        }
                    });
                }
            });
        return false;
    });
    $('body').on('click', '.categoryUser', function () {

        var id = $(this).next('input').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var hidetr = $(this).parents('tr');
                    $.ajax({
                        url: "/admin/deletecategory",
                        data: { 'id': id },
                        type: "JSON",
                        method: "get",
                        success: function (response) {
                            var data = JSON.parse(response);
                            var status = data['status'];
                            if (status == '1') {
                                hidetr.hide();
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Your imaginary file is safe!");
                            }
                        }
                    });
                }
            });
        return false;
    });
    $('body').on('click', '.productUser', function () {

        var id = $(this).next('input').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    var hidetr = $(this).parents('tr');
                    $.ajax({
                        url: "/admin/deleteproduct",
                        data: { 'id': id },
                        type: "JSON",
                        method: "get",
                        success: function (response) {
                            var data = JSON.parse(response);
                            var status = data['status'];
                            if (status == '1') {
                                hidetr.hide();
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Your imaginary file is safe!");
                            }
                        }
                    });
                }
            });
        return false;
    });
    $('body').on('click', '.editUser', function () {
        var id = $(this).next('input').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            type: "get",
            url: "/admin/updateuser",
            data: {
                "id": id,
            },
            success: function (response) {
                var json = $.parseJSON(response);
                $('#updateModal').modal('show');
                $.each(json, function () {
                    $("#iddd").val(json['id']);
                    $("#name").val(json['name']);
                    $("#email").val(json['email']);
                    $("#address").val(json['address']);
                    $("#contact").val(json['contact']);
                    $("#imagedd").val(json['profile_image']);
                    $("#profile-image").val(json['profile_image']);
                    var image = json['profile_image'];
                    // console.log(image,'dsdsd');
                    document.querySelector("#profile-image")
                    .setAttribute("src", '/img/'+image);
                });
    
            }
        })
        return false
    });
});