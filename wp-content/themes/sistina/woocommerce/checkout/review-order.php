<?php
/**
 * Review order form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.8
 */

?>
<?php if ( ! $is_ajax ) : ?><div id="order_review"><?php endif; ?>

    <table class="shop_table">
        <thead>
            <tr>
                <th class="product-name"><?php _e('Product', 'yit'); ?></th>
                <th class="product-quantity"><?php _e('Qty', 'yit'); ?></th>
                <th class="product-total"><?php _e('Totals', 'yit'); ?></th>
            </tr>
        </thead>
        <tfoot>

            <tr class="cart-subtotal">
                <th colspan="2"><?php _e('Cart Subtotal', 'yit'); ?></th>
                <td><strong><?php echo WC()->cart->get_cart_subtotal(); ?></strong></td>
            </tr>

            <?php foreach ( WC()->cart->get_coupons( 'cart' ) as $code => $coupon ) : ?>
                <tr class="cart-discount coupon-<?php echo esc_attr( $code ); ?>">
                    <th><?php echo esc_html( $code ); ?></th>
                    <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                </tr>
            <?php endforeach; ?>

            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action('woocommerce_review_order_before_shipping'); ?>

            <?php  wc_cart_totals_shipping_html() ?>

            <?php do_action('woocommerce_review_order_after_shipping'); ?>

            <?php endif; ?>

            <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>

                <tr class="fee fee-<?php echo $fee->id ?>">
                    <th colspan="2"><?php echo $fee->name ?></th>
                    <td><?php wc_cart_totals_fee_html( $fee ); ?></td>
                </tr>

            <?php endforeach; ?>

            <?php if ( WC()->cart->tax_display_cart == 'excl' ) : ?>
                <?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                        <tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                            <th><?php echo esc_html( $tax->label ); ?></th>
                            <td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr class="tax-total">
                        <th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
                        <td><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></td>
                    </tr>
                <?php endif; ?>
            <?php endif; ?>

            <?php foreach ( WC()->cart->get_coupons( 'order' ) as $code => $coupon ) : ?>
                <tr class="order-discount coupon-<?php echo esc_attr( $code ); ?>">
                    <th><?php echo esc_html( $code ); ?></th>
                    <td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
                </tr>
            <?php endforeach; ?>

            <?php do_action('woocommerce_review_order_before_order_total'); ?>

            <tr class="total">
                <th colspan="2"><?php _e('Order Total', 'yit'); ?></th>
                <td><strong><?php echo WC()->cart->get_total(); ?></strong></td>
            </tr>

            <?php do_action('woocommerce_review_order_after_order_total'); ?>

        </tfoot>
        <tbody>
            <?php
                if ( sizeof( WC()->cart->get_cart() ) > 0 ) :

                    do_action( 'woocommerce_review_order_before_cart_contents' );

                    foreach ( WC()->cart->get_cart() as $item_id => $values ) :
                        $_product = apply_filters( 'woocommerce_cart_item_product', $values['data'], $values, $item_id );
                        if ( $_product && $_product->exists() && $values['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $values, $item_id ) ) :
                            echo '
                                <tr class = "' . esc_attr( apply_filters('woocommerce_cart_item_class', 'checkout_table_item', $values, $item_id ) ) . '">
                                    <td class="product-name">'     . apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $values, $item_id ) . WC()->cart->get_item_data( $values )              . '</td>
                                    <td class="product-quantity">' . apply_filters( 'woocommerce_checkout_cart_item_quantity', $values['quantity'] )                                                              . '</td>
                                    <td class="product-total">'    . apply_filters( 'woocommerce_checkout_item_subtotal', WC()->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $item_id ) . '</td>
                                </tr>';
                        endif;
                    endforeach;
                endif;

                do_action( 'woocommerce_review_order_after_cart_contents' );
            ?>
        </tbody>
    </table>

    <?php
    if( !yit_get_option('shop-checkout-multistep') ):
        yith_wc_get_template( 'checkout/form-payment.php', array('woocommerce' => WC()));
    else:
    ?>
        <?php $checkout = WC()->checkout(); ?>
        <?php do_action('woocommerce_before_order_notes', $checkout); ?>

        <?php if (get_option('woocommerce_enable_order_comments')!='no') : ?>

            <h3><?php _e('Additional Information', 'yit'); ?></h3>

            <?php foreach ($checkout->checkout_fields['order'] as $key => $field) : ?>

                <?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>

            <?php endforeach; ?>

        <?php endif; ?>

        <?php do_action('woocommerce_after_order_notes', $checkout); ?>
        <?php yith_wc_get_template( 'checkout/form-place-order.php', array('woocommerce' => WC())); ?>
    <?php endif; ?>

    <?php do_action( 'woocommerce_review_order_after_payment' ); ?>

<?php if ( ! $is_ajax ) : ?></div><?php endif; ?>