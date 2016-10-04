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
function DateDiff(date1,date2)
{
    var dt1 = new Date(date1);
    if (dt1.getFullYear() < 2000) {
        dt1.setFullYear(dt1.getFullYear()+1911) ;
    }
    var dt2 = new Date(date2);
    if (dt2.getFullYear() < 2000) {
        dt2.setFullYear(dt2.getFullYear()+1911) ;
    }

    
    var iDays = parseInt((dt2 - dt1 )/ 1000 / 60 / 60 /24) //把相差的毫秒數轉換爲天數

    return iDays

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
