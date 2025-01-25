@extends('layout.web')

@section('content')
<div class="pt-12 pb-14 px-6">
	<div class="container mx-auto">
		<div class="md:flex justify-center gap-4 text-white">
			<div class="text-center max-lg:mb-10">
				<div style="width:15rem; height: 15rem" class="rounded-full border-4 border-white shadow-lg overflow-hidden mb-2 mx-auto">
					<img src="{{ url('assets/images/roel.jpg') }}">
				</div>
				<h4 class="font-bold">Roel van Reenen</h4>
				<p>Registerexpert Personenschade<br>(NIVRE)</p>
			</div>
			<div class="text-center">
				<div style="width: 15rem; height: 15rem" class="rounded-full border-4 border-white shadow-lg overflow-hidden mb-2 mx-auto">
					<img src="{{ url('assets/images/judith.jpg') }}">
				</div>
				<h4 class="font-bold">Judith van Helmont-Mallee</h4>
				<p>Registerexpert Personenschade<br>(NIVRE)</p>
			</div>
		</div>
	</div>
</div>
<div class="pt-12 pb-14 px-6 bg-white">
	<div>
		@if (session('success_msg'))
				<div class="bg-green-200 border-4 border-green-900 py-2 px-5 my-3">
					{!! session('success_msg') !!}
				</div>
		@endif
		@if (session('error_msg'))
				<div class="bg-red-200 border-4 border-red-900 py-2 px-5 my-3">
					{!! session('error_msg') !!}
				</div>
		@endif
		<div class="lg:grid grid-cols-2 gap-5 place-items-center">
			<div class="max-lg:mb-5 p-24">
				<h2 class="font-bold text-slate-700 text-3xl mb-3">Wanneer heb ik recht op een letselschadevergoeding? </h2>
				<p class="text-2xl"> Wilt u weten of u in aanmerking komt voor een letselschadevergoeding? Dan kunt u het beste de letselschade test invullen. Hierna zal een letselschade-expert (kosteloos) bekijken wat de mogelijkheden zijn voor het verhalen van de door uw schade op de tegenpartij. </p>
				<p class="text-2xl"> Wij zijn een onafhankelijke organisatie en werken met geregistreerde letselschade-experts. </p>
				<h2 class="font-bold text-slate-700 text-3xl mb-3"> Neem contact met ons op </h2>
				<p class="text-2xl"> Dit kunt u telefonisch doen, per e-mail, of u vult de letselschade test in voor een indicatie van uw letselschade/Smartengeld en wat precies de juridische mogelijkheden zijn. </p>
				<p class="text-3xl text-green-900 mt-5"><i class="fas fa-phone"></i> 088 0767676 </p>
			</div>
			<div>
				<h3 class="text-3xl font-title text-center text-blue-900 font-bold"> Contact formulier </h3>
				<div>
					<h3 class="text-center font-title"> Stuur uw vragen en/ of opmerkingen op </h3>
					<form method="POST" action="{{ url('contact') }}">
						@csrf
						<!-- Honeypot field (hidden from real users) -->
						<input type="text" name="website" style="display:none">

						<!-- Time-based field (hidden) -->
						<input type="hidden" name="form_start_time" value="{{ time() }}">
										<label class="block font-medium text-sm text-gray-700" for="firstname">
							<span>Name</span>
						</label>
						<div class="flex gap-5 mb-3">
							<label>
								<input type="radio" name="gender" class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" value="m"> Dhr. 
							</label>
							<label>
								<input type="radio" name="gender" class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" modelvalue="m" value="f"> Mevr. 
							</label>
							@error('gender')
									<div class="text-red-600 font-bold">{{ $message }}</div>
							@enderror
						</div>
						<div class="lg:grid grid-cols-2 gap-3">
							<div class="relative z-0">
								<div class="relative mb-3">
									<input type="text" id="firstname" name="firstname" class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-lg text-gray-900 bg-gray-200 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
									<label for="firstname" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Voornaam</label>
									@error('firstname')
											<div class="text-red-600 font-bold">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="relative z-0">
								<div class="relative mb-3">
									<input type="text" id="lastname" name="lastname" class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-lg text-gray-900 bg-gray-200 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
									<label for="lastname" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Achternaam</label>
									@error('lastname')
											<div class="text-red-600 font-bold">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>
						<div class="lg:grid grid-cols-2 gap-3">
							<div class="relative z-0">
								<div class="relative mb-3">
									<input type="email" id="email" name="email" class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-lg text-gray-900 bg-gray-200 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
									<label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">E-mailadres</label>
									@error('email')
											<div class="text-red-600 font-bold">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="relative z-0">
								<div class="relative mb-3">
									<input type="tel" id="telephone" name="telephone" class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-lg text-gray-900 bg-gray-200 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
									<label for="telephone" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Telefoonnummer</label>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<select id="subject" name="subject" class="pl-3 pr-10 py-2 text-base border-gray-300 bg-gray-200 focus:outline-none focus:ring-blue-800 focus:border-blue-800 sm:text-sm rounded-md w-full">
								<option value="">Waar gaat uw vraag/opmerking over</option>
								<option value="Technische problemen">Technische problemen</option>
								<option value="Onze vestigingen/ letselschade adviseurs">Onze vestigingen/ letselschade adviseurs</option>
								<option value="Letselschadebehandelaar">Letselschadebehandelaar</option>
								<option value="Overig">Overig</option>
							</select>
							@error('subject')
									<div class="text-red-600 font-bold">{{ $message }}</div>
							@enderror
						</div>
						<div>
							<div class="relative z-0">
								<div class="relative mb-3">
									<textarea id="details" name="details" class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-lg text-gray-900 bg-gray-200 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" rows="5" placeholder=" "></textarea>
									<label for="details" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Stel een vraag of maak een opmerking</label>
									@error('details')
											<div class="text-red-600 font-bold">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>
						<button class="inline-flex items-center px-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 text-center mt-5 py-4 w-full">Verzenden</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection