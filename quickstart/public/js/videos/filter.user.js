$(function() {
    $('#user_filter').on(
        'submit',
        function(event) {
            event.preventDefault();
            event.stopPropagation();

            $.get(
                $(this).data('url').toString(),
                { 'userId': $(this).find('select').val() },
                function(data) {
                    alert(data);
                },
                'html'
            );
        }
    );
});