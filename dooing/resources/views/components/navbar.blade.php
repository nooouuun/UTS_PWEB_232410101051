<nav style="background-color: #fdf7ed;">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="flex h-20 items-center justify-between">
        <div class="flex items-center space-x-8 ml-4">
          <img class="size-20" src="{{ asset('images/dooing.png') }}" alt="Logo">
          <div class="hidden md:flex space-x-8">
            <a href="/dashboard" class="px-3 py-2 rounded-md text-xl font-medium"
               style="color: #4a3f35;"
               onmouseover="this.style.backgroundColor='#f0e9de'; this.style.color='#1f1f1f'"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4a3f35'">
              Dashboard
            </a>
            <a href="/to-do-list" class="px-3 py-2 rounded-md text-xl font-medium"
               style="color: #4a3f35;"
               onmouseover="this.style.backgroundColor='#f0e9de'; this.style.color='#1f1f1f'"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4a3f35'">
              To-do list
            </a>
            <a href="/profile" class="px-3 py-2 rounded-md text-xl font-medium"
               style="color: #4a3f35;"
               onmouseover="this.style.backgroundColor='#f0e9de'; this.style.color='#1f1f1f'"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4a3f35'">
              Profile
            </a>
            <a href="#" onclick="logoutHandler(event)" class="px-3 py-2 rounded-md text-xl font-medium"
               style="color: #4a3f35;"
               onmouseover="this.style.backgroundColor='#f0e9de'; this.style.color='#1f1f1f'"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4a3f35'">
              Log out
            </a>
          </div>
        </div>

        <div class="-mr-2 flex md:hidden">
          <button onclick="toggleMenu()" type="button"
                  class="inline-flex items-center justify-center rounded-md p-2"
                  style="background-color: #fdf7ed; color: #4a3f35;"
                  onmouseover="this.style.backgroundColor='#f0e9de'"
                  onmouseout="this.style.backgroundColor='#fdf7ed'">
            <span class="sr-only">Open main menu</span>
            <svg id="hamburgerIcon" class="block h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
          </button>
        </div>
      </div>
    </div>

    <div id="mobileMenu" class="hidden md:hidden" style="background-color: #fdf7ed;">
      <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        <a href="/dashboard" class="block rounded-md px-3 py-2 text-xl font-medium"
           style="color: #4a3f35;"
           onmouseover="this.style.backgroundColor='#f0e9de'; this.style.color='#1f1f1f'"
           onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4a3f35'">
          Dashboard
        </a>
        <a href="/to-do-list" class="block rounded-md px-3 py-2 text-xl font-medium"
           style="color: #4a3f35;"
           onmouseover="this.style.backgroundColor='#f0e9de'; this.style.color='#1f1f1f'"
           onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4a3f35'">
          To-do list
        </a>
        <a href="/profile" class="block rounded-md px-3 py-2 text-xl font-medium"
           style="color: #4a3f35;"
           onmouseover="this.style.backgroundColor='#f0e9de'; this.style.color='#1f1f1f'"
           onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4a3f35'">
          Profile
        </a>
        <a href="#" onclick="logoutHandler(event)" class="block rounded-md px-3 py-2 text-xl font-medium"
           style="color: #4a3f35;"
           onmouseover="this.style.backgroundColor='#f0e9de'; this.style.color='#1f1f1f'"
           onmouseout="this.style.backgroundColor='transparent'; this.style.color='#4a3f35'">
          Log Out
        </a>
      </div>
    </div>
  </nav>

  <script>
    function logoutHandler(e) {
      e.preventDefault();
      if (confirm('Apakah Anda yakin ingin logout?')) {
        window.location.href = '/';
      }
    }

    function toggleMenu() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    }
  </script>
