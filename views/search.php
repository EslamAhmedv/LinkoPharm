<script> $(document).ready(function() {
    $('#search-input').on('input', function() {
        var searchTerm = $(this).val();
        if (searchTerm.length > 0) {
            $.ajax({
                type: 'GET',
                url: 'search_backend.php',
                data: { search: searchTerm },
                success: function(response) {
                    $('#search-results').html(response);
                }
            });
        } else {
            $('#search-results').html('');
        }
    });
});
</script>
