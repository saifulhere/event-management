<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopifyAuthController extends Controller
{
    public function redirectToShopify (Request $request)
    {

        $handle = $request->input('handle');
        $appkey = $request->input('appkey');
        $callbackUrl = route('shopify.callback');
        $authorizationUrl = 'https://'.$handle.'myshopline.com/admin/oauth-web' .
        '?appkey=' . $appkey .'?responseType=code'.
        '&scope=' . 'read_products' . // The requested scopes
        '&redirect_uri=' . url('https://www.eventbookingbd.com/shopify/callback');

        // Redirect users to the Shopify OAuth authorization URL
        return redirect($authorizationUrl);
    }

    public function handleShopifyCallback (Request $request)
    {
        dd($request);
    }
}
