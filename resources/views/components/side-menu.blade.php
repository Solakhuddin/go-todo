<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
       <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 <aside id="default-sidebar" class=" w-52 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">

   <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        {{-- <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button> --}}
        <ul class="space-y-2">
            <h4 class=" font-extrabold text-l">Tasks</h4>
            
            <li>
                <a href="/upcoming" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white transition-all hover:bg-teal-300 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-400 dark:text-white  group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.153 19 21 12l-4.847-7H3l4.848 7L3 19h13.153Z"/>
                    </svg>  
                    <span class="flex-1 ml-3 whitespace-nowrap">Upcoming</span>
                    <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-white">
                        {{ $childUpcoming }}
                    </span>
                </a>
           </li>
           <li>
                <a href="/home" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white transition-all hover:bg-teal-300 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-400 dark:text-white  group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"/>
                    </svg>  
                    <span class="flex-1 ml-3 whitespace-nowrap">Today</span>
                    <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-white">
                        {{ $childToday }} 
                    </span>
                </a>
           </li>
           <li>
               <a href="/done" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white transition-all hover:bg-teal-300 dark:hover:bg-gray-700 group">
                   {{-- <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg> --}}
                   <svg class="w-6 h-6 text-gray-400 dark:text-white group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                  </svg>                  
                   <span class="flex-1 ml-3 whitespace-nowrap">Done Task</span>
                   <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-white">
                    {{ $childDone }}   
                   </span>
               </a>
           </li>
           {{-- <li>
               <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-authentication" data-collapse-toggle="dropdown-authentication">
                   <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-400 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                   <span class="flex-1 ml-3 text-left whitespace-nowrap">Authentication</span>
                   <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
               </button>
               <ul id="dropdown-authentication" class="hidden py-2 space-y-2">
                   <li>
                       <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700">Sign In</a>
                   </li>
                   <li>
                       <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700">Sign Up</a>
                   </li>
                   <li>
                       <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group dark:text-white dark:hover:bg-gray-700">Forgot Password</a>
                   </li>
               </u
           </li> --}}
       </ul>
       <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
            <h4 class=" font-extrabold text-l">Kategori</h4>
           <li>
                <a href="/Personal" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white transition-all hover:bg-teal-300 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-400 dark:text-white  group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.153 19 21 12l-4.847-7H3l4.848 7L3 19h13.153Z"/>
                    </svg>  
                    <span class="flex-1 ml-3 whitespace-nowrap text-sm">Personal</span>
                    <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-white">
                      {{ $childPersonal }}      
                    </span>
                </a>
           </li>
           <li>
                <a href="/Kerjaan" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white transition-all hover:bg-teal-300 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-400 dark:text-white  group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.153 19 21 12l-4.847-7H3l4.848 7L3 19h13.153Z"/>
                    </svg>  
                    <span class="flex-1 ml-3 whitespace-nowrap text-sm">Kerjaan</span>
                    <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-white">
                      {{ $childKerjaan }}      
                    </span>
                </a>
           </li>
           <li>
                <a href="/Liburan" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white transition-all hover:bg-teal-300 dark:hover:bg-gray-700 group">
                    <svg class="w-6 h-6 text-gray-400 dark:text-white group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 8H4m8 3.5v5M9.5 14h5M4 6v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z"/>
                    </svg>  
                    <span class="flex-1 ml-3 whitespace-nowrap text-sm">Liburan</span>
                    <span class="inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded text-primary-800 bg-primary-100 dark:bg-primary-200 dark:text-primary-800 group-hover:bg-white">
                      {{ $childLiburan }}      
                    </span>
                </a>
           </li>
    </ul>
   </div>
 </aside>
