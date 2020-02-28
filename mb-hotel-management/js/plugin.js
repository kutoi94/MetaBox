document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'dayGrid' ],
    defaultView: 'dayGridMonth',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: ''
    },
    events: {
      url: '../wp-content/plugins/mb-hotel-management/inc/feed-events.php',
      type: 'POST',
      error: function() {
        alert('There was an error while fetching events.');
      }
    },
    eventPositioned (view, element) {
      displayBookings();
    },
  });

  calendar.render();

});



$('.filter-bookings').on('click', function(event){

  event.stopPropagation();

  var room_id = $(this).attr('data-room');

  $('.wrap').attr('class', 'wrap ' + room_id);

    displayBookings();
 
})



function displayBookings(){

  var classes = $('.wrap').attr('class');

  if (classes != 'wrap') {

    room = classes.replace("wrap ", "");

    if (room == 'all') {

      $('[class*="room-"]').show();

    } else {

      $('[class*="room-"]').hide();

      $('.room-'+room).show();

    }

  }

}
