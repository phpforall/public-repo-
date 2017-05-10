<?php

/**
 * @file
 * Contains \Drupal\siteinfo\Form\SiteInfo.
 */

namespace Drupal\siteinfo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;



/**
 * Configure example settings for this site.
 */
class SiteInfo extends ConfigFormBase {
  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'site_information';
  }

/** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'siteinfo.settings',
    ];
  }


 /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('siteinfo.settings');
    $form['site_api_key'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Site API Key'),
      '#default_value' => $config->get('site-information.site_api_key'),
    );  

    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
    $this->config('siteinfo.settings')
      // Set the submitted configuration setting
      ->set('site-information.site_api_key', $form_state->getValue('site_api_key'))
      ->save();
 

    parent::submitForm($form, $form_state);
  }
}
