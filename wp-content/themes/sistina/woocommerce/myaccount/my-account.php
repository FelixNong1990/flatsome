<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

wc_print_notices(); ?>

<p class="myaccount_user">
	<?php
	printf(
		__( 'Hello, <strong>%s</strong>. From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">change your password</a>.', 'yit' ),
		$current_user->display_name,
        esc_url( wc_customer_edit_account_url() )
	);
	?>
</p>

<?php do_action( 'woocommerce_before_my_account' ); ?>

<?php
    yith_wc_get_template( 'myaccount/my-downloads.php' );
?>

<?php
    yith_wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) );
?>

<?php
    yith_wc_get_template( 'myaccount/my-address.php' );
?>

<?php if( defined('NEW_FB_LOGIN') && NEW_FB_LOGIN == 1 && function_exists('new_fb_is_user_connected') && new_fb_is_user_connected() && function_exists('new_fb_unlink_button')): ?>
    <div class="facebook-unlink"> <?php echo '<a href="' . new_fb_login_url() . '&action=unlink&redirect=' . new_fb_curPageURL() . '">'.__('Unlink Account', 'yit').'</a>'; ?></div>
<?php endif; ?>



<?php do_action( 'woocommerce_after_my_account' ); ?>