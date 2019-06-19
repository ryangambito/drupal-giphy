<?php

/**
 * @file
 * Contains \Drupal\giphy_sample\Plugin\Field\FieldFormatter\GiphyFormatter.
 */

namespace Drupal\giphy_sample\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'giphy_field' formatter.
 *
 * @FieldFormatter(
 *   id = "giphy_field",
 *   label = @Translation("Giphy Field Format"),
 *   field_types = {
 *     "string"
 *   }
 * )
 */
class GiphyFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $giphy_search = \Drupal::service('giphy_sample.api');
		
      $elements[$delta] = array(
        '#url' => $giphy_search-> getData($item->value),
		'#theme' => 'giphy-field-formatter',
      );
    }

    return $elements;
  }
}
