<?php

namespace Drupal\as_menu_plug;

/**
 * extend Drupal's Twig_Extension class
 */
class cleanLinkText extends \Twig\Extension\AbstractExtension
{

  /**
   * {@inheritdoc}
   * Let Drupal know the name of custom extension
   */
  public function getName()
  {
    return 'as_menu_plug.cleanLinkText';
  }


  /**
   * {@inheritdoc}
   * Return custom twig function to Drupal
   */
  public function getFunctions()
  {
    return [
      new \Twig\TwigFunction('clean_link_text', [$this, 'clean_link_text']),
    ];
  }

  /**
   * removes accents and special characters from link text for in-page menus
   *
   * @param string $link_title
   *   link title passed from section label in twig template
   *
   * @return string $link_path
   *   data in string for element ID to make anchor links work
   */
  public function clean_link_text($link_title)
  {
    $link_name = '';
   
    if (!empty($link_title)) {

      $link_name = as_menu_plug_convert_accents($link_title);

    }

    return $link_name;
  }
}
