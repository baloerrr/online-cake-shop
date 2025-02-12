   <div class="fixed">
       <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200">
           <div :class="sidebarOpen ? 'block' : 'hidden'" @click= "sidebarOpen = false"
               class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

           <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
               class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-gray-900 lg:translate-x-0 lg:static lg:inset-0">
               <div class="flex items-center justify-center mt-8">
                   <div class="flex items-center">


                       <span class="mx-2 text-2xl font-semibold text-center text-white">Welcome Sir <br> {{auth()->user()->name}}</span>
                   </div>
               </div>

               <nav class="mt-10">
                   <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:text-gray-100 hover:bg-gray-700 bg-opacity-25" href="{{route('dashboard')}}">
                       <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                       </svg>

                       <span class="mx-3">Dashboard</span>
                   </a>

                   <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                       href="{{route('user.index')}}">
                       <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                           </path>
                       </svg>

                       <span class="mx-3">User</span>
                   </a>

                   <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                       href="{{route('customer.index')}}">
                       <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                           </path>
                       </svg>

                       <span class="mx-3">Customer</span>
                   </a>

                   <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                       href="{{route('product.index')}}">
                       <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                           </path>
                       </svg>

                       <span class="mx-3">Product</span>
                   </a>

                   <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                       href="{{route('catagory.index')}}">
                       <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                           </path>
                       </svg>

                       <span class="mx-3">Category</span>
                   </a>

                   <a class="flex items-center px-6 py-2 mt-4 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                       href="{{route('checkout.index')}}">
                       <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                               d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                           </path>
                       </svg>

                       <span class="mx-3">Checkout</span>
                   </a>


               </nav>
           </div>
       </div>
   </div>
