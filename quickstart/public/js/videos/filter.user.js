$(function() {
    $('#user_filter').on(
        'submit',
        function(event) {
            event.preventDefault();
            event.stopPropagation();

            $.ajax(
                $(this).data('url').toString(),
                { 'userId': $(this).find('select').val() },
                function(data) {
                    $('#videos_list').fadeOut('fast').html(data).fadeIn('fast');
                },
                'html'
            );
        }
    );
});