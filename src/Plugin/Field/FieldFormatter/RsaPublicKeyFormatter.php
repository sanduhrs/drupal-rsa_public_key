<?php

namespace Drupal\rsa_public_key\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\SafeMarkup;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'RSA public key' formatter.
 *
 * @FieldFormatter(
 *   id = "rsa_public_key",
 *   label = @Translation("RSA public key"),
 *   field_types = {
 *     "rsa_public_key"
 *   }
 * )
 */
class RsaPublicKeyFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      $output = '<div about="#me">';
      $output .= '  <div rel="cert:key">';
      $output .= '    <div typeof="cert:RSAPublicKey">';
      $output .= '      <dl>';
      $output .= '        <dt>Modulus (hexadecimal)</dt>';
      $output .= '        <dd property="cert:modulus" datatype="xsd:hexBinary">' . preg_replace('/[^a-z0-9]/i', '', $item->modulus) . '</dd>';
      $output .= '        <dt>Exponent (decimal)</dt>';
      $output .= '        <dd property="cert:exponent" datatype="xsd:integer">' . SafeMarkup::checkPlain($item->exponent) . '</dd>';
      $output .= '      </dl>';
      $output .= '    </div>';
      $output .= '  </div>';
      $output .= '</div>';
      $element[$delta] = ['#markup' => $output];
    }
    return $element;
  }

}
