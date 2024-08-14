<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Calendar with Events</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.css" rel="stylesheet">
    <!-- Core Calendar CSS -->?
    <link rel="stylesheet" href="../assets/css/calendar.css" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Calendar -->
            <div class="col-lg-6 mb-4">
                <div class="card calendar-card">
                    <div class="card-body">
                        <div id="calendar" class="calendar"></div>
                        <button class="btn w-100  add-event-btn text-white" type="button" data-toggle="modal" data-target="#addNewEventModal">Add New Event</button>
                    </div>
                </div>
            </div>

            <!-- Event Viewer -->
            <div class="col-lg-6 mb-4">
                <div class="card event-viewer-card">
                    <div class="card-body">
                        <h3 class="card-title text-dark">Event Details</h3>
                        <ul class="event-list" id="event-list">
                            <!-- Event details will be populated here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding New Event -->
    <div class="modal fade" id="addNewEventModal" tabindex="-1" role="dialog" aria-labelledby="addNewEventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewEventModalLabel">Add New Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addEventForm">
                        <div class="form-group">
                            <label for="eventTitle">Event Title</label>
                            <input type="text" class="form-control" id="eventTitle" required>
                        </div>
                        <div class="form-group">
                            <label for="eventDate">Event Date</label>
                            <input type="date" class="form-control" id="eventDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize calendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                dateClick: function(info) {
                    fetchEvents(info.dateStr);
                },
                events: 'get-events.php', // Adjust the URL to your server-side script
                editable: true,
                selectable: true,
                eventClick: function(info) {
                    var event = info.event;
                    displayEventDetails(event.id);
                }
            });
            calendar.render();

            // Fetch events based on selected date
            function fetchEvents(date) {
                $.ajax({
                    url: 'get-event-details.php', // Adjust the URL to your server-side script
                    type: 'GET',
                    data: { date: date },
                    success: function(response) {
                        $('#event-list').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Log the error response for debugging
                        $('#event-list').html('<li>Error loading event details.</li>');
                    }
                });
            }

            // Add new event
            $('#addEventForm').on('submit', function(event) {
                event.preventDefault();
                var title = $('#eventTitle').val();
                var date = $('#eventDate').val();
                $.ajax({
                    url: 'add-event.php', // Adjust the URL to your server-side script
                    type: 'POST',
                    data: { title: title, date: date },
                    success: function(response) {
                        $('#addNewEventModal').modal('hide');
                        calendar.refetchEvents();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Log the error response for debugging
                    }
                });
            });

            // Display event details
            function displayEventDetails(eventId) {
                $.ajax({
                    url: 'get-event-details.php', // Adjust the URL to your server-side script
                    type: 'GET',
                    data: { id: eventId },
                    success: function(response) {
                        $('#event-list').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText); // Log the error response for debugging
                        $('#event-list').html('<li>Error loading event details.</li>');
                    }
                });
            }
        });
    </script>
</body>
</html>
