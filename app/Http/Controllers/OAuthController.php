<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OAuthController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id'     => env('OAUTH_CLIENT_ID'),
            'redirect_uri'  => env('OAUTH_CLIENT_CALLBACK'),
            'response_type' => 'code',
            'scope'         => '',
        ]);

        return redirect(env('OAUTH_SERVER_URI') . 'oauth/authorize?' . $query);
    }

    public function callback(Request $request)
    {
        // Check if the response includes authorization_code
        if ($request->filled('code')) {
            $tokenResponse = Http::post(env('OAUTH_SERVER_URI') . 'oauth/token', [
                'grant_type'    => 'authorization_code',
                'client_id'     => env('OAUTH_CLIENT_ID'),
                'client_secret' => env('OAUTH_CLIENT_SECRET'),
                'redirect_uri'  => env('OAUTH_CLIENT_CALLBACK'),
                'code'          => $request->input('code'),
            ]);

            $tokenData = $tokenResponse->json();



            $account = Http::withHeaders([
                'Authorization' => "Bearer " . $tokenData['access_token']
            ])->get(env("OAUTH_SERVER_URI") . 'me')->json();

            dd($account, $tokenData);

            dd("This is your token", $tokenData);
        }
    }
}
