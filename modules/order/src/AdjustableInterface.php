<?php

namespace Drupal\commerce_order;

/**
 * Defines an interface for objects that contain adjustments.
 *
 * @see \Drupal\commerce_order\Entity\OrderInterface
 * @see \Drupal\commerce_order\Entity\LineItemInterface
 */
interface AdjustableInterface {

  /**
   * Gets the adjustments.
   *
   * @return \Drupal\commerce_order\Adjustment[]
   *   The adjustments.
   */
  public function getAdjustments();

  /**
   * Sets the adjustments.
   *
   * @param \Drupal\commerce_order\Adjustment[] $adjustments
   *   The adjustments.
   *
   * @return $this
   */
  public function setAdjustments(array $adjustments);

  /**
   * Adds an adjustment.
   *
   * @param \Drupal\commerce_order\Adjustment $adjustment
   *   The adjustment.
   *
   * @return $this
   */
  public function addAdjustment(Adjustment $adjustment);

  /**
   * Removes an adjustment.
   *
   * @param \Drupal\commerce_order\Adjustment $adjustment
   *   The adjustment to remove.
   *
   * @return $this
   */
  public function removeAdjustment(Adjustment $adjustment);

}
