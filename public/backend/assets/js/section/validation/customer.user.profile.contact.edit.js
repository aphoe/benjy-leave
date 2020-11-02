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
        selector: '#phone',
        validate: ['presence'],
        errorMessage: ['Phone no is required']
    },
    {
        selector: '#address',
        validate: ['presence', 'max-length:255'],
        errorMessage: ['Address is required',  'Cannot have more than 255 characters']
    },
    {
        selector: '#landmark',
        validate: ['max-length:255'],
        errorMessage: ['Cannot have more than 255 characters']
    },
    {
        selector: '#city',
        validate: ['presence', 'max-length:60'],
        errorMessage: ['Town/city is required',  'Cannot have more than 60 characters']
    },
]);
