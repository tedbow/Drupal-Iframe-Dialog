<?php

namespace Drupal\iframe_dialog\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class IFrameDialog.
 *
 * @package Drupal\iframe_dialog\Form
 */
class IFrameDialog extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'i_frame_dialog';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Path'),
      '#description' => $this->t('Enter url to open'),
      '#maxlength' => 64,
      '#size' => 64,
    ];
    $form['#attached']['library'][] = 'iframe_dialog/drupal.iframe_dialog';
    $form['#attached']['library'][] = 'outside_in/drupal.off_canvas';

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Submit'),
      '#description' => $this->t('Open dialog'),
    ];

    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }

  }

}
