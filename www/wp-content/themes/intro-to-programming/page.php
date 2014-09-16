<?php

get_header();

?>

<div id="main-content" class="main-content">

<?php
  if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
    // Include the featured content template.
    get_template_part( 'featured-content' );
  }
?>
  <div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">

      <?php
        // Start the Loop.
        while ( have_posts() ) : the_post();

          // Include the page content template.
          get_template_part( 'content', 'page' );
        endwhile;
      ?>

      <?php

      $exploded = explode( '/', trim( $_SERVER['REQUEST_URI'], '/' ) );

      $slug = array_pop( $exploded );

      $exercise = explode( '-', $slug )[1];

      $prev_exercise = $exercise - 1;
      $next_exercise = $exercise + 1;

      $template = str_replace( 'exercise-', '', $slug );

      ?>

      <div class="entry-content">
        <a href="<?php echo esc_url( '/exercises/exercise-' . $prev_exercise ); ?>">Previous</a>

        <a href="<?php echo esc_url( '/exercises/exercise-' . $next_exercise ); ?>" style="float: right;">Next</a>
      </div>

      <div class="entry-content results-area">
        <?php

          // Include our exercise if it exists
          get_template_part( 'exercise', $template );

        ?>
      </div>

      <div class="entry-content code-area">
        <?php

          // Include our exercise if it exists
          echo file_get_contents( __DIR__ . '/' . $slug . '.php' );

        ?>
      </div>

    </div><!-- #content -->
  </div><!-- #primary -->
</div><!-- #main-content -->

<?php get_footer();
