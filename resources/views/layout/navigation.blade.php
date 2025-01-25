<div class="lg:ml-10">
  <div class="menu-toggle-wrapper absolute right-7 top-8 lg:hidden">
      <button
          class="mr-5 my-3 py-3 px-5 border border-blue-50 text-white rounded active:bg-blue-300"
          id="btn-menu-opener"
      >
          <i class="fas fa-bars"></i>
      </button>
  </div>
  <nav
      ref="webNav"
      class="main max-lg:hidden lg:flex"
  >
      <ul class="navigation">
          <li class="max-lg:py-3">
              <a
                  class="{!! request()->path() === '/' ? 'active': '' !!}"
                  href="{{ url('/') }}"
                  {!! request()->path() === '/' !!}
                  >Home</a
              >
          </li>
          <li class="max-lg:py-3">
              <a
                  class="{!! request()->path() === 'letselschadetest' ? 'active': '' !!}"
                  href="{{ url('letselschadetest') }}"
                  >Letselschadetest</a
              >
          </li>
          <li class="max-lg:py-3">
              <a
                  class="{!! request()->path() === 'letselschadeclaimen' ? 'active': '' !!}"
                  href="{{ url('letselschadeclaimen') }}"
                  >Letselschade Claimen</a
              >
          </li>
          <li class="max-lg:py-3">
              <a
                  class="{!! request()->path() === 'contact' ? ' active': '' !!}"
                  href="{{ url('contact') }}"
                  >Contact</a
              >
          </li>
      </ul>
      <a
          href="tel:0880767676"
          class="phone"
          ><i class="fas fa-phone mr-2"></i><span class="hotline">088 - 076 76 76</span></a
      >
  </nav>
</div>