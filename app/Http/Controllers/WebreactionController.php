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

    public function show()
    {
        return view('pages.letselschade-test');
    }

    public function contact(Request $request) 
    {
        $form_start_time = $request->input('form_start_time');
        $submission_time = time() - $form_start_time;

        // IMPROVED ANTI-SPAM CHECKS
        if (
            $request->input('website') ||              // Honeypot filled = bot
            $submission_time < 3 ||                    // TOO FAST = bot
            $submission_time > 3600 ||                 // TOO SLOW = bot left form open
            strlen($request->input('details', '')) < 10 || // Message too short
            $this->containsSpamKeywords($request->input('details', '')) // Spam words
        ) {
            return redirect()->back()->with('success_msg', 'Bedankt! We nemen binnenkort contact met u op.');
        }

        // Validate the incoming request
        $validated = $request->validate([
            'gender' => 'required|string|in:m,f',
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:200',
            'details' => 'required|string|min:10|max:5000', // Min 10, max 5000 chars
        ]);

        $userData = [
            'api_username' => env('API_USERNAME'),
            'api_password' => env('API_PASSWORD'),
        ];

        $requestData = [
            'request' => [
                'contact_mail' => $request->all()
            ],
            'user' => $userData
        ];

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

            return redirect()->back()->with($type . '_msg', $messages);
        } catch (\Exception $e) {
            return redirect()->back()->with('error_msg', 'Er is een fout opgetreden. Probeer het later opnieuw.');
        }
    }

    // ADD THIS HELPER METHOD
    private function containsSpamKeywords($text)
    {
        $spam_keywords = [
            'viagra', 'cialis', 'poker', 'casino', 'loan', 'loans',
            'crypto', 'bitcoin', 'forex', 'trading', 'investment',
            'click here', 'buy now', 'limited offer', 'act now',
            'winner', 'congratulations', 'prize', 'lottery',
            'http://', 'https://', 'www.', '.com', '.net', // URLs in message
            'seo', 'backlink', 'rank higher', 'google ranking'
        ];
        
        $text_lower = strtolower($text);
        foreach ($spam_keywords as $keyword) {
            if (stripos($text_lower, $keyword) !== false) {
                return true;
            }
        }
        return false;
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'soort_ongeval' => 'required|string|in:verkeer,bedrijf,dier,wegdek,sportschool',
            'ongeval_datum' => 'required|date|before_or_equal:today|after:' . now()->subYears(10)->format('Y-m-d'),
            'tegenpartij' => 'required|string|in:ja,nee',
            'snel_hulp' => 'required|string|in:ja,nee',
            'letsel_beschrijving' => 'required|string|max:1000',
            'schade_ernst' => 'required|string|in:licht,matig,ernstig',
            'schade_omschrijving' => 'required|string|max:1000',
            'leeftijd' => 'required|integer|min:18|max:100',
            'extra_hulp' => 'array',
            'extra_hulp.*' => 'string|in:huishouding,kinderopvang,huisbezoek',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'availableTime' => 'required|string',
            'details' => 'nullable|string|max:2000',
            'privacy_akkoord' => 'required|accepted',
            'newsletter' => 'nullable|string|in:true,false',
            // Required fields for WebreactionController
            'postal_code_id' => 'required|int',
            'postal_code_letters' => 'required|string',
            'house_number' => 'required|string',
        ], [
            // Custom error messages in Dutch
            'soort_ongeval.required' => 'Selecteer alstublieft het soort ongeval.',
            'ongeval_datum.required' => 'Datum van het ongeval is verplicht.',
            'ongeval_datum.date' => 'Voer een geldige datum in.',
            'ongeval_datum.before_or_equal' => 'De datum kan niet in de toekomst liggen.',
            'ongeval_datum.after' => 'De datum mag niet meer dan 10 jaar geleden zijn.',
            'tegenpartij.required' => 'Selecteer alstublieft of de tegenpartij bekend is.',
            'snel_hulp.required' => 'Selecteer alstublieft of u snel geholpen wilt worden.',
            'letsel_beschrijving.required' => 'Korte omschrijving van het letsel is verplicht.',
            'letsel_beschrijving.max' => 'Letselomschrijving mag maximaal 1000 karakters bevatten.',
            'schade_ernst.required' => 'Selecteer alstublieft de ernst van de schade.',
            'schade_omschrijving.required' => 'Korte omschrijving van de schade is verplicht.',
            'schade_omschrijving.max' => 'Schadeomschrijving mag maximaal 1000 karakters bevatten.',
            'leeftijd.required' => 'Leeftijd is verplicht.',
            'leeftijd.integer' => 'Leeftijd moet een geldig getal zijn.',
            'leeftijd.min' => 'U moet minimaal 18 jaar oud zijn.',
            'leeftijd.max' => 'Voer een geldige leeftijd in.',
            'firstname.required' => 'Voornaam is verplicht.',
            'firstname.max' => 'Voornaam mag maximaal 255 karakters bevatten.',
            'lastname.required' => 'Achternaam is verplicht.',
            'lastname.max' => 'Achternaam mag maximaal 255 karakters bevatten.',
            'telephone.required' => 'Telefoonnummer is verplicht.',
            'email.required' => 'E-mailadres is verplicht.',
            'email.email' => 'Voer een geldig e-mailadres in.',
            'availableTime.required' => 'Selecteer alstublieft wanneer u het beste te bereiken bent.',
            'details.max' => 'Opmerkingen mogen maximaal 2000 karakters bevatten.',
            'privacy_akkoord.required' => 'U moet akkoord gaan met de privacyverklaring.',
            'privacy_akkoord.accepted' => 'U moet akkoord gaan met de privacyverklaring.',
            'postal_code_id.required' => 'Postcode ID is verplicht.',
            'postal_code_letters.required' => 'Postcode letters zijn verplicht.',
            'house_number.required' => 'Huisnummer is verplicht.',
        ]);

        $userData = [
            'api_username' => env('API_USERNAME'), // From .env file
            'api_password' => env('API_PASSWORD'), // From .env file
        ];

        // Map accident types to lead_type_id
        $accidentTypeMapping = [
            'verkeer' => 1,
            'bedrijf' => 2,
            'dier' => 3,
            'wegdek' => 4,
            'sportschool' => 5
        ];

        $webreactionData = [
            'webmodule_id' => 8,
            'lead_webreaction_type_id' => 1,
            'domain_name' => $request->getHost(),
            'lead_type_id' => $accidentTypeMapping[$validatedData['soort_ongeval']] ?? 1,
            'reference' => null,
            'gender' => $request->input('gender', 'u'),
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'house_number' => $validatedData['house_number'],
            'postal_code_id' => $validatedData['postal_code_id'],
            'postal_code_letters' => $validatedData['postal_code_letters'],
            'json_details' => [
                "Soort ongeval" => $validatedData['soort_ongeval'],
                "Datum ongeval" => $validatedData['ongeval_datum'],
                "Tegenpartij bekend" => $validatedData['tegenpartij'],
                "Snel hulp gewenst" => $validatedData['snel_hulp'],
                "Letsel beschrijving" => $validatedData['letsel_beschrijving'],
                "Schade ernst" => $validatedData['schade_ernst'],
                "Schade omschrijving" => $validatedData['schade_omschrijving'],
                "Leeftijd" => $validatedData['leeftijd'],
                "Extra hulp" => implode(', ', $validatedData['extra_hulp'] ?? []),
                "Wanneer bent u het beste te bereiken?" => $validatedData['availableTime'] . ' uur',
                "Eventuele vragen en/of opmerkingen" => $validatedData['details'] ?? '',
                "Newsletter" => $validatedData['newsletter'] === 'true' ? 'Ja' : 'Nee'
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
                'message' => is_array($messages) ? implode(', ', $messages) : $messages,
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
