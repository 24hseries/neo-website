<?php

global $novelty_wide_start;
global $novelty_wide_end;

$wide = 'false'===strtolower($shortcode['wide']) ? false : (bool) $shortcode['wide'];

if($wide&&''!==$novelty_wide_start)
    echo $novelty_wide_start;

echo '<div class="our-team">';

if($wide&&''!==$novelty_wide_start)
    echo '<div class="container">';

?>

<?php if(count($slides)): ?>

<?php
$size = (int)round(12/(int)$shortcode['columns']);
$columns = (int)floor(12/$size);
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>

<div class="row">

    <?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
    <?php if($i&&!($i%$columns)): ?>
</div>
<div class="row">
    <?php endif; ?>

    <div class="col-md-<?php echo $size; ?>">
        <div class="our-member">
            <div class="our-member-cover">
                <?php if(''!==$slide['options']['url']): ?>
                <a href="<?php echo $slide['options']['url']; ?>">
                    <img src="<?php echo esc_attr($slide['options']['image']); ?>" alt="team member">
                </a>
                <?php else: ?>
                <img src="<?php echo esc_attr($slide['options']['image']); ?>" alt="team member">
                <?php endif; ?>
            </div>
            <h4><?php echo get_the_title($slide['post']->ID); ?><span><?php echo $slide['options']['position']; ?></span></h4>
            <?php echo wpautop($slide['options']['description']); ?>
            <?php if(''!==$slide['options']['facebook']||''!==$slide['options']['twitter']): ?>
            <ul>
                <?php if(''!==$slide['options']['facebook']): ?>
                <li><a href="<?php echo esc_attr($slide['options']['facebook']); ?>" class="our-member-facebook"></a></li>
                <?php endif; ?>
                <?php if(''!==$slide['options']['twitter']): ?>
                <li><a href="<?php echo esc_attr($slide['options']['twitter']); ?>" class="our-member-twitter"></a></li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>

    <?php endforeach; ?>

</div>

<?php endif; ?>

<?php

if($wide&&''!==$novelty_wide_start)
    echo '</div>';

echo '</div>';

if($wide&&''!==$novelty_wide_end)
    echo $novelty_wide_end;

?>