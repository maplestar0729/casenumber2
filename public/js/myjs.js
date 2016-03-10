function padLeft(str,lenght){
    if(str.length >= lenght)
        return str;
    else
        return padLeft("0" +str,lenght);
}
function checkValEng( str ) {
    var regExp = /^[A-Za-z]+$/;
    return regExp.test(str);
        
}
