<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookableReviewIndexResource;
use App\Models\Bookable;
use Illuminate\Http\Request;

class   BookableReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function __invoke(Bookable $bookable, Request $request)
    {
        return BookableReviewIndexResource::collection(
            $bookable->reviews()->latest()->get()
        );
    }
}
