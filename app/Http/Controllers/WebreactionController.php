<?php

namespace App\Http\Controllers;

use App\Http\Services\WebreactionService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class WebreactionController extends Controller
{
    protected $webreactionService;

    public function __construct(WebreactionService $webreactionService)
    {
        $this->webreactionService = $webreactionService;
    }

    public function contact(Request $request)
    {
        // Time-based validation (check if form was submitted too quickly)
        $form_start_time = $request->input('form_start_time');
        $submission_time = time() - $form_start_time;

        // Honeypot check (if the hidden field is filled, it's a bot)
        if ($submission_time > 5 && !$request->input('website')) {
            // Validate the incoming request
            $validated = $request->validate([
                'gender' => 'required|string',
                'firstname' => 'required|string',
                'lastname' => 'required|string',
                'email' => 'required|string|email',
                'subject' => 'required|string',
                'details' => 'required|string',
            ]);

            $userData = [
                'api_username' => env('API_USERNAME'), // From .env file
                'api_password' => env('API_PASSWORD'), // From .env file
            ];

            $requestData = [
                'request' => [
                    'contact_mail' => $request->all()
                ],
                'user' => $userData
            ];
            

            // Call the service to store data via the external API
            try {
                $type = 'error';
                $messages = '';
                $response = $this->webreactionService->storeData($requestData);

                if(isset($response['contact_mail'])) 
                {
                    if ($response['contact_mail']['success']) {
                        $type = 'success';
                        $messages = $response['contact_mail']['success'];
                    } else {
                        $messages = $response['contact_mail']['validate'];
                    }
                }

                // return success response
                return redirect()->back()->with($type . '_msg', $messages);
            } catch (\Exception $e) {
                // Handle the error (log it, show error message, etc.)
                return redirect()->back()->with('error_msg', $e->getMessage());
            }

        }
        return redirect()->back();
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'lead_type_id' => 'required|int',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email',
            'telephone' => 'required|string',
            'house_number' => 'required|string',
            'postal_code_id' => 'required|int',
            'postal_code_letters' => 'required|string',
        ]);

        $userData = [
            'api_username' => env('API_USERNAME'), // From .env file
            'api_password' => env('API_PASSWORD'), // From .env file
        ];

        $webreactionData = [
            'webmodule_id' => 8,
            'lead_webreaction_type_id' => 1,
            'domain_name' => $request->getHost(),
            'lead_type_id' => $validated['lead_type_id'],
            'reference' => null,
            'gender' => $request->input('gender', 'u'),
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'house_number' => $validated['house_number'],
            'postal_code_id' => $validated['postal_code_id'],
            'postal_code_letters' => $validated['postal_code_letters'],
            'json_details' => $request->get('json_details') + [
                "Wanneer bent u het beste te bereiken?" => $request->get('availableTime') . ' uur',
                "Eventuele vragen e/of opmerkingen" => $request->get('details', '')
            ]
        ];

        $requestData = [
            'request' => [
                'register_webreaction' => $webreactionData
            ],
            'user' => $userData
        ];

        // Call the service to store data via the external API
        try {
            $success = false;
            $messages = [];
            $response = $this->webreactionService->storeData($requestData);

            Log::info('webreaction', $response);

            if(
                isset($response['register_webreaction']) && 
                $response['register_webreaction']['error'] === false && 
                $response['register_webreaction']['id']) 
            {
                $success = true;
                $requestMail = [
                    'request' => [
                        'webreactionclaim_mail' => $webreactionData
                    ],
                    'user' => $userData
                ];
                $response = $this->webreactionService->storeData($requestMail);
            } else if ($response['register_webreaction']['error']) {
                $messages = $response['register_webreaction']['validate'];
            }

            // return success response
            return response()->json([
                'success' => $success,
                'message' => $messages,
            ]);
        } catch (\Exception $e) {
            // Handle the error (log it, show error message, etc.)
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
