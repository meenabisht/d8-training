<?php

namespace Drupal\d8_training\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * A Permission Controller.
 */
class PermissionController extends ControllerBase {

  /**
   * Returns a render-able array for a permission.
   */
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Hello Meena You have the permission!'),
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
}