function hideTable(){
    var attached = false;
    if (attached === false){
        $('.headers').click(function()
        {
            attached = true;
            $(this).nextUntil('tr.headers').toggleClass('hide');
        });
    }
}
