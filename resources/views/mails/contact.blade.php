@extends('layout.mail')

@section('content')
<p>Beste {{ $data['gender'] === 'm' ? 'Dhr.': 'Mevr.' }} {{ $data['firstname'] }} {{ $data['lastname'] }},</p>
<p>U heeft ons middels het contactformulier op de website <a href='http://www.letselschadeclaimen.nl'>Letselschadeclaimen.nl</a>
een bericht gestuurd met een vraag of opmerking:</p>


<table cellspacing="0" cellpadding="5">
<tr class='status1'><td colspan='2' class='header'>Vraag/opmerking</td></tr>
<tr class='status1'><th>Email adres</th><td>{{ $data['email'] }}</td></tr>
<tr class='status1'><th width='300px'>Onderwerp</th><td>{{ $data['subject'] }}</td></tr>
<tr><td colspan='2' class='status1'>{{ $data['details'] }}</td></tr>
</table>
<div>
<p>Wij nemen uw vraag of opmerking in behandeling en u hoort zo snel mogelijk van ons. U kunt tevens bellen met onderstaand telefoonnummer.</p></div>
@endsection