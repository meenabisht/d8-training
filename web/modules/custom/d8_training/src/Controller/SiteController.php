<?php

namespace Drupal\d8_training\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;
use \Drupal\Component\Serialization\Json;

class SiteController extends ControllerBase {

  public function content(NodeInterface $node) {
    $nid = $node->getOwnerId();	
    $user = \Drupal::currentUser(); 
    $json = json_encode($node, 'json');
    return $json;
    if ($user->isAnonymous() || $user->isAuthenticated()) {
      $json = json_encode($node, 'json');
      return $json; 
    }else{
      return[
        '#markup' => t('Access Denied'),
      ];
    }   
  }  
}

 