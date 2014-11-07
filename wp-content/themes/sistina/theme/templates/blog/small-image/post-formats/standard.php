<?php
/**
 * Your Inspiration Themes
 *
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */
?>

<?php if ( $has_thumbnail ): ?>
    <div class="thumbnail span4">
        <?php
        if( $has_thumbnail ) {
            yit_image( "size=blog_small_image&alt=blogimage" );
        }
        ?>

        <div class="blog-meta">
            <?php if( yit_get_option( 'blog-show-date' ) ): ?>
                <div class="blog-small-image-date">
                    <span class="month"><?php echo get_the_date( 'M' ) ?></span>
                    <span class="day"><?php echo get_the_date( 'd' ) ?></span>
                </div>
            <?php endif ?>

            <?php if( yit_get_option( 'blog-show-comments' ) ): ?>
                <a href="<?php comments_link(); ?>" class="blog-small-image-comments-count">
                    <span class="count"><?php echo get_comments_number(); ?></span>
                </a>
            <?php endif ?>
        </div>
    </div>
<?php endif ?>