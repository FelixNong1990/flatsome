<?php
/**
 * Checkout Form Multistep
 *
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

global $woocommerce; $woocommerce_checkout = $woocommerce->checkout();

wp_enqueue_script('yit_checkout', YIT_CORE_ASSETS_URL . '/js/yit/jquery.yit_checkout.js');

$woocommerce_ship_to_billing = yit_woocommerce_default_shiptobilling();
/* fix check default billing to address step 2*/
$labelShipp = __( 'Shipping Address &rarr;', 'yit' );
$labelPay = __( 'Payment Method &rarr;', 'yit' );
$next_step2 = $woocommerce_ship_to_billing ? "4" : "3";
$label_step2 = $woocommerce_ship_to_billing ? $labelPay : $labelShipp;
$alter_label_step2 = $woocommerce_ship_to_billing ? $labelShipp : $labelPay;
/*-fix prev button step 4---------*/
$labelBillingPrev = __('&larr; Billing Address', 'yit');
$labelShippingPrev = __('&larr; Shipping Method', 'yit');
$prev_step4 = $woocommerce_ship_to_billing ? "2" : "3";
$label_step4 = $woocommerce_ship_to_billing ? $labelBillingPrev : $labelShippingPrev;
$alter_label_step4 = $woocommerce_ship_to_billing ? $labelShippingPrev : $labelBillingPrev;
/*-----------*/


?>

<?php wc_print_notices(); ?>

<?php remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 ); ?>
<?php do_action('woocommerce_before_checkout_form');

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>


