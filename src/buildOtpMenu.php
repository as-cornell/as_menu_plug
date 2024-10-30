<?php

namespace Drupal\as_menu_plug;

/**
 * extend Drupal's Twig_Extension class
 */
class buildOtpMenu extends \Twig\Extension\AbstractExtension
{

  /**
   * {@inheritdoc}
   * Let Drupal know the name of custom extension
   */
  public function getName()
  {
    return 'as_menu_plug.buildOtpMenu';
  }


  /**
   * {@inheritdoc}
   * Return custom twig function to Drupal
   */
  public function getFunctions()
  {
    return [
      new \Twig\TwigFunction('build_otp_menu', [$this, 'build_otp_menu']),
    ];
  }

  /**
   * provide menu with 'on this page' links to page sections
   *
   * @param string $link_values
   *   array of link values
   *
   * @return string $markup
   *   markup to display in twig template
   */
  public function build_otp_menu($link_values)
  {
    $link_class = 'otpNav__item';
    $list_class = 'otpNav__list';
    $markup = '<ul class="' . $list_class . '">';

    if (!empty($link_values)) {
      foreach ($link_values as $link_title) {
        $markup = $markup . as_menu_plug_generate_link_markup($link_title, '', $link_class);
      }
    } // There were no links
    else {
      $markup = $markup . "<li>There are no in-page links</li>";
    }
    $markup = $markup . '</ul>';

    return $markup;
  }
}
