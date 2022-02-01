
$("#download").on('click',function(){

    $.ajax({

    type: 'POST',
    url: '/labor/download',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    contentType: 'application/json',
    data: {'list': JSON.stringify(searchlists)},

    }).done((res)=>{

    console.log('成功');

    }).fail((error)=>{

    console.log(error.statusText);

    });

});
