<?= $this->extend('/admin/layouts/main') ?>
<?= $this->section('content') ?>
<?php helper('form'); // Load form helper ?>
<div class="card">
   <div class="card-body">
      <div class="alert alert-danger">
         <p>for error</p>
      </div>
      <form>
         <div class=" row">
            <div class="mt-3 col">
               <label for="roomNumber" class="form-label">Room No *</label>
               <input type="text" class="form-control" id="roomNumber" name="roomNumber" value="<?= set_value('roomNumber') ?>" required >
            </div>
            <div class="mt-3 col">
               <label for="hotel" class="form-label">Hotel *</label>
               <select class="form-control" id="hotel" name="hotel" value="<?= set_value('hotel')?>" required>
                  <option>--Select--</option>
                  <option>JW Marriot</option>
                  <option>Trident Hotel</option>
                  <option>Novotel</option>
                  <option>The Lalit</option>
                  <option>Ginger Mumbai</option>
               </select>
            </div>
            <div class="mt-3 col">
               <label for="roomType" class="form-label">Room Type *</label>
               <select class="form-control" id="roomType" name="roomType" value="<?= set_value('roomType') ?>" required>
                  <option>--select--</option>
                  <option>Standard Room</option>
                  <option>Deluxe Room</option>
                  <option>Suite</option>
                  <option>Family Room</option>
                  <option>Single Room </option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="mt-3 col">
               <label for="status" class="form-label">Status *</label>
               <select class="form-control" id="status" name="status" value="<?= set_value('status')  ?>" required>
                  <option>--select--</option>
                  <option>Active</option>
                  <option>Inactive</option>
               </select>
            </div>
            <div class="mt-3 col">
               <label for="bedType" class="form-label">Bed Type *</label>
               <select class="form-control" id="bedType" name="bedType" value="<?= set_value('bedType')?>" required>
                  <option>--select--</option>
                  <option>Single Bed</option>
                  <option>Double Bed</option>
                  <option>Queen Bed</option>
                  <option>King Bed</option>
                  <option>Bunk Bed</option>
               </select>
            </div>
            <div class="mt-3 col">
               <label for="capacity" class="form-label">Capacity *</label>
               <select class="form-control" id="capacity" name="capacity" value="<?= set_value('capacity') ?>" required>
                  <option>--select--</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="mt-3 col">
               <label for="size" class="form-label">Size *</label>
               <input type="text" class="form-control" id="size" name="size" value="<?= set_value('size') ?>" required>
            </div>
            <div class="mt-3 col">
               <label for="floor" class="form-label">Floor *</label>
               <input type="text" class="form-control" id="floor" name="floor" value="<?= set_value('floor') ?>" required>
            </div>
            <div class="mt-3 col">
               <label for="roomView" class="form-label">Room View *</label>
               <select class="form-control" id="roomView" name="roomView" value="<?= set_value('roomView') ?>" required>
                  <option>--select--</option>
                  <option>Sea View</option>
                  <option>City View</option>
                  <option>Garden View</option>
                  <option>Mountain View</option>
                  <option>Pool View</option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="mt-3 col">
               <label for="amenities" class="form-label">Amenities *</label>
               <select class="form-control" id="amenities" name="amenities" value="<?= set_value('amenities') ?>" required>
                  <option>--select--</option>
                  <option>Swimming Pool</option>
                  <option>Gym</option>
                  <option>Parking Lot</option>
                  <option>Wi-fi</option>
                  <option>Conference Room</option>
               </select>
            </div>
            <div class="mt-3 col">
               <label for="basePrice" class="form-label">Base Price *</label>
               <input class="form-control" name="basePrice" id="basePrice" value="<?= set_value('basePrice') ?>" required>
            </div>
            <div class="mt-3 col">
               <label for="currency" class="form-label">Currency *</label>
               <select class="form-control" name="currency" id="currency" value="<?= set_value('currency')?>" required>
                  <option>--select--</option>
                  <option>USD</option>
                  <option>EUR</option>
                  <option>RUP</option>
                  <option>CHF</option>
                  <option>DKK</option>
                  <option>JPY</option>
                  <option>CAD</option>
                  <option>CNY</option>
                  <option>HKD</option>
                  <option>NZD</option>
               </select>
            </div>
         </div>
         <div class="row">
            <p class="mt-3"><strong><u>Seasonal Rate</u></strong></p>
            <div class="mt-3 col">
               <label for="highSeason" class="form-label">High Season</label>
               <input type="number" class="form-control" name="highSeason" id="highSeason" required>
            </div>
            <div class="mt-3 col">
               <label for="lowSeason" class="form-label">Low Season</label>
               <input type="number" class="form-control" name="lowSeason" id="lowSeason" required>
            </div>
         </div>
         <div class="row">
            <p class="mt-3"><strong><u>Discounts</u></strong></p>
            <div class="mt-3 col">
               <label for="earlyBird" class="form-label">Early Bird</label>
               <input type="text" class="form-control" name="earlyBird" id="earlyBird" required>
            </div>
            <div class="mt-3 col">
               <label for="lastMinute" class="form-label">Last Minute</label>
               <input type="text" class="form-control" name="lastMinute" id="lastMinute" required>
            </div>
         </div>
         <div class="mt-3">
            <label for="cancellationPolicy" class="form-label">Cancellation Policy</label>
            <textarea class="form-control" name="cancellationPolicy" id="cancellationPolicy"></textarea>
         </div>
         <div class="row">
            <div class="mt-3 col">
               <label for="checkInTime" class="form-label">Check In Time</label>
               <input type="text" class="form-control" name="checkInTime" id="checkInTime">
            </div>
            <div class="mt-3 col">
               <label for="checkOutTime" class="form-label">Check Out Time</label>
               <input type="text" class="form-control" name="checkOutTime" id="checkOutTime">
            </div>
            <div class="mt-3 col">
               <label for="nonRefundable" class="form-label">Non Refundable</label>
               <select for="nonRefundable" class="form-control">
                  <option>--select--</option>
                  <option>Yes</option>
                  <option>No</option>
               </select>
            </div>
         </div>
         <div class="row">
            <div class="mt-3 col">
               <label for="minStay" class="form-label">Minimum Stay</label>
               <input type="text" class="form-control" name="minStay" id="minStay">
            </div>
            <div class="mt-3 col">
               <label for="maxStay" class="form-label">Maximum Stay</label>
               <input type="text" class="form-control" name="maxStay" id="maxStay">
            </div>
            <div class="mt-3 col">
               <label for="features" class="form-label">Features</label>
               <select class="form-control" for="features">
                  <option>--select--</option>
                  <option>Ocean View</option>
                  <option>Balcony</option>
                  <option>Jacuzzi</option>
               </select>
            </div>
         </div>
         <div class="row">
            <p class="mt-3"><strong><u>Media</u></strong></p>
            <div class="mt-3 col">
               <label for="image" class="form-label">Images</label>
               <input type="file" class="form-control" id="images" name="images[]" multiple>
            </div>
            <div class="mt-3 col">
               <label for="videos" class="form-label">Videos</label>
               <input type="file" class="form-control" id="videos" name="videos[]"multiple>
            </div>
         </div>
         <div class="row">
            <div class="mt-3 col">
               <label for="description" class="form-label">Description</label>
               <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mt-3 col">
               <label for="availabilityCalendar" class="form-label">Availability Calendar</label>
               <input type="date" class="form-control" name="availabilityCalendar" id="availabilityCalendar">
            </div>
         </div>
         <button type="submit" class="btn btn-primary mt-3">Save</button>
      </form>
   </div>
</div>
<?= $this->endSection() ?>