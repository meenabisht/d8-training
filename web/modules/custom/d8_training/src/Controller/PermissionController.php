<?php

namespace Drupal\d8_training\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * A Permission Controller.
 */
class PermissionController extends ControllerBase {

  /**
   * Returns a render-able array for a permission.
   */
  public function content(NodeInterface $node) {
    $author = $node->getOwnerId();
		return [
      '#type' => 'markup',
      '#markup' => 'Hello' . $author,
    ];  
  }

  public function rolecontent() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('This page is only visible if any of the role has the permission.'),
    ];    
  }

  public function roleandcontent() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('This page is only visible if both the roles has the permission.'),
    ];    
  }

  public function loggedcontent() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('you are logged in you can access the content.'),
    ];    
  }

  public function accesscontent() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('you can access the content.'),
    ];    
  }
  // $user - who is current logged in object
  // $account - object of anyone who has the account in the website

  public function access(NodeInterface $node) {
    $nid = $node->getOwnerId();	
    $user = \Drupal::currentUser(); 
    $uid = $user->id();
     
    if ($nid === $uid && $user->isAuthenticated()) {
      return AccessResult::allowed();
    }
    else {
      return AccessResult::forbidden();
    }
  }

}

 