<?php

namespace Drupal\rsa_public_key\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines the 'rsa_public_key' field widget.
 *
 * @FieldWidget(
 *   id = "rsa_public_key",
 *   label = @Translation("RSA public key"),
 *   field_types = {"rsa_public_key"},
 * )
 */
class RsaPublicKeyWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['modulus'] = $element + [
      '#type' => 'textfield',
      '#default_value' => $items[$delta]->__get('modulus') ? $items[$delta]->__get('modulus') : NULL,
    ];
    $element['exponent'] = $element + [
      '#type' => 'textfield',
      '#default_value' => $items[$delta]->__get('exponent') ? $items[$delta]->__get('exponent') : NULL,
    ];
    return $element;
  }

}
