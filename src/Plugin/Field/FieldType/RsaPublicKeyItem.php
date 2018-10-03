<?php

namespace Drupal\rsa_public_key\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the 'rsa_public_key' field type.
 *
 * @FieldType(
 *   id = "rsa_public_key",
 *   label = @Translation("RSA public key"),
 *   category = @Translation("General"),
 *   default_widget = "rsa_public_key",
 *   default_formatter = "rsa_public_key"
 * )
 */
class RsaPublicKeyItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'modulus' => [
          'type' => 'text',
          'size' => 'big',
          'not null' => FALSE,
        ],
        'exponent' => [
          'type' => 'text',
          'size' => 'big',
          'not null' => FALSE,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $modulus = $this->get('modulus')->getValue();
    $exponent = $this->get('exponent')->getValue();
    return ($modulus === NULL && $exponent === NULL)
      || ($modulus === '' && $exponent === '');
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['modulus'] = DataDefinition::create('string')
      ->setLabel(t('Modulus'));
    $properties['exponent'] = DataDefinition::create('string')
      ->setLabel(t('Exponent'));
    return $properties;
  }

}
