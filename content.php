<?php
if(reign_get_blog_layout() == 'blog-standard')
    get_template_part('inc/templates/blog_layouts/standard');
else if(reign_get_blog_layout() == 'blog-grid-2-col')
    get_template_part('inc/templates/blog_layouts/grid_2_col');
else
    get_template_part('inc/templates/blog_layouts/standard');
?>