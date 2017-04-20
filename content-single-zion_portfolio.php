<?php
/**
 * Created by PhpStorm.
 * User: aqib
 * Date: 6/30/16
 * Time: 5:27 PM
 */

$project_summury = rwmb_meta('project_summary');
$project_images = rwmb_meta('project_images');
$client_name = rwmb_meta('client_name');
$project_date = rwmb_meta('project_date');
$project_link = rwmb_meta('project_link');
$project_story = rwmb_meta('project_story');
//print_r($project_date);die();
//print_r($project_images);die();
//print_r($project_link);die();


?>

<?php if($project_summury != ''): ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <p class="led">
                    <?php echo $project_summury; ?>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="container">
    <?php if(is_array($project_images) && count($project_images) > 0 ): ?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="flexslider">
                <ul class="slides">
                    <?php foreach ($project_images as $image): ?>
                        <li>
                            <img src="<?php echo $image['full_url']; ?>">
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($project_story != '' || $client_name != '' || $project_link != '' || $project_date != ''): ?>
        <div class="row portfolio-details-single">
            <?php if($client_name != '' || $project_date != '' || $project_link != ''): ?>
                <div class="col-sm-4 col-md-3 col-md-offset-1">
                    <h4>Project Details</h4>
                    <ul>
                        <?php if($client_name != ''): ?>
                            <li><strong>Client: </strong><?php echo $client_name; ?></li>
                        <?php endif; ?>
                        <?php if($project_date != ''): ?>
                            <li><strong>Date: </strong><?php echo (new DateTime($project_date))->format('d M ,Y'); ?></li>
                        <?php endif; ?>
                        <?php if($project_link != ''): ?>
                            <li><strong>Online: </strong><a href="<?php echo $project_link; ?>"><?php echo $project_link; ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if($project_story != ''): ?>
                <div class="col-sm-8 col-md-7">
                    <h4>Project Story</h4>
                    <p><?php echo $project_story; ?></p>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>


