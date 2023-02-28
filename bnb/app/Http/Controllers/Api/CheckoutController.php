<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Bookable;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'bookings' => 'required|array|min:1',
            'bookings.*.bookable_id' => 'required|exists:bookables,id',
            'bookings.*.from' => 'required|date|after_or_equal:today',
            'bookings.*.to' => 'required|date|after_or_equal:bookings.*.from',

            'customer.first_names' => 'required|min:2',
            'customer.last_name' => 'required|min:2',
            'customer.email' => 'required|email',
            'customer.street' => 'required|min:3',
            'customer.city' => 'required|min:3',
            'customer.country' => 'required|min:2',
            'customer.state' => 'required|min:2',
            'customer.zip' => 'required|min:4',
        ]);

        $data = array_merge($data, $request->validate([
            'bookings.*' => ['required',
                function($attribute, $value, $fail)
                {
                    $bookable = Bookable::findOrFail($value['bookable_id']);

                    if(!$bookable->availableFor($value['from'], $value['to']))
                        $fail("The object is not available in giv dates!");
                }],
        ]));

        $bookingsData = $data['bookings'];
        $addressData = $data['customer'];

        $bookings = collect($bookingsData)->map(function ($bookingsData) use ($addressData) {
            $bookable = Bookable::findOrFail($bookingsData['bookable_id']);
            $days = (new Carbon($bookingsData['from']))->diffInDays(new Carbon($bookingsData['to'])) + 1;
            $booking = new Booking();
            $booking->from = $bookingsData['from'];
            $booking->to = $bookingsData['to'];
            $booking->price = $days * $bookable->price;
            $booking->bookable_id = $bookingsData['bookable_id'];

            $booking->address()->associate(Address::create($addressData));

            $booking->save();

            return $booking;
        });

        return $bookings;
    }
}
