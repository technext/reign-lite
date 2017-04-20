<div class="col-md-4 col-md-offset-0">
    <div class="sidebar hidden-sm hidden-xs">

<?php

if(is_blog()){
    if(is_active_sidebar('blog-page-sidebar')){
        dynamic_sidebar('blog-page-sidebar');
    }
}
else{

}

?>

    </div>
</div>
