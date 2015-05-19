$(function(){
    changeStatusHeights();

    $('.status .task').draggable({
        helper: 'clone'
    });

    $('.status').droppable({
        tolerance: 'fit',
        drop: function(event, ui) {
            $('.task').removeAttr('style');
            var taskDiv = ui['helper'][0];
            var id = $(ui.draggable).attr('id');
            var name = $(ui.draggable).attr('name');
            var status = $(this).attr('name');

            $.ajax({
                url: '/scrumboard/update',
                type: 'GET',
                data: {
                    'id': id,
                    'status': status
                },
                success: function(){
                    $(ui.draggable).remove();
                    $('#' + status).append($(ui.draggable));
                    $('div [name="'+name+'"]').draggable({
                        helper: 'clone'
                    });
                }
            });
        }
    });
});

function changeStatusHeights() {
    var heights = $("div.status").map(function ()
    {
        return $(this).height();
    }).get(),

    maxHeight = Math.max.apply(null, heights);
    maxHeight = maxHeight * 3;
    $('.status').css('height', maxHeight);
}