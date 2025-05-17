@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <!-- Vehicle Details Section -->
        <div class="col-md-6">
            <div class="deals__card">
                <?php $decodedImages = json_decode($vehicle->product_image, true); ?>

                @if(!empty($decodedImages) && is_array($decodedImages))
                <!-- Bootstrap Carousel -->
                <div id="carousel{{$vehicle->id}}" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($decodedImages as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('products/'.$image) }}" class="d-block w-100" alt="Product Image">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$vehicle->id}}" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel{{$vehicle->id}}" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
                @else
                <span class="text-gray-500">No images available</span>
                @endif

                <h3>{{ $vehicle->name }}</h3>

                <div class="deals__rating">
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-fill"></i></span>
                    <span><i class="ri-star-line"></i></span>
                    <span>(550)</span>
                </div>

                <div class="deals__card__grid">
                    <div><span><i class="ri-group-line"></i></span> 4 People</div>
                    <div><span><i class="ri-steering-2-line"></i></span> Autopilot</div>
                    <div><span><i class="ri-speed-up-line"></i></span> 400km</div>
                    <div><span><i class="ri-car-line"></i></span> Electric</div>
                    <!-- <h3>${{$vehicle->price}}</h3> -->
                   <!-- <h5 style="color: #FF0000;">{{$vehicle->discounted_price}}% OFF</h5> -->
                </div>
            </div>
        </div>

        <!-- Booking Form Section -->
        <div class="col-md-6">
            <h3>Book Vehicle: {{ $vehicle->name }}</h3>
            <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{ $vehicle->id }}">

                <div class="mb-3">
                    <label for="booking_date">Booking Date:</label>
                    <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="booking_end_date">Booking End Date:</label>
                    <input type="date" name="booking_end_date" id="booking_end_date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="file">Upload Driving License:</label>
                    <input type="file" name="file" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="amount">Total Amount:</label>
                    <input type="text" name="amount" id="amount" class="form-control" readonly>
                </div>
      <button type="submit" class="btn btn-primary">Confirm Booking</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#booking_date, #booking_end_date').on('change', function() {
            let bookingDate = $('#booking_date').val();
            let endDate = $('#booking_end_date').val();
            let productId = "{{ $vehicle->id }}";

            if (bookingDate && endDate) {
                $.ajax({
                    url: "{{ route('booking.calculatePrice') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId,
                        booking_date: bookingDate,
                        booking_end_date: endDate
                    },
                    success: function(response) {
                        $('#amount').val(response.amount);
                    }
                });
            }
        });
    });
</script>
@endsection
