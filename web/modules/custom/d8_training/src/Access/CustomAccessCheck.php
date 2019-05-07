<?php

namespace Drupal\d8_training\Access;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;

/**
 * Checks access for displaying configuration translation page.
 */
class CustomAccessCheck implements AccessInterface{


  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(AccountInterface $account) {
    // Check permissions and combine that with any custom access checking needed. Pass forward
    // parameters from the route and/or request as needed.
    // return ($account->hasPermission('do example things') && $this->someOtherCustomCondition()) ? AccessResult::allowed() : AccessResult::forbidden();
    kint($account);
  }

}
