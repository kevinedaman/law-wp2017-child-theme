jQuery(document).ready(function($) {
  console.log('navtoggle sourced');
  init();
});

/**
 * @function init
 * @desc turns "on" the functions for the navbar toggle
 * @param nothing goes in
 * @return functions that need to be run right away, get run here
 */
function init() {
  eventListeners(true);
}

function eventListeners(value) {

  var masthead = $('#masthead');
  var menuToggle = masthead.find('.menu-toggle');
  var siteNavContain = masthead.find('.main-navigation');
  var siteNavigation = masthead.find('.main-navigation > div > ul');

  if (value) {
    menuToggle.on('click.twentyseventeen', function() {
      siteNavContain.toggleClass('toggled-on');

      $(this).attr('aria-expanded', siteNavContain.hasClass('toggled-on'));
    });
  } else {
    return;
  }
}
