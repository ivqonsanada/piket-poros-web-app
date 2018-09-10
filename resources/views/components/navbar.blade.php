<div class="headerWrapper">
  <header>
      <nav>
          <a href="/" class="nav-home active">
              Home
            </a>
      </nav>
      <div class="logo">
          <a href="/" class="logo--link">
              </a>
      </div>
      <div class="right">
          @if (session()->exists('data'))
          <a href="{{ route('user.dashboard') }}">
                  {{session()->get('data')['nama'] }}
              </a>
          <a href="{{ route('user.logout') }}">
                      logout
                  </a> @endif @if (!session()->exists('data'))
          <a href="{{ route('login') }}">
                  Log in
              </a> @endif


      </div>

      <div class="mobile">
          <div class="link active">
              @if (session()->exists('data'))
              <a href="">
                          logout
                      </a> @endif @if (!session()->exists('data'))
              <a href="{{ route('login') }}">
                      Log in
                  </a> @endif
          </div>

          <div class="logo">
              <a href="/" class="logo--link">
                </a>
          </div>

          <div class="burger">
              <div class="bars">
                  <span></span>
                  <span></span>
                  <span></span>
              </div>
          </div>
      </div>

      <ul class="mobile-dropdown">
          <li class="log-in">
                  @if (session()->exists('data'))
                  <a href="{{ route('user.dashboard') }}">
                      {{session()->get('data')['nama'] }}
                  </a>
                  <a href="">
                          logout
                      </a>
              @endif
              @if (!session()->exists('data'))
                  <a href="{{ route('login') }}">
                      Log in
                  </a>
              @endif
          </li>
      </ul>
  </header>
</div>