<?php echo 2+2;
$myname = 'Bhumika';
?>

<h1>This page is all about <?php echo $myname ?></h1>

<?php echo 5 * 5 ?>
<h2>All About <?php echo $myname ?> </h2>


<?php
// function greet($name, $color){
//     echo "<p>my name is $name and my favourite color is $color.</p>";
// }

// greet('greg', 'blue');
// greet('brad', 'white');
?>

<!-- <h1><?php bloginfo('name');?></h1> -->
<p><?php bloginfo('description'); ?> </p>

<!-- Variable -->

<?php $myname ="mayank";
?>

<p>my name is <?php echo $myname; ?>.</p>

<!-- Array -->

<?php $names = array('Brad', 'John', 'Jane', 'Meowsalot', 'Barsalo', 'Barksalot');

$count = 0;

while($count < count($names)){
    echo "<li> my name is $names[$count]</li>";
    $count++;
}
?>


<p>Hi My name is <?php echo $names[0] ?></p>
<p>Hi My name is <?php echo $names[1] ?></p>
<p>Hi My name is <?php echo $names[2] ?></p>
<p>Hi My name is <?php echo $names[3] ?></p>

<!-- While Loop -->


<?php
while(have_posts()){
    the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_content(); ?>
    <hr>
    <?php
}

get_footer();
?>

<!-- Page ID -->

<?php     
    echo wp_get_post_parent_id(get_the_ID());
?>

<!-- Function with If else condition -->
<?php

function doubleme($x){
    return $x * 2;
}

If (doubleme(12) == 24){
    echo "This function is performing the math correctly.";
}
?>

<?php

// function doubleme($x){
//     return $x * 2;
// }

// function tripleme($x){
//     return $x * 3;
// }

// echo tripleme
?>

<!-- Associative Array -->

<?php $animalssounds = array(
    'cat' => 'meow',
    'dog' => 'bark',
    'pig' => 'oink'
);

    echo $animalssounds['dog'];

    wp_list_pages();

?>