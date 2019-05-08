<?php

namespace Drupal\d8_training\Access;

use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Entity\EntityTypeManager;

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
    $current_path = \Drupal::service('path.current')->getPath();
    $nid = explode('/', $current_path );
    $service = \Drupal::service('entity_type.manager')->getStorage('node')->load($nid[2]);
    if ($service->getOwnerId() === $account->id() && $account->isAuthenticated()) {
      return AccessResult::allowed();
    }
    else {
      return AccessResult::forbidden();
    }
  }
}


