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

//myNod.checkFunctions['url'];

$(document).ready(function () {
    myNod.performCheck();
});

myNod.add([
    {
        selector: '#name',
        validate: ['presence', 'min-length:3', 'max-length:120'],
        errorMessage: ['Company name is required',  'Cannot be shorter than 3 characters', 'Cannot have more than 120 characters']
    },
    {
        selector: '#short_form',
        validate: ['max-length:30'],
        errorMessage: ['Cannot have more than 30 characters']
    },
    {
        selector: '#industry',
        validate: ['presence', 'max-length:255'],
        errorMessage: ['Industry field is required',  'Cannot have more than 255 characters', ]
    },
    {
        selector: '#slogan',
        validate: ['max-length:120'],
        errorMessage: ['Cannot have more than 120 characters', ]
    },
    {
        selector: '#vision',
        validate: ['min-length:10', 'max-length:255'],
        errorMessage: ['Cannot be shorter than 10 characters', 'Cannot have more than 255 characters', ]
    },
    {
        selector: '#mission',
        validate: ['min-length:10', 'max-length:255'],
        errorMessage: ['Cannot be shorter than 10 characters', 'Cannot have more than 255 characters', ]
    },
    {
        selector: '#url',
        validate: ['presence', 'url'],
        errorMessage: ['Website is required', 'This is an invalid URL', ]
    },
    {
        selector: '#email',
        validate: ['presence', 'email'],
        errorMessage: ['Email address is required',  'This is not a valid email address']
    },
    {
        selector: '#no_reply_email',
        validate: ['presence', 'email'],
        errorMessage: ['No-reply email address is required',  'This is not a valid email address']
    },
    {
        selector: '#phone',
        validate: ['presence', ],
        errorMessage: []
    },
]);
