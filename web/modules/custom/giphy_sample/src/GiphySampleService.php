<?php

namespace Drupal\giphy_sample;

/**
 * GiphySampleService - a custom service for retrieving giphy api data.
 */

class GiphySampleService {

  /**
   * Returns Giphy search api embed url result.
   */
  public function getData($keyword) {
    $api_url = 'https://api.giphy.com/v1/gifs/search';
    $config = \Drupal::config('giphy_sample.settings');
    $search_url =  $api_url . '?api_key=' . $config->get('api_key') . '&q=' . $keyword . '&limit=1';
	$giphy_data = json_decode(file_get_contents($search_url), true);
	$giphy_result_url = $giphy_data['data'][0]['images']['original']['url'];
	$giphy_url = (!empty($giphy_result_url)) ? $giphy_result_url : '';

	return $giphy_url;
  }
}
