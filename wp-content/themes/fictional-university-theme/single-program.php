<?php
get_header();
while(have_posts()){
    the_post();
    ?>
    <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title();?></h1>
      <div class="page-banner__intro">
        <p>DON'T FORGET TO REPLACE ME LATER</p>
      </div>
    </div>
  </div>

  <div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
              <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program');?>"><i class="fa fa-home" aria-hidden="true"></i> All Programs </a> <span class="metabox__main"><p><?php the_title(); ?></p></span>
            </p>
          </div>
    <div class="generic.content">
        <?php the_content();?>
        <?php 
          $today = date('Ymd');
          $homepageevents = new WP_query(array(
            'paged' => get_query_var('paged', 1),
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(array(
              'key' => 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
            )
            ));
            while($homepageevents->have_posts()) {
            $homepageevents->the_post();
            get_template_part('/template-parts/content', 'event');
           } 
          ?>
        
</div>
</div>
    <?php
}
get_footer();
?>