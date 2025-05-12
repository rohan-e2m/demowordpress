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


jQuery(document).ready(function($) {
    // Load toys initially
    function loadToys(page = 1, category = '') {
        $.ajax({
            url: toys_ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_toys',
                page: page,
                category: category,
                nonce: toys_ajax_obj.nonce
            },
            success: function(response) {
                if (page === 1) {
                    $('#toys-results').html(response);
                } else {
                    $('#toys-results').append(response);
                }

                // If no more posts, hide Load More button
                if (response === '') {
                    $('#load-more-toys').hide();
                }
            }
        });
    }

    // Handle category change
    $('#toys-category-dropdown').on('change', function() {
        const selectedCategory = $(this).val();
        $('#load-more-toys').data('page', 1); // Reset page number on category change
        loadToys(1, selectedCategory); // Reload posts
    });

    // Load more posts when clicking "Load More"
    $('#load-more-toys').on('click', function() {
        const page = $(this).data('page') + 1;
        const category = $('#toys-category-dropdown').val();
        loadToys(page, category);
        $(this).data('page', page); // Update page number
    });

    // Initial load
    loadToys(1);
});
