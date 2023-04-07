<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title')</title>
    <?php $title = app()->view->getSections()['title']; ?>
    @livewireStyles
    @yield('scripts')
</head>
<body class="bg-gray-100">

<div x-data="{
  navOpen: false,
  toggleNav() {
      if (this.navOpen) {
          return this.closeNav()
      }

      this.$refs.navButton.focus()

      this.navOpen = true
  },
  closeNav() {
    if (!this.navOpen) return

    this.navOpen = false

    focusAfter && focusAfter.focus()
},
}">
  <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <button x-ref="navButton" x-on:click="toggleNav()" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          <a href="#" class="flex ml-2 md:mr-24">
            <img src="/img/logo-login-small-idn.svg" class="h-8 mr-3" alt="IDN Logo" />
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">IDN Dormitory</span>
          </a>
          <div class="hidden py-2 px-3 gap-3 bg-gray-200 rounded-md md:flex">
            <img class="h-6 w-6" src="/img/logo-login-small-idn.svg" alt="">
            <span class="self-center text-sm text-gray-700">{{ $title }}</span>
            </div>
        </div>

        <div x-data="{
          open: false,
          toggle() {
              if (this.open) {
                  return this.close()
              }

              this.$refs.button.focus()

              this.open = true
          },
          close(focusAfter) {
              if (! this.open) return

              this.open = false

              focusAfter && focusAfter.focus()
          }
      }"
      x-on:keydown.escape.prevent.stop="close($refs.button)"
      x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
      x-id="['dropdown-button']" class="flex items-center">
            <div class="flex items-center ml-3 gap-4">
                <span class="py-2 px-3 bg-blue-500 text-sm text-white rounded-md">{{ auth()->user()->level }}</span>
              <div>
                <button
                x-ref="button"
                x-on:click="toggle()"
                :aria-expanded="open"
                :aria-controls="$id('dropdown-button')"
                type="button"
                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                </button>
              </div>
              <div
                x-ref="panel"
                x-show="open"
                x-transition.origin.top.left
                x-on:click.outside="close($refs.button)"
                :id="$id('dropdown-button')"
                style="display: none;"
                class="absolute mt-2 py-2 w-48 right-1 top-12 rounded-md bg-white shadow-md">
                  <a
                     href="{{ route('profile.edit') }}"
                     class="block px-2 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Account Settings</a>
                  {{-- <a
                     href="#"
                     class="block px-2 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Support</a> --}}
                  <form x-ref="form" method="POST" action="/logout">
                     @csrf
                     @method("POST")
                     <a x-on:click="$refs.form.submit()" class="block cursor-pointer px-2 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">Sign Out</a>
                  </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </nav>

  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 hidden bg-white border-r border-gray-200 lg:block" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2">
           <li>
              <a href="/dashboard" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                 <span class="ml-3">Dashboard</span>
              </a>
           </li>
           <li>
              <a href="{{ route('permits.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z"></path></svg>
                 <span class="flex-1 ml-3 whitespace-nowrap">Data Pulang</span>
              </a>
           </li>
           <li>
              <a href="{{ route("students.index") }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                 <span class="flex-1 ml-3 whitespace-nowrap">Data Santri</span>
              </a>
           </li>
           @if (auth()->user()->level=="ADMIN")
           <li>
              <a href="{{ route("users.index") }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path></svg>
                 <span class="flex-1 ml-3 whitespace-nowrap">Data User</span>
              </a>
           </li>
           @endif
        </ul>
     </div>
  </aside>
  <aside x-on:click.outside="closeNav($refs.navButton)" x-show="navOpen" id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 bg-white border-r border-gray-200 lg:hidden" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2">
           <li>
              <a href="/dashboard" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                 <span class="ml-3">Dashboard</span>
              </a>
           </li>
           <li>
              <a href="{{ route('permits.index') }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z"></path></svg>
                 <span class="flex-1 ml-3 whitespace-nowrap">Data Pulang</span>
              </a>
           </li>
           <li>
              <a href="{{ route("students.index") }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                 <span class="flex-1 ml-3 whitespace-nowrap">Data Santri</span>
              </a>
           </li>
           @if (auth()->user()->level=="ADMIN")
           <li>
              <a href="{{ route("users.index") }}" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg hover:bg-gray-100">
                 <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path></svg>
                 <span class="flex-1 ml-3 whitespace-nowrap">Data User</span>
              </a>
           </li>
           @endif
         </ul>
     </div>
  </aside>
</div>



<section class="mt-12 mx-[2rem] lg:ml-[18rem]">
   @yield('content')
</section>

@livewireScripts
<script src="/js/app.js"></script>
</body>
</html>
