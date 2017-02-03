<?php

namespace Drupal\iframe_dialog;

use Drupal\Core\Render\Element;
use Drupal\Core\Render\MainContent\HtmlRenderer;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class IframeRender.
 *
 * @package Drupal\iframe_dialog
 */
class IframeRender extends HtmlRenderer {

  protected function prepare(array $main_content, Request $request, RouteMatchInterface $route_match) {
    list($page, $title) = parent::prepare($main_content, $request, $route_match);
    foreach (Element::children($page) as $region) {
      if ($region != 'content') {
        unset($page[$region]);
      }
    }
    return [$page, $title];
  }

  public function buildPageTopAndBottom(array &$html) {
    parent::buildPageTopAndBottom($html);
    unset($html['page_top']['toolbar']);

  }


}
