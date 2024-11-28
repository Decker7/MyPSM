@extends('layout.web')

@section('content')
    <div class="mt-20">
        <h1>Payment for {{ $activity->name }}</h1>
        <p>Total Price: {{ $totalPrice }}</p>

        <form action="{{ route('payment.handle') }}" method="POST">
            @csrf
            <input type="hidden" name="payment_status" value="success">
            <button type="submit">Confirm Payment</button>
        </form>

    </div>
@endsection
