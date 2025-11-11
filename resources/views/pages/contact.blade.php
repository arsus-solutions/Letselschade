@extends('layout.web')

@section('banner')
<div class="py-16 lg:py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
	<div class="container mx-auto px-6">
		<div class="text-center mb-12">
			<h1 class="text-4xl lg:text-5xl font-black text-white mb-4">
				Neem contact met ons op
			</h1>
			<p class="text-xl text-slate-300">
				Onze geregistreerde letselschade-experts staan voor u klaar
			</p>
		</div>

		<!-- Expert Profiles -->
		<div class="flex flex-wrap justify-center gap-12">
			<div class="text-center">
				<div class="w-64 h-64 rounded-full border-4 border-teal-400 shadow-2xl overflow-hidden mb-4 mx-auto relative group">
					<div class="absolute inset-0 bg-teal-500/20 group-hover:bg-teal-500/30 transition-all"></div>
					<img src="{{ url('assets/images/roel.jpg') }}" alt="Roel van Reenen" class="w-full h-full object-cover">
				</div>
				<h4 class="font-bold text-xl text-white mb-1">Roel van Reenen</h4>
				<p class="text-teal-400 font-semibold">Registerexpert Personenschade</p>
				<p class="text-slate-400">(NIVRE)</p>
			</div>
			<div class="text-center">
				<div class="w-64 h-64 rounded-full border-4 border-teal-400 shadow-2xl overflow-hidden mb-4 mx-auto relative group">
					<div class="absolute inset-0 bg-teal-500/20 group-hover:bg-teal-500/30 transition-all"></div>
					<img src="{{ url('assets/images/judith.jpg') }}" alt="Judith van Helmont-Mallee" class="w-full h-full object-cover">
				</div>
				<h4 class="font-bold text-xl text-white mb-1">Judith van Helmont-Mallee</h4>
				<p class="text-teal-400 font-semibold">Registerexpert Personenschade</p>
				<p class="text-slate-400">(NIVRE)</p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="py-12 bg-white">
	<div class="container mx-auto px-6">
		
		<!-- Success/Error Messages -->
		@if (session('success_msg'))
			<div class="max-w-4xl mx-auto mb-8">
				<div class="bg-teal-50 border-2 border-teal-500 rounded-lg py-4 px-6 flex items-start gap-3">
					<i class="fa-solid fa-circle-check text-teal-500 text-2xl mt-1"></i>
					<div class="text-teal-900 font-medium">{!! session('success_msg') !!}</div>
				</div>
			</div>
		@endif
		@if (session('error_msg'))
			<div class="max-w-4xl mx-auto mb-8">
				<div class="bg-red-50 border-2 border-red-500 rounded-lg py-4 px-6 flex items-start gap-3">
					<i class="fa-solid fa-circle-exclamation text-red-500 text-2xl mt-1"></i>
					<div class="text-red-900 font-medium">{!! session('error_msg') !!}</div>
				</div>
			</div>
		@endif

		<div class="lg:grid lg:grid-cols-2 gap-12 items-start">
			
			<!-- Left Column: Info -->
			<div class="bg-slate-50 rounded-2xl p-8 lg:p-12 mb-8 lg:mb-0">
				<h2 class="font-bold text-slate-900 text-3xl mb-6 flex items-center gap-3">
					<i class="fa-solid fa-circle-question text-teal-500"></i>
					Wanneer heb ik recht op een letselschadevergoeding?
				</h2>
				<p class="text-xl text-slate-700 mb-6 leading-relaxed">
					Wilt u weten of u in aanmerking komt voor een letselschadevergoeding? Dan kunt u het beste de letselschade test invullen. Hierna zal een letselschade-expert (kosteloos) bekijken wat de mogelijkheden zijn voor het verhalen van de door uw schade op de tegenpartij.
				</p>
				<p class="text-xl text-slate-700 mb-8 leading-relaxed">
					Wij zijn een onafhankelijke organisatie en werken met geregistreerde letselschade-experts.
				</p>
				
				<h2 class="font-bold text-slate-900 text-3xl mb-6 flex items-center gap-3">
					<i class="fa-solid fa-headset text-teal-500"></i>
					Neem contact met ons op
				</h2>
				<p class="text-xl text-slate-700 mb-6 leading-relaxed">
					Dit kunt u telefonisch doen, per e-mail, of u vult de letselschade test in voor een indicatie van uw letselschade/Smartengeld en wat precies de juridische mogelijkheden zijn.
				</p>
				
				<!-- Phone Number -->
				<div class="bg-gradient-to-r from-teal-500 to-cyan-600 rounded-xl p-6 text-white mb-6">
					<div class="flex items-center gap-4">
						<div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
							<i class="fa-solid fa-phone text-2xl"></i>
						</div>
						<div>
							<div class="text-sm text-white/80 mb-1">Bel ons direct</div>
							<a href="tel:0880767676" class="text-3xl font-bold hover:text-white/90 transition-colors">088 - 076 76 76</a>
						</div>
					</div>
				</div>

				<!-- CTA Button -->
				<a 
					href="/letselschadetest" 
					class="block w-full px-6 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white text-center font-bold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl"
				>
					<i class="fa-solid fa-clipboard-check mr-2"></i>
					Start de gratis test
				</a>
			</div>

			<!-- Right Column: Form -->
			<div class="bg-white rounded-2xl shadow-lg p-8 lg:p-12">
				<h3 class="text-3xl font-black text-slate-900 text-center mb-2">
					Contactformulier
				</h3>
				<p class="text-center text-slate-600 mb-8">
					Stuur uw vragen en/of opmerkingen op
				</p>

				<form method="POST" action="{{ url('contact') }}">
					@csrf
					<!-- Honeypot field (hidden from real users) -->
					<input type="text" name="website" style="display:none">
					<!-- Time-based field (hidden) -->
					<input type="hidden" name="form_start_time" value="{{ time() }}">

					<!-- Gender Selection -->
					<div class="mb-6">
						<label class="block font-semibold text-slate-900 mb-3">Aanhef <span class="text-red-500">*</span></label>
						<div class="flex gap-6">
							<label class="flex items-center gap-2 cursor-pointer">
								<input type="radio" name="gender" class="w-4 h-4 text-teal-600 focus:ring-teal-500" value="m" {{ old('gender') == 'm' ? 'checked' : '' }} required>
								<span class="text-slate-700">Dhr.</span>
							</label>
							<label class="flex items-center gap-2 cursor-pointer">
								<input type="radio" name="gender" class="w-4 h-4 text-teal-600 focus:ring-teal-500" value="f" {{ old('gender') == 'f' ? 'checked' : '' }} required>
								<span class="text-slate-700">Mevr.</span>
							</label>
						</div>
						@error('gender')
							<div class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</div>
						@enderror
					</div>

					<!-- Name Fields -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
						<div>
							<label for="firstname" class="block font-semibold text-slate-900 mb-2">Voornaam <span class="text-red-500">*</span></label>
							<input 
								type="text" 
								id="firstname" 
								name="firstname" 
								value="{{ old('firstname') }}"
								class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 transition-colors @error('firstname') border-red-500 focus:border-red-500 focus:ring-red-200 @else border-slate-200 focus:border-teal-500 focus:ring-teal-200 @enderror"
								placeholder="Uw voornaam"
								required
							>
							@error('firstname')
								<div class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</div>
							@enderror
						</div>
						<div>
							<label for="lastname" class="block font-semibold text-slate-900 mb-2">Achternaam <span class="text-red-500">*</span></label>
							<input 
								type="text" 
								id="lastname" 
								name="lastname" 
								value="{{ old('lastname') }}"
								class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 transition-colors @error('lastname') border-red-500 focus:border-red-500 focus:ring-red-200 @else border-slate-200 focus:border-teal-500 focus:ring-teal-200 @enderror"
								placeholder="Uw achternaam"
								required
							>
							@error('lastname')
								<div class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</div>
							@enderror
						</div>
					</div>

					<!-- Email & Phone -->
					<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
						<div>
							<label for="email" class="block font-semibold text-slate-900 mb-2">E-mailadres <span class="text-red-500">*</span></label>
							<input 
								type="email" 
								id="email" 
								name="email" 
								value="{{ old('email') }}"
								class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 transition-colors @error('email') border-red-500 focus:border-red-500 focus:ring-red-200 @else border-slate-200 focus:border-teal-500 focus:ring-teal-200 @enderror"
								placeholder="uw@email.nl"
								required
							>
							@error('email')
								<div class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</div>
							@enderror
						</div>
						<div>
							<label for="telephone" class="block font-semibold text-slate-900 mb-2">Telefoonnummer</label>
							<input 
								type="tel" 
								id="telephone" 
								name="telephone" 
								value="{{ old('telephone') }}"
								class="w-full px-4 py-3 border-2 border-slate-200 rounded-lg focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition-colors"
								placeholder="06 12345678"
							>
						</div>
					</div>

					<!-- Subject -->
					<div class="mb-4">
						<label for="subject" class="block font-semibold text-slate-900 mb-2">Onderwerp <span class="text-red-500">*</span></label>
						<select 
							id="subject" 
							name="subject" 
							class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 transition-colors @error('subject') border-red-500 focus:border-red-500 focus:ring-red-200 @else border-slate-200 focus:border-teal-500 focus:ring-teal-200 @enderror"
							required
						>
							<option value="">Waar gaat uw vraag/opmerking over</option>
							<option value="Technische problemen" {{ old('subject') == 'Technische problemen' ? 'selected' : '' }}>Technische problemen</option>
							<option value="Onze vestigingen/ letselschade adviseurs" {{ old('subject') == 'Onze vestigingen/ letselschade adviseurs' ? 'selected' : '' }}>Onze vestigingen/ letselschade adviseurs</option>
							<option value="Letselschadebehandelaar" {{ old('subject') == 'Letselschadebehandelaar' ? 'selected' : '' }}>Letselschadebehandelaar</option>
							<option value="Overig" {{ old('subject') == 'Overig' ? 'selected' : '' }}>Overig</option>
						</select>
						@error('subject')
							<div class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</div>
						@enderror
					</div>

					<!-- Message -->
					<div class="mb-6">
						<label for="details" class="block font-semibold text-slate-900 mb-2">Bericht <span class="text-red-500">*</span></label>
						<textarea 
							id="details" 
							name="details" 
							rows="5"
							class="w-full px-4 py-3 border-2 rounded-lg focus:ring-2 transition-colors @error('details') border-red-500 focus:border-red-500 focus:ring-red-200 @else border-slate-200 focus:border-teal-500 focus:ring-teal-200 @enderror"
							placeholder="Stel een vraag of maak een opmerking (minimaal 10 tekens)"
							required
							minlength="10"
						>{{ old('details') }}</textarea>
						@error('details')
							<div class="text-red-600 text-sm mt-1 font-medium">{{ $message }}</div>
						@enderror
					</div>

					<!-- Submit Button -->
					<button 
						type="submit"
						class="w-full px-6 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl text-lg"
					>
						<i class="fa-solid fa-paper-plane mr-2"></i>
						Verzenden
					</button>
				</form>
			</div>

		</div>
	</div>
</div>
@endsection