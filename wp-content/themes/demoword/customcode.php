<style type="text/css"> 
	.three-column-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    padding: 20px;
}

.post-item {
    background: #fff;
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.post-thumbnail img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
}
#toys-category-filter {
    margin-bottom: 20px;
}

#toys-category-filter select {
    padding: 8px;
    font-size: 16px;
}
#load-more-toys {
    display: block;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #0073e6;
    color: white;
    border: none;
    font-size: 16px;
    cursor: pointer;
    border-radius: 4px;
}

#load-more-toys:hover {
    background-color: #005bb5;
}

#load-more-toys:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}



</style>
<div id="toys-filter">
    <select id="toys-category-dropdown">
        <option value="">All Categories</option>
        <?php
        $terms = get_terms(array(
            'taxonomy'   => 'toys_categories',
            'hide_empty' => true,
        ));
        foreach ($terms as $term) {
            echo '<option value="' . esc_attr($term->slug) . '">' . esc_html($term->name) . '</option>';
        }
        ?>
    </select>
</div>


<?php
$args = array(
    'post_type'      => 'toys',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'ASC'
);
$query = new WP_Query($args);

if ($query->have_posts()) : ?>
<div id="toys-results">
    <div class="three-column-grid">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="post-item">
                <h3><?php the_title(); ?></h3>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>">Read More</a>
            </div>
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>No posts found.</p>
<?php endif; ?>
</div>
<button id="load-more-toys" data-page="1">Load More</button>


