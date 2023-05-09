(function ($) {
  $(document).ready(function () {

$('.map-ping, #close-map-icon').on('click, tap, touch', function() {
  $('#map-popup_section').toggle();
});

/*$('#close-map-icon').on('click', function() {
  $('#map-popup_section').toggle();
});*/

  });
})(jQuery)