<div id="checkout_multistep">

    <div class="row">
        <div id="multistep_resume" class="span12">
            <div class="row">
                <div class="span2"><span class="checkout_progress"><?php _e('Checkout Progress', 'yit') ?></span></div>
                <div class="<?php if(!is_user_logged_in()): ?>current <?php else: ?>user_logged_in <?php endif ?>span2"><span class="multistep_first multistep_icon"></span><a href="#" data-step="1" class="<?php if(!is_user_logged_in()): ?>current <?php else: ?>user_logged_in <?php endif ?>multistep_section multistep_section_first"><?php _e('Login', 'yit') ?></a></div>
                <div class="<?php if(is_user_logged_in()): ?>current <?php endif ?>span2"><span class="multistep_second multistep_icon"></span><a href="#" data-step="2" class="<?php if(is_user_logged_in()): ?>current <?php endif ?>multistep_section"><?php _e('Billing Address', 'yit') ?></a></div>
                <div class="span2"><span class="multistep_third multistep_icon"></span><a href="#" data-step="3" class="multistep_section"><?php _e('Shipping Address', 'yit') ?></a></div>
                <div class="span2"><span class="multistep_fourth multistep_icon"></span><a href="#" data-step="4" class="multistep_section"><?php _e('Payment Method', 'yit') ?></a></div>
                <div class="span2"><span class="multistep_fifth multistep_icon"></span><a href="#" data-step="5" class="multistep_section"><?php _e('Order Review', 'yit') ?></a></div>
            </div>
        </div>
    </div>

    <div class="clear"></div>

    <div id="multistep_steps" class="row">

        <!-- step 1 -->
        <?php if (!is_user_logged_in()) : ?>
        <div class="current multistep_step span<?php echo yit_get_sidebar_layout() == 'sidebar-no' ? 12 : 9 ?> user_not_logged_in" id="multistep_step1" data-step="1">
            <div class="box_style">

                <div class="row">

                    <?php // If checkout registration is disabled and not logged in, the user cannot checkout
                    if (get_option('woocommerce_enable_signup_and_login_from_checkout')=="no" && get_option('woocommerce_enable_guest_checkout')=="no" && !is_user_logged_in()) :
                        echo apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'yit'));
                    endif; ?>

                    <?php yith_wc_get_template('checkout/form-login.php', array('woocommerce'=>$woocommerce)) ?>
                    <?php if( get_option('woocommerce_enable_guest_checkout')=="yes" ): ?>
                    <input type="submit" class="button next" name="next[]" value="<?php _e('Checkout as Guest', 'yit'); ?>" data-next="2" />
                    <?php endif ?>

                </div>

                <div class="clear"></div>
            </div>
        </div>
        <?php else: ?>
        <div class="multistep_step user_logged_in" id="multistep_step1" data-step="1"></div>
        <?php endif ?>

        <form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

            <?php do_action( 'woocommerce_checkout_before_customer_details'); ?>

            <!-- step 2 -->
            <div class="<?php if (is_user_logged_in()): ?>current <?php endif ?>multistep_step span<?php echo yit_get_sidebar_layout() == 'sidebar-no' ? 12 : 9 ?>" id="multistep_step2" data-step="2">
                <div class="box_style">

                    <?php do_action('woocommerce_checkout_billing'); ?>

                    <?php if (!is_user_logged_in()): ?>
                    <input type="submit" class="button prev" name="login" value="<?php _e('&larr; Login', 'yit'); ?>" data-next="1" />
                    <?php endif ?>

                    <input type="submit" class="button next" name="login" value="<?php echo $label_step2; ?>" data-next="<?php echo $next_step2; ?>" data-alternativelabel="<?php echo $alter_label_step2; ?>" />

                    <div class="clear"></div>
                </div>
            </div>


            <!-- step 3 -->
            <div class="multistep_step span<?php echo yit_get_sidebar_layout() == 'sidebar-no' ? 12 : 9 ?>" id="multistep_step3" data-step="3">
                <div class="box_style">

                    <?php do_action('woocommerce_checkout_shipping'); ?>

                    <input type="submit" class="button prev" name="login" value="<?php _e('&larr; Billing Address', 'yit'); ?>" data-next="2" />
                    <input type="submit" class="button next" name="login" value="<?php _e('Payment Method &rarr;', 'yit'); ?>" data-next="4" />

                    <div class="clear"></div>
                </div>
            </div>

            <?php do_action( 'woocommerce_checkout_after_customer_details'); ?>

            <!-- step 4 -->
            <div class="multistep_step span<?php echo yit_get_sidebar_layout() == 'sidebar-no' ? 12 : 9 ?>" id="multistep_step4" data-step="4">
                <div class="box_style">

                    <?php woocommerce_get_template('checkout/form-payment.php', array('woocommerce' => $woocommerce)); ?>

                    <input type="submit" class="button prev" name="login" value="<?php echo $label_step4; ?>" data-next="<?php echo $prev_step4?>" data-alternativelabel="<?php echo $alter_label_step4; ?>" />
                    <input type="submit" class="button next" name="login" value="<?php _e('Order Review &rarr;', 'yit'); ?>" data-next="5" />

                    <div class="clear"></div>
                </div>
            </div>

            <!-- step 5 -->
            <div class="multistep_step span<?php echo yit_get_sidebar_layout() == 'sidebar-no' ? 12 : 9 ?>" id="multistep_step5" data-step="5">
                <div class="box_style">

                    <h3 id="order_review_heading"><?php _e('Your order', 'yit'); ?></h3>
                    <?php do_action('woocommerce_checkout_order_review'); ?>

                    <div class="clear"></div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php do_action('woocommerce_after_checkout_form'); ?>


<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function($){
    <?php if ( is_plugin_active('woocommerce-gateway-stripe/gateway-stripe.php') ) : ?>
        jQuery(document).on('click', '#multistep_steps #order_review input#place_order', function() {

            return stripeFormHandler(); });
    <?php endif; ?>

	var multistep = $('#checkout_multistep').yit_checkout();
    multistep.on('slide_change.yit', function(e, data){
        var step = data.step;


        $('#multistep_resume .span2')
            .removeClass('current')
            .removeClass('passed')
            .eq(step)
            .addClass('current');


        $('#multistep_resume .span2').filter(function(){
            return parseInt( $(this).index() ) < parseInt( step );
        }).addClass('passed');

    });

    multistep.on('click', '.multistep_icon', function(){
        $(this).siblings('a').click();
    });
});
</script>