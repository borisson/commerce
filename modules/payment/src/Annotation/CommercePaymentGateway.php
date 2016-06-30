<?php

namespace Drupal\commerce_payment\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines the payment gateway plugin annotation object.
 *
 * Plugin namespace: Plugin\Commerce\PaymentGateway.
 *
 * @see plugin_api
 *
 * @Annotation
 */
class CommercePaymentGateway extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The payment gateway label.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $label;

  /**
   * The payment gateway display label.
   *
   * @ingroup plugin_translatable
   *
   * @var \Drupal\Core\Annotation\Translation
   */
  public $display_label;

  /**
   * The supported modes.
   *
   * An array of mode labels keyed by machine name.
   *
   * @var string[]
   */
  public $modes;

  /**
   * The payment gateway forms.
   *
   * An array of form classes keyed by operation.
   * For example:
   * <code>
   *   'add-payment-method' => "Drupal\commerce_payment\PluginForm\PaymentMethodAddForm",
   *   'capture-payment' => "Drupal\commerce_payment\PluginForm\PaymentCaptureForm",
   * </code>
   *
   * @var array
   */
  public $forms = [];

  /**
   * The payment type used by the payment gateway.
   *
   * @var string
   */
  public $payment_type = 'payment_default';

  /**
   * The payment method types handled by the payment gateway.
   *
   * @var string[]
   */
  public $payment_method_types = [];

  /**
   * Constructs a new CommercePaymentGateway object.
   *
   * @param array $values
   *   The annotation values.
   */
  public function __construct($values) {
    // Define default modes.
    if (empty($values['modes'])) {
      $values['modes'] = [
        'test' => t('Test'),
        'live' => t('Live'),
      ];
    }
    if (empty($values['payment_method_types'])) {
      // NestedArray merging causes duplicates for array defaults on properties.
      $values['payment_method_types'] = ['credit_card'];
    }
    parent::__construct($values);
  }

}
