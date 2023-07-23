<?php
/*for loading CSS stylesheet based on main wp-content folder */ 
// function university_files() {
//     wp_enqueue_style('university_main_styles', get_stylesheet_uri());
// }
// add_action('wp_enqueue_scripts', 'university_files');

add_action('admin_init', 'redirectSubstoFrontend');

function redirectSubstofrontend(){
  $ourCurrentUser = wp_get_current_user();

  if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
      wp_redirect(site_url('/'));
  }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar(){
  $ourCurrentUser = wp_get_current_user();

  if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber'){
      show_admin_bar(false);
  }
}

function pageBanner($args) {

  ?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php 
      $pageBannerImage = get_field('page_banner_background_image');
      echo $pageBannerImage['sizes']['pageBanner'];
    ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title();?></h1>
      <div class="page-banner__intro">
        <p><?php the_field('page_banner_subtitle');?></p>
      </div>
    </div>
  </div>
<?php }


function university_files() {
    wp_enqueue_script('google_map', '//maps.googleapis.com/maps/api/js?key=AIzaSyD02K9Z9SHy9qs_KrSq7KcxQ--bKNBLMWU', NULL, '1.0', true);
    // wp_enqueue_script('google_map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD02K9Z9SHy9qs_KrSq7KcxQ--bKNBLMWU', NULL, '1.0', true);

    wp_enqueue_script('university_main_js', get_theme_file_uri('./build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('university_src_js', get_theme_file_uri('./build/src-index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('university_main_styles', get_theme_file_uri('./build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('./build/index.css'));
    wp_enqueue_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('custom_google_fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    // wp_enqueue_script('university_src_js', get_theme_file_uri('./src/index.js'));
}
add_action('wp_enqueue_scripts', 'university_files');

/*For Page Title on Top Bar */

function university_features(){
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('FooterLocationOne', 'Footer Location One');
    register_nav_menu('FooterLocationTwo', 'Footer Location Two');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
}
add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query){
    if(!is_admin() AND  is_post_type_archive('program') AND is_main_query()){
        $query-> set('orderby', 'title');
        $query-> set('order', 'ASC');
        $query-> set('post_per_page', -1);
    }

    if(!is_admin()AND is_post_type_archive('event') AND $query->is_main_query()){
        $today = date('Ymd');
        $query-> set('meta_key', 'event_date');
        $query-> set('orderby', 'meta_value_num');
        $query-> set('meta_query', array(array(
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
        )
        ));
    }
}
add_action('pre_get_posts', 'university_adjust_queries');

function universityMapKey($api) {
  $api['key'] = 'AIzaSyD02K9Z9SHy9qs_KrSq7KcxQ--bKNBLMWU';
  return $api;
}

add_filter('acf/fields/google_map/api', 'universityMapKey');



@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '300' );

/* Customize Login Screen */

add_filter('login_headerurl', 'OurHeaderUrl');

function OurHeaderUrl(){
  return esc_url(site_url('/'));
}


add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
  wp_enqueue_style('university_main_styles', get_theme_file_uri('./build/style-index.css'));
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('./build/index.css'));
  wp_enqueue_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('custom_google_fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
}

add_action('login_headertitle', 'ourLoginTitle');

function ourLoginTitle(){
  return get_blogInfo('name');
}



?>

