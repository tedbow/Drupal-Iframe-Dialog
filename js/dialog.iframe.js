/**
 * @file
 * Drupal's off-canvas library.
 *
 * @todo This functionality should extracted into a new core library or a part
 *  of the current drupal.dialog.ajax library.
 *  https://www.drupal.org/node/2784443
 */

(function ($, Drupal) {

  'use strict';
  /**
   * Toggle the js-outside-edit-mode class on items that we want to disable while in edit mode.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Toggle the js-outside-edit-mode class.
   */
  Drupal.behaviors.tester = {
    attach: function () {
      // Create the element if needed.

      $('#i-frame-dialog #edit-submit').on('click', function (event) {
        event.preventDefault();
        if ($('#drupal-offcanvas').length) {
          return;
        }
        var path = $('#i-frame-dialog #edit-path').val();
        var $dialog = $('<div id="drupal-offcanvas" class="ui-front"><iframe id="iframe-dialog" src="http://www.octo2.dev/d8_2_ux/' + path + '?_wrapper_format=dialog_html" /></div>').appendTo('body');
        var dialogOptions = {
          'dialogClass':"ui-dialog-outside-in ui-dialog-offcanvas",
          'modal': false,
          'autoResize': false,
          'resizable': 'w',
          'draggable': false,
          'drupalAutoButtons': false,
          'buttons': []

        };
        var dialog = Drupal.dialog($dialog.get(0), dialogOptions);
        dialog.show();
        $('iframe').on('load', function () {
          var iframeTitle = document.getElementById('iframe-dialog').contentDocument.title;
          $('.ui-dialog-title').text(iframeTitle);
        });

      });
    }
  };

})(jQuery, Drupal);
