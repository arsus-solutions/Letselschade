<div class="lg:ml-10">
  <!-- Mobile Menu Toggle -->
  <div class="menu-toggle-wrapper absolute right-7 top-8 lg:hidden z-50">
      <button
          class="py-3 px-5 border-2 border-teal-500 text-slate-900 bg-white rounded-lg hover:bg-teal-50 active:bg-teal-100 transition-colors shadow-md"
          id="btn-menu-opener"
      >
          <i class="fas fa-bars text-xl"></i>
      </button>
  </div>

  <!-- Navigation - FIXED LAYOUT -->
  <nav ref="webNav" class="main flex items-center justify-between gap-6">
      <ul class="navigation max-lg:hidden flex items-center gap-2">
          <li>
              <a
                  class="block px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->path() === '/' ? 'bg-teal-500 text-white shadow-md hover:bg-teal-600' : 'text-slate-700 hover:text-teal-600 hover:bg-teal-50' }}"
                  href="{{ url('/') }}"
              >Home</a>
          </li>
          <li>
              <a
                  class="block px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->path() === 'letselschadetest' ? 'bg-teal-500 text-white shadow-md hover:bg-teal-600' : 'text-slate-700 hover:text-teal-600 hover:bg-teal-50' }}"
                  href="{{ url('letselschadetest') }}"
              >Letselschadetest</a>
          </li>
          <li>
              <a
                  class="block px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->path() === 'letselschadeclaimen' ? 'bg-teal-500 text-white shadow-md hover:bg-teal-600' : 'text-slate-700 hover:text-teal-600 hover:bg-teal-50' }}"
                  href="{{ url('letselschadeclaimen') }}"
              >Letselschade Claimen</a>
          </li>
          <li>
              <a
                  class="block px-4 py-2 rounded-lg font-medium transition-all duration-200 {{ request()->path() === 'contact' ? 'bg-teal-500 text-white shadow-md hover:bg-teal-600' : 'text-slate-700 hover:text-teal-600 hover:bg-teal-50' }}"
                  href="{{ url('contact') }}"
              >Contact</a>
          </li>
      </ul>

      <!-- Phone Number CTA - NOW ON SAME LINE -->
      <a
          href="tel:0880767676"
          class="phone flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-lg hover:shadow-xl whitespace-nowrap"
      >
          <i class="fas fa-phone"></i>
          <span class="hotline">088 - 076 76 76</span>
      </a>
  </nav>
</div>