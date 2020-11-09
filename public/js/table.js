function hideTable(){
        $('.headers').click(function()
        {
            $('button').replaceWith($('<h1>+</h1>'));
            $(this).nextUntil('tr.headers').toggleClass('hide');
        });
}
