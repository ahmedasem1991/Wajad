function hideTable(){
        $('.headers').click(function()
        {
            $('.coll').replaceWith($('<h1>+</h1>'));
            $(this).nextUntil('tr.headers').toggleClass('hide');
        });
}
