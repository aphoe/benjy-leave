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
    /*{
        selector: '#office_branch_type_id',
        validate: ['presence'],
        errorMessage: ['Branch type field is required' ]
    },
    {
        selector: '#branch_head_id',
        validate: ['integer'],
        errorMessage: ['Chosen option is invalid']
    },
    {
        selector: '#name',
        validate: ['presence', 'max-length:50'],
        errorMessage: ['Name is required',  'Cannot have more than 50 characters']
    },
    {
        selector: '#description',
        validate: ['max-length:50'],
        errorMessage: ['Cannot have more than 50 characters']
    },
    {
        selector: '#address',
        validate: ['presence', 'max-length:50'],
        errorMessage: ['Address is required',   'Cannot have more than 50 characters']
    },
    {
        selector: '#landmark',
        validate: ['max-length:50'],
        errorMessage: ['Cannot have more than 50 characters']
    },
    {
        selector: '#city',
        validate: ['presence', 'max-length:60'],
        errorMessage: ['City is required', 'Cannot have more than 60 characters']
    },
    {
        selector: '#country',
        validate: ['presence'],
        errorMessage: ['Country is required']
    },
    {
        selector: '#zip_code',
        validate: ['max-length:15'],
        errorMessage: ['Cannot have more than 15 characters', ]
    },*/
]);
