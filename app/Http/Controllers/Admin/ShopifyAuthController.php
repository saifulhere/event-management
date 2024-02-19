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
        $callbackUrl = route('shopify.callback'); // Assuming this is correct
        $authorizationUrl = 'https://' . $handle . '.myshopline.com/admin/oauth-web' .
            '?appKey=' . $appkey . '&responseType=code' .
            '&scope=' . 'read_products' . // The requested scopes
            '&redirectUri=' . urlencode($callbackUrl);
        
        // Redirect users to the Shopify OAuth authorization URL
        return redirect($authorizationUrl);
        
    }

    public function handleShopifyCallback (Request $request)
    {
        dd($request);
    }
}
