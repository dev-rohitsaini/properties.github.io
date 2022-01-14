$(document).ready(function() {
    $('#form').validate({
        rules: {
            first_name: "required",
            last_name: "required",

            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 12
            },

            password: {
                required: true,
                minlength: 6,
                maxlength: 35,
            },
            confirm_password: {
                required: true,
                minlength: 6,
                maxlength: 35,
                equalTo: '#password'
            },
        },
        messages: {
            first_name: "please enter your first name",
            last_name: "please enter your last name",
            password: {
                required: "please provide your password",
                minlength: "your password must consist atleast 6 character"
            },
            confirm_password: {
                required: "please provide your password",
                minlength: "your password must consist atleast 6 character",
                equalTo: "please enter the same password above"
            },
            email: {
                required: "please enter your mail id"
            },
            phone: {
                required: "enter your phone number",
                maxlength: "not more then 12 digit"
            }
        }
    });
});