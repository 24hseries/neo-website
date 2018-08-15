<?php
$nr = (int)$shortcode['nr'];
if(!$nr)
    $nr = count($slides);
?>
<?php if(''!==$shortcode['title']): ?>
<h2><?php echo $shortcode['title']; ?></h2>
<?php endif; ?>
<?php foreach($slides as $i => $slide): if($i>=$nr) break; ?>
<div class="skill">
    <div style="width: <?php echo $slide['options']['value']; ?>%" class="skill-fill site-bg-color"><span class="site-bg-color"><?php echo $slide['options']['value']; ?>%</span><?php echo get_the_title($slide['post']->ID); ?></div>
</div>
<?php endforeach; ?>