<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); } ?>

<?php echo wp_kses_post( $before_widget ); ?>

<?php
	if( $atts['title'] ) :
		echo '<div class="sh-widget-title-styling"><h3 class="widget-title">'.esc_attr( $atts['title'] ).'</h3></div>';
	endif;
?>

<?php

function gillion_instagram_followers( $client_id = '', $access_token = '' ) {
	$cache_name = esc_attr( 'instagram_x_'.$client_id.'_'.$access_token );
	$client_id = (( !$client_id && $access_token )) ? (int)$access_token : $client_id;

	if( $client_id && $access_token ) :
		if ( false === ( $instagram_follows = get_transient( esc_attr( $cache_name ) ) ) ) {
			$instagram = "https://api.instagram.com/v1/users/$client_id/?access_token=$access_token";
			$instagram_follows = json_decode( wp_remote_retrieve_body( wp_remote_get( $instagram ) ) )->data->counts->followed_by;
			set_transient( esc_attr( $cache_name ), $instagram_follows, 8 * 60 * 60 );
		}

		if( count($instagram_follows) ) :
			return $instagram_follows;
		else :
			$followers = false;
		endif;
	endif;
}

function gillion_facebook_followers( $fbid = '', $app_id = '', $app_secret = '' ) {
	$cache_name = esc_attr( 'facebook_x_'.$fbid.'_'.$app_id.'_'.$app_secret );
	if( $fbid && $app_id && $app_secret ) :

		if ( false === ( $followers = get_transient( esc_attr( $cache_name ) ) ) ) {
			$url = 'https://graph.facebook.com/v2.7/'. $fbid . '?fields=fan_count&access_token='. $app_id . '|' . $app_secret;
			$followers = json_decode( wp_remote_retrieve_body( wp_remote_get( $url ) ) )->fan_count;
			set_transient( esc_attr( $cache_name ), $followers, 8 * 60 * 60 );
		}

		if( is_numeric( $followers ) ) :
			return $followers;
		else :
			$followers = false;
		endif;
	endif;
}

function gillion_youtube_followers( $youtube_channel_id = '', $google_api_key = '' ) {
	$cache_name = esc_attr( 'youtube_x_'.$youtube_channel_id.'_'.$google_api_key );
	if( $youtube_channel_id && $google_api_key ) :

		if ( false === ( $followers = get_transient( esc_attr( $cache_name ) ) ) ) {
			$url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=".$youtube_channel_id."&key=".$google_api_key;
			$followers = json_decode( wp_remote_retrieve_body( wp_remote_get( $url ) ) );

			if( isset( $followers->items[0]) ) :
				$followers = intval( $followers->items[0]->statistics->subscriberCount );
			else :
				$followers = false;
			endif;

			set_transient( esc_attr( $cache_name ), $followers, 8 * 60 * 60 );
		}

		if( is_numeric( $followers ) ) :
			return $followers;
		endif;
	endif;
}

function gillion_googleplus_followers( $googleplus_id = '', $google_api_key = '' ) {
	$cache_name = esc_attr( 'gplus_xz_'.$googleplus_id.'_'.$google_api_key );
	if( $googleplus_id && $google_api_key ) :

		if ( false === ( $followers = get_transient( esc_attr( $cache_name ) ) ) ) {
			$url = "https://www.googleapis.com/plus/v1/people/".$googleplus_id."?key=".$google_api_key;
			$followers = json_decode( wp_remote_retrieve_body( wp_remote_get( $url ) ) );

			if( isset( $followers->circledByCount ) ) :
				$followers = intval( $followers->circledByCount );
			else :
				$followers = false;
			endif;

			var_dump( $followers );

			set_transient( esc_attr( $cache_name ), $followers, 8 * 60 * 60 );
		}

		if( is_numeric( $followers ) ) :
			return $followers;
		endif;
	endif;
}
?>

