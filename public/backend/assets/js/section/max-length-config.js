$(document).ready(function () {
    $('.max-length-field').maxlength({
        alwaysShow: true,
        threshold: 30,
        warningClass: "form-text text-info",
        limitReachedClass: "form-text text-danger",
        placement: 'bottom-right-inside',
        preText: 'Used ',
        separator: ' of ',
        postText: ' characters.'
    });
});
