<?php

namespace Drupal\d8_training\Access;

use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\node\NodeInterface;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
/**
 * Checks access for displaying configuration translation page.
 */
class CustomAccessCheck implements AccessInterface{

  protected $currentUser;

  /**
   * {@inheritdoc}
   */
  public function __construct(AccountProxyInterface $current_user) {
    $this->currentUser = $current_user;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_user')
    );
  }

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   *
   * @return \Drupal\Core\Access\AccessResultInterface
   *   The access result.
   */
  public function access(NodeInterface $node) {
    $nid = $node->getOwnerId();	
    $user = $this->currentUser;
    $uid = $user->id();
    if ($nid === $uid && $user->isAuthenticated())  {
      return AccessResult::allowed();
    }
    else {
      return AccessResult::forbidden();
    }
  }
}
