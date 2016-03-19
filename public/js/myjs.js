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

$.fn.inlineEdit = function(replaceWith, connectWith) {

    $(this).hover(function() {
        $(this).addClass('hover');
    }, function() {
        $(this).removeClass('hover');
    });

    $(this).click(function() {

        var elem = $(this);

        elem.hide();
        elem.after(replaceWith);
        replaceWith.focus();

        replaceWith.blur(function() {

            if ($(this).val() != "") {
                connectWith.val($(this).val()).change();
                elem.text($(this).val());
            }

            $(this).remove();
            elem.show();
        });
    });
};
