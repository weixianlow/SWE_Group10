$(function(){

    $('input[type="text"]').keyup(function(){
        
        var searchText = $(this).val().toLowerCase();
        
        $('ul > div > a > li').each(function(){
            
            var currentLiText = $(this).text().toLowerCase(),
                showCurrentLi = currentLiText.indexOf(searchText) !== -1;
            
            $(this).parent().parent().toggle(showCurrentLi);
            
        });     
    });

});