$('body').on('click', '.btn-show', function(event){
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').hide();

    $.ajax({
        url: url,
        dataType: 'html',
        success: function(response){
            $('.modal-body').html(response);
        }
    });

    $('#ajaxModal').modal('show');
});
