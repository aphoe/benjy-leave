var myNod = nod();

// We disable the submit button if there are errors.
myNod.configure({
    submit: '.btn-submit',
    disableSubmit: true,
    form: '#page-form',
    preventSubmit: true,

    // Adding our own classes.
    successClass: 'has-success',
    successMessageClass: 'text-success',
    errorClass: 'has-error',
    errorMessageClass: 'text-danger',

    parentClass: 'form-group',
});

$(document).ready(function () {
    //Force validation check when page is ready
    myNod.performCheck();
});

myNod.add([
    {
        selector: '#surname',
        validate: ['presence', 'max-length:60'],
        errorMessage: ['Surname is required',  'Cannot have more than 60 characters']
    },
    {
        selector: '#first_name',
        validate: ['presence', 'max-length:60'],
        errorMessage: ['First name is required',  'Cannot have more than 60 characters']
    },
    {
        selector: '#other_name',
        validate: ['max-length:60'],
        errorMessage: ['Cannot have more than 60 characters']
    },
    {
        selector: '#email',
        validate: ['presence', 'email'],
        errorMessage: ['Email is required',  'This is not a valid email address']
    },
    {
        selector: '#phone',
        validate: ['presence', 'min-length:5', 'max-length:18'],
        errorMessage: ['Phone number is required',  'Cannot be shorter than 5 characters', 'Cannot have more than 18 characters']
    },
    {
        selector: '#employee_number',
        validate: ['presence', 'max-length:60'],
        errorMessage: ['Employee number is required',  'Cannot have more than 60 characters']
    },
    {
        selector: '#hired',
        validate: ['presence'],
        errorMessage: ['Date of hire is required']
    },
    {
        selector: '#title',
        validate: ['presence', 'max-length:60'],
        errorMessage: ['Title is required',  'Cannot have more than 60 characters']
    },
    {
        selector: '#start',
        validate: ['presence'],
        errorMessage: ['Date of hire is required']
    },

]);
