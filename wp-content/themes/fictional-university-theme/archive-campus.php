<?php get_header();
      // pageBanner(array(
      //   'title' => 'All programs',
      //   'subtitle' => 'There is something for everyone. Have a look around.'
      // )); 
  ?>
<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg') ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Our Campuses</h1>
        <div class="page-banner__intro">
          <p>We have several located campuses.</p>
        </div>
      </div>
    </div>

    <div class="container container--narrow page-section">

    <div class="acf-map">
    <?php 
    while (have_posts()) {
        the_post(); 
        $mapLocation = get_field('mapLocation');
        
        if ($mapLocation) {
            $lat = $mapLocation['lat'];
            $lng = $mapLocation['lng'];
            
            ?>
            <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng'] ?>

            "></div>
            <?php
        }
    }
    ?>
</div>

</div>

<?php get_footer();?>