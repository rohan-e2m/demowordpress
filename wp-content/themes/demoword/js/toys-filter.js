jQuery(document).ready(function($) {
    function loadToys(category = '') {
        $.ajax({
            url: toys_ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_toys',
                category: category,
                nonce: toys_ajax_obj.nonce
            },
            success: function(response) {
                $('#toys-results').html(response);
            }
        });
    }

    $('#toys-category-dropdown').on('change', function() {
        const selectedCategory = $(this).val();
        loadToys(selectedCategory);
    });

    // Load all toys on page load
    loadToys();
});