<?php
if( $atts['demo_mode'] != true ) :
	$facebook = ( $atts['facebook_username'] && $atts['facebook_app_id'] && $atts['facebook_app_secret'] ) ? gillion_facebook_followers( $atts['facebook_username'], $atts['facebook_app_id'], $atts['facebook_app_secret'] ) : false;
	$youtube = ( $atts['youtube_channel_id'] && $atts['youtube_api_key'] ) ? gillion_youtube_followers( $atts['youtube_channel_id'], $atts['youtube_api_key'] ) : false;
	$googleplus = ( $atts['googleplus_id'] && $atts['googleplus_api_key'] ) ? gillion_googleplus_followers( $atts['googleplus_id'], $atts['googleplus_api_key'] ) : false;
	$instagram = ( $atts['instagram_access_token'] ) ? gillion_instagram_followers( $atts['instagram_client_id'], $atts['instagram_access_token'] ) : false;
else :
	$facebook = 1243;
	$youtube = 256;
	$googleplus = 176;
	$instagram = 365;
endif;
$style = ( isset( $atts['style'] ) && $atts['style'] ) ? $atts['style'] : 'style1';


$items = array();
if( is_numeric( $facebook ) ) :
	$items[] = array(
		'id' => 'facebook',
		'title' => esc_html__( 'Like', 'gillion' ),
		'link' => 'https://www.facebook.com/'.$atts['facebook_username'].'/',
		'icon' => 'fa fa-facebook',
		'count' => $facebook,
	);
endif;

if( is_numeric( $googleplus ) ) :
	$link = ( $atts['googleplus_id'] ) ? 'https://plus.google.com/u/0/'.esc_attr( $atts['googleplus_id'] ).'/' : 'https://plus.google.com';
	$items[] = array(
		'id' => 'gplus',
		'title' => esc_html__( 'Subscribe', 'gillion' ),
		'link' => $link,
		'icon' => 'fa fa-google-plus',
		'count' => $googleplus,
	);
endif;

if( is_numeric( $instagram ) ) :
	$link = ( $atts['instagram_username'] ) ? 'https://www.instagram.com/'.esc_attr( $atts['instagram_username'] ).'/' : 'https://www.instagram.com';
	$items[] = array(
		'id' => 'instagram',
		'title' => esc_html__( 'Follow', 'gillion' ),
		'link' => $link,
		'icon' => 'fa fa-instagram',
		'count' => $instagram,
	);
endif;

if( is_numeric( $youtube ) ) :
	$link = ( $atts['youtube_channel_id'] ) ? 'https://www.youtube.com/channel/'.esc_attr( $atts['youtube_channel_id'] ).'/' : 'https://www.youtube.com';
	$items[] = array(
		'id' => 'youtube',
		'title' => esc_html__( 'Subscribe', 'gillion' ),
		'link' => $link,
		'icon' => 'fa fa-youtube-play',
		'count' => $youtube,
	);
endif;
?>

<div class="sh-widget-connected-list sh-widget-connected-<?php echo esc_attr( $style ); ?>">
	<?php foreach( $items as $item ) : ?>
		<?php if( is_numeric( $item['count'] ) ) : ?>
			<?php if( $style == 'style1' ) : ?>

				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" class="sh-widget-connected-item sh-widget-connected-<?php echo esc_attr( $item['id'] ); ?> sh-columns">
					<div class="sh-widget-connected-title">
						<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
						<?php echo esc_attr( $item['title'] ); ?>
					</div>
					<div class="sh-widget-connected-count">
						<span><?php echo esc_attr( $item['count'] ); ?></span>
					</div>
				</a>

			<?php else : ?>

				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank" class="sh-widget-connected-item">
					<div class="sh-widget-connected-bubble sh-widget-connected-<?php echo esc_attr( $item['id'] ); ?>">
						<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>

						<div class="sh-widget-connected-bubble-count sh-widget-connected-<?php echo esc_attr( $item['id'] ); ?>">
							<?php echo esc_attr( $item['count'] ); ?>
						</div>
					</div>
					<div class="sh-widget-connected-title sh-heading-font">
						<?php echo esc_attr( $item['title'] ); ?>
					</div>
				</a>

			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</div>


<?php echo wp_kses_post( $after_widget ); ?>
