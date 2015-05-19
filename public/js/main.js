$(function(){
    changeStatusHeights();
    // ('.task div').draggable({
    //     helper: clone
    // });

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
                    $('#' + status).append(taskDiv);
                    console.log();
                    $('div#' + id).draggable({
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
    maxHeight = maxHeight * 5;
    $('.status').css('height', maxHeight);
}