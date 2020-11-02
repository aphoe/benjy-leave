//Custom check functions
/*nodUrl = function(){
    return function(callback, value){
        if(value === null || value === ''){
            callback(true);
        }else {
            callback(isUrlValid(value));
        }
    }
};*/

nodUrl = function(callback, value){
    console.log('nod url');
    if(value === null || value === ''){
        callback(true);
    }else {
        callback(isUrlValid(value));
    }
}
