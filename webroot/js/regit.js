$(document).ready(function() {
    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0}');
    $('#form').validate({
        rules: {
            "user_profile[first_name]": {
                required: true,
                minlength: 2,
                maxlength: 15,
            },
            "user_profile[last_name]": {
                required: true,
                minlength: 2,
                maxlength: 15,
            },

            email: {
                required: true,
                email: true
            },
            "user_profile[address]": {
                required: true,
            },
            "user_profile[profile_image]": {
                required: true,

                accept: "image/*",
                filesize: 2,

            },




            property_image: {
                required: true,
                accept: "image/*",

            },
            "user_profile[contact]": {
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
            time: {
                required: true,

            },
            slot: {
                required: true,
            },
            comments: {
                required: true,
            },
            category_name: {
                required: true,
            },
            property_title: {
                required: true,
            },
            property_description: {
                required: true,
            },
            property_categories_id: {
                required: true,
            },
            property_tags: {
                required: true,
            },
            category_name: {
                required: true,
            }
        },
        messages: {
            "user_profile[first_name]": {
                required: "please enter your first name",
                minlength: "not more then 2 chracter",
                maxlength: "not more then 12 chracter",
            },
            last_name: {
                required: "please enter your last name",
                minlength: "not more then 2 chracter",
                maxlength: "not more then 12 chracter",
            },
            time: {
                required: "please select date",

            },
            slot: {
                required: "please select time",

            },
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
            contact: {


            },
            "user_profile[address]": {
                required: "Please provide address",

            },
            "user_profile[contact]": {
                required: "enter your phone number",
                number: "Only numeric values are allowed",
                minlength: "not more then 12 digit",
                maxlength: "not more then 12 digit"
            },

            "img": {
                required: "Please upload image",
                extension: "only jpg|jpeg|png|gif files are allowed",
                filesize: "image must be of size or less than 1 mb",

                accept: "please upload only typs image",
            },
            comments: {
                required: "Please fill this",
            },
            property_image: {
                required: "Please upload image",
                image: "Please upload an image type file",
                filesize: "image must be of size or less than 1 mb",
                extension: "You're only allowed to upload jpg or png images.",

            },
            category_name: {
                required: "Please Enter Category",
            },
            property_tags: {
                required: "Please enter the  value of tag",
            },
            property_title: {
                required: "Please enter the  value ",
            },
            property_description: {
                required: "Please enter the  value ",
            },
            category_name: {
                required: "please enter the value ",
            }
        }
    });
});