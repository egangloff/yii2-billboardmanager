// Show and hide content types
function showType(type){
    if(type == 0){
        $('.field-content-upload_image').show();
        $('.content-image').show();
        $('.content-video').hide();
        $('.field-content-upload_video').hide();
    }
    else if(type == 1){
        $('.field-content-upload_image').hide();
        $('.content-image').hide();
        $('.content-video').show();
        $('.field-content-upload_video').show();
    }
}
$('#content-type').change(function() {
    showType(this.value)
});

// Show and hide schedule datetime widgets
function showDate(always){
    if(always == 0){
        $('.dates').show();
    }
    else if(always == 1){
        $('.dates').hide();
    }
}
$('#schedule-always').change(function() {
    showDate( this.value);
});
$( function() {
    x = $('#schedule-always').val();
    showDate(x);
});

// Sort contents
$( function() {
    $( "#sortable" ).sortable({
        update: function (event, ui) {
            var items = $(this).sortable('serialize');
            var id = $('#playlistcontent-fkplaylist').val();
            $.ajax({
                data: items,
                type: 'POST',
                url: '/billboard/playlist/ordercontent?id='+id
            });
        }
    });
    $( "#sortable" ).disableSelection();
} );
