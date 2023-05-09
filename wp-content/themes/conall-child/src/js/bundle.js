(function ($) {
  $(document).ready(function () {

$('.map-ping').on('click', function() {
  $('#map-popup_section').toggle();
});

$('#close-map-icon').on('click', function() {
  $('#map-popup_section').toggle();
});

  });
})(jQuery)