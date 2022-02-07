$(window).on('load',function(){

    $('#btn-modal').on('click',function(){

        const toolbar = document.getElementById('')

        if($('#model-overlay')[0])
        return false;

        $('body').append('<div id="modal-overlay"></div>');

        $('#modal-overlay').fadeIn('fast');

        $('#modal-content').fadeIn('fast');

        centeringModal();

        function centeringModal(){

            let w = $(window).width();

            let cw = $("#modal-content").outerWidth();

            let pxleft = ((w - cw)/2);
            let pxtop  = 66;


            $("#modal-content").css({"left": pxleft +"px"});
            $("#modal-content").css({"top": pxtop + "px"});


        }

        $('#next').on('click',function(){

            $('#modal-overlay,#modal-content').fadeOut('fast');
            $('#modal-overlay').remove();

        });

        $('#cancel').on('click',function(){
            $('#modal-overlay,#modal-content').fadeOut('fast');
            $('#modal-overlay').remove();
            location.href =$(this).attr("href");
        });

    });

});
