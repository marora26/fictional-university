<?php

if(!is_user_logged_in()){
    wp_redirect(esc_url(site_url('/')));
    exit;
}


get_header();
while(have_posts()){
    the_post(); 
    pageBanner(array(
      'subtitle' => 'Hi this is the subtitle',
      'photo' => 'https://www.pexels.com/photo/snowy-mountain-1287145/'
    ));
    ?>
    

    <div class="container container--narrow page-section">
        <ul class="min-list link-list" id="my-notes">
            <?php
            $userNotes = new WP_Query(array(
                'post_type' => 'note',
                'posts_per_page' => -1,
                'author' => get_current_user_id()
            ));

            while($userNotes->have_posts()){
               $userNotes->the_post();?>
                <li>
                    <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</span>
                    <span class="delete-note"><i class="fa fa-pencil" aria-hidden="true"></i>Delete</span>
                    <input class="note-title-field" value="<?php echo esc_attr(get_the_title());?>">
                    <textarea class="note-body-field"><?php echo esc_attr(get_the_content());?></textarea>
                </li>
            <?php }
            ?>
        </ul>
    </div>
    <?php
}
get_footer();
?>