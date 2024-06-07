<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Room Availability Calendar</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Room Availability Calendar</h2>
    <form id="availabilityForm">
      <div class="form-group">
        <label for="roomId">Room ID</label>
        <input type="text" class="form-control" id="roomId" value="R123456" readonly>
      </div>
      <div class="form-group">
        <label for="hotelId">Hotel ID</label>
        <input type="text" class="form-control" id="hotelId" value="H987654" readonly>
      </div>
      <div class="form-group">
        <label for="roomNumber">Room Number</label>
        <input type="text" class="form-control" id="roomNumber" value="101" readonly>
      </div>
      <div class="form-group">
        <label for="availabilityCalendar">Availability Calendar</label>
        <div id="calendarEntries"></div>
        <button type="button" class="btn btn-primary mt-2" onclick="addDateEntry()">Add Date Entry</button>
      </div>
      <button type="submit" class="btn btn-success">Save Availability</button>
    </form>
  </div>

  <script>
    // Initial availability data (could be fetched from server)
    const availabilityCalendar = {
      "2024-06-01": "Available",
      "2024-06-02": "Booked"
    };

    document.addEventListener('DOMContentLoaded', () => {
      const calendarEntries = document.getElementById('calendarEntries');
      for (const date in availabilityCalendar) {
        addDateEntry(date, availabilityCalendar[date]);
      }
    });

    function addDateEntry(date = '', status = 'Available') {
      const entry = document.createElement('div');
      entry.className = 'form-row align-items-center mb-2';
      entry.innerHTML = `
        <div class="col-sm-4">
          <input type="date" class="form-control" name="date" value="${date}">
        </div>
        <div class="col-sm-4">
          <select class="form-control" name="status">
            <option value="Available" ${status === 'Available' ? 'selected' : ''}>Available</option>
            <option value="Booked" ${status === 'Booked' ? 'selected' : ''}>Booked</option>
          </select>
        </div>
        <div class="col-sm-4">
          <button type="button" class="btn btn-danger" onclick="removeDateEntry(this)">Remove</button>
        </div>
      `;
      document.getElementById('calendarEntries').appendChild(entry);
    }

    function removeDateEntry(button) {
      button.closest('.form-row').remove();
    }

    document.getElementById('availabilityForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const calendarEntries = document.getElementById('calendarEntries').children;
      const updatedAvailability = {};

      for (let entry of calendarEntries) {
        const date = entry.querySelector('input[name="date"]').value;
        const status = entry.querySelector('select[name="status"]').value;
        if (date) {
          updatedAvailability[date] = status;
        }
      }

      console.log('Updated Availability Calendar:', updatedAvailability);
      // You can now send updatedAvailability to your server
    });
  </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
