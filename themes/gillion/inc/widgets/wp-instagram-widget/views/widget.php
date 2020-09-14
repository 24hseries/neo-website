<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }
$atts = $params;
$username = !empty( $atts['username'] ) ? $atts['username'] : '';
$limit = !empty( $atts['number'] ) ? $atts['number'] : 6;
$image_size = !empty( $atts['size'] ) ? $atts['size'] : 6;


if( $image_size == 'thumbnail' ) :
    $image = '150';
elseif( $image_size == 'small' ) :
    $image = '320';
elseif( $image_size == 'large' ) :
    $image = '640';
else :
    $image = '640';
endif;
?>

<?php echo wp_kses_post( $before_widget );
if( $atts['title'] ) :
    echo '<div class="sh-widget-title-styling"><h3 class="widget-title">'.esc_attr( $atts['title'] ).'</h3></div>';
endif;
?>



<script>
    (function($){
        $(window).on('load', function(){
            $.instagramFeed({
                'username': '<?php echo esc_attr( $username ); ?>',
                'container': "#instagram-feed1",
                'display_profile': false,
                'display_biography': false,
                'display_gallery': true,
                'callback': null,
                'styling': true,
                'items': <?php echo intval( $limit ); ?>,
                'items_per_row': <?php echo intval( $limit ); ?>,
                'margin': 0,
                'image_size': <?php echo esc_attr( $image ); ?>,
                'styling': 0,
            });
        });
    })(jQuery);
</script>


<style media="screen">
.null-instagram-feed .instagram_gallery a {
	width: 50%;
}

.sh-instagram-widget-columns3 .null-instagram-feed .instagram_gallery a {
	width: 33.3%;
}

body .sh-footer-instagram .null-instagram-feed {
    padding: 0 10px 20px 10px;
}

body .sh-footer-instagram .null-instagram-feed .instagram_gallery a {
	width: 16.6666666667%;
}

@media (max-width: 767px) {
	body .sh-footer-instagram .null-instagram-feed .instagram_gallery a {
		width: 33.3%;
	}
}

.sh-widget-instagramv2 a {
    display: inline-block;
    vertical-align: top;
    padding: 5px;
    position: relative;
    overflow: hidden;
}

.sh-widget-instagramv2 a:before {
    content: "\f16d";
    font: normal normal normal 14px/1 FontAwesome;
    color: #fff;
    font-size: 21px;

    display: block;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 5px;
    opacity: 0;
    transition: 0.5s opacity ease-in-out;
    border-radius: 8px;
    background-color: rgba(47, 47, 47, 0.3);
    background: -webkit-linear-gradient( rgba(0,0,0,0), #232323 );
    background: -moz-linear-gradient( rgba(0,0,0,0), #232323 );
    background: -o-linear-gradient( rgba(0,0,0,0), #232323 );
    background: linear-gradient( rgba(47, 47, 47, 0.1), rgba(47, 47, 47, 0.3) );
    display: flex;
    align-items: center;
    justify-content: center;
}

.sh-widget-instagramv2 a:hover:before {
    opacity: 1;
}

.sh-widget-instagramv2 img {
    border-radius: 8px;
}

.sh-widget-instagramv2 img {
    width: 100%!important;
}
</style>


<div id="instagram-feed1" class="sh-widget-instagramv2"></div>

<?php echo wp_kses_post( $after_widget ); ?>
