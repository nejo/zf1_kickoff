$(function() {
    $('#user_filter').on(
        'submit',
        function(event) {
            event.preventDefault();
            event.stopPropagation();

            $.ajax({
                type: 'GET',
                url: $(this).data('url').toString(),
                data: { 'userId': $(this).find('select').val() },
                beforeSend: function() {
                    $('#videos_list').fadeOut('fast');
                },
                success: function(data) {
                    $('#videos_list').html(data).fadeIn('fast');
                },
                dataType: 'html'
            });
        }
    );
});