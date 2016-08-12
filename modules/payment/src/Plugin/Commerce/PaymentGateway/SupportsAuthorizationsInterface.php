<?php

namespace Drupal\commerce_payment\Plugin\Commerce\PaymentGateway;

use Drupal\commerce_payment\Entity\PaymentInterface;
use Drupal\commerce_price\Price;

/**
 * Defines the interface for gateways which support authorizing payments.
 */
interface SupportsAuthorizationsInterface {

  /**
   * Creates and authorizes a payment with the given amount.
   *
   * @param \Drupal\commerce_payment\Entity\PaymentInterface $payment
   *   The payment to authorize.
   *
   * @throws \Drupal\commerce_payment\Exception\PaymentGatewayException
   *   Thrown when the transaction fails for any reason.
   */
  public function authorizePayment(PaymentInterface $payment);

  /**
   * Captures the give authorized payment.
   *
   * Only payments in the 'authorization' state can be captured.
   *
   * @param \Drupal\commerce_payment\Entity\PaymentInterface $payment
   *   The payment to capture.
   * @param \Drupal\commerce_price\Price $amount
   *   The amount to capture. If NULL, defaults to the entire payment amount.
   *
   * @throws \Drupal\commerce_payment\Exception\PaymentGatewayException
   *   Thrown when the transaction fails for any reason.
   */
  public function capturePayment(PaymentInterface $payment, Price $amount = NULL);

  /**
   * Voids the given payment.
   *
   * Only payments in the 'authorization' state can be voided.
   *
   * @param \Drupal\commerce_payment\Entity\PaymentInterface $payment
   *   The payment to void.
   *
   * @throws \Drupal\commerce_payment\Exception\PaymentGatewayException
   *   Thrown when the transaction fails for any reason.
   */
  public function voidPayment(PaymentInterface $payment);

}