<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\WebsiteSubscription;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return response()->json(Website::all());
    }

    public function subscription(Request $request)
    {
        $subscription = WebsiteSubscription::create($request->all());
        return response()->json([
                'success' => true,
                'user_id' => $subscription->user_id,
                'website_id' => $subscription->website_id
            ]);
    }
}
