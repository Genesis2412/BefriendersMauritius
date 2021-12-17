$(document).ready(function(){

    $('#Suicide').click(function(){

        
        $('#DisplayerBefriendersMu').hide('slow','swing');
        $('#DisplayerTalkOnSuicide').hide('slow','swing');
        $('#DisplayerSuicide').fadeIn('slow');
    })

    $('#BefriendersMu').click(function(){

        
        $('#DisplayerSuicide').hide('slow','swing');
        $('#DisplayerTalkOnSuicide').hide('slow','swing');
        $('#DisplayerBefriendersMu').fadeIn('slow');
    })

    $('#TalkOnSuicide').click(function(){

        
        $('#DisplayerBefriendersMu').hide('slow','swing');
        $('#DisplayerSuicide').hide('slow','swing');
        $('#DisplayerTalkOnSuicide').fadeIn('slow');
    })

});