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
        selector: '#code',
        validate: ['presence', 'max-length:10'],
        errorMessage: ['Code field is required',  'Cannot have more than 10 characters']
    },
    {
        selector: '#name',
        validate: ['presence', 'max-length:50'],
        errorMessage: ['Name is required',  'Cannot have more than 50 characters', ]
    },
    {
        selector: '$description',
        validate: ['max-length:255'],
        errorMessage: ['Cannot have more than 255 characters', ]
    },
]);
