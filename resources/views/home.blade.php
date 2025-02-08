<x-layout>
    <x-slot:today>
        {{ $today }}
    </x-slot:today>
    <x-slot:upcoming>
        {{ $upcoming }}
    </x-slot:upcoming>
    <x-slot:done>
        {{ $done }}
    </x-slot:done>
    <x-slot:Personal>
        {{ $Personal }}
    </x-slot:Personal>
    <x-slot:Kerjaan>
        {{ $Kerjaan }}
    </x-slot:Kerjaan>
    <x-slot:Liburan>
        {{ $Liburan }}
    </x-slot:Liburan>
    
    @php
        $redirect;
        $is_add = request()->query('add') == "1" ?? false;

        if (request()->is('upcoming')) {
            $redirect = "upcoming";
        }elseif (request()->is('done')) {
            $redirect = "done";
        }elseif (request()->is('Personal')) {
            $redirect = "Personal";
        }elseif (request()->is('Personal')) {
            $redirect = "Kerjaan";
        }elseif (request()->is('Liburan')) {
            $redirect = "Liburan";
        }else {
            $redirect = "home";
        }
    @endphp
    
    <div class="flex gap-2 h-svh">
        <div class="bg-white overflow-y-scroll rounded-lg py-2 px-5 w-full">
            <form action="{{ route('todos-action', ['redirect' => $redirect]) }}" method="POST">
                @csrf
                <div class="flex justify-between mb-5">
                    <h3 class=" text-3xl font-bold flex items-center p-2">{{ $Header }} Task</h3>
                    <div class="flex gap-2">
                        <button type="submit" name="action" value="checklist" class="btn btn-success">
                            <svg class="w-6 h-6 text-gray-800 hover:text-emerald-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z"/>
                            </svg>
                        </button>
                        <button type="submit" name="action" value="delete" class="btn btn-success">
                            <svg class="w-6 h-6 text-gray-800 hover:text-red-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="">
                    <a href="/{{ $redirect }}?add=1">
                        <div class="flex items-center p-2 bg-cyan-100 font-semibold transition-all hover:bg-cyan-400 rounded-lg">
                            <svg class="w-6 h-6 mr-2 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            Add To-Do List
                        </div>
                    </a>
                      
                    
                    @if ($todosList)
                        @forelse ($todosList as $todo )
                            <div>
                                <hr>
                            </div>
                            <div class="flex items-center transition-all justify-between gap-4 p-2 group hover:bg-slate-100 rounded-lg">
                                <div class="flex items-center gap-4">
                                    <div class="flex">
                                        <input name="todo-ids[]" value="{{ $todo->id }}" type="checkbox" class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" id="hs-default-checkbox">
                                    </div>
                                    <p class=" font-semibold text-base text-stone-900">{{ $todo->judul }} </p>  
                                </div>
                                <div>

                                    {{-- <button id="getdetail" class="flex rounded p-1 hover:bg-teal-300" wire:key="loadTodoDetails({{ $todo->id }})"> --}}
                                        <a href="/{{ $redirect }}?detail={{ $todo->id }}" class="flex transition-all rounded p-1 hover:bg-teal-300 items-center text-sm font-semibold">
                                            <div>
                                                Lihat Detail
                                            </div>
                                            <svg class="w-6 h-6 text-gray-600 group-hover:text-emerald-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                            </svg>
                                        </a>
                                        
                                    {{-- </button> --}}

                                </div>
                            </div>
                                
                        @empty
                            <h2>Belum ada Tugas untuk hari ini !</h2>
                        @endforelse
                    @endif
                    
                </div>
            </form>
        </div>
        <div class="bg-white rounded-lg p-5 w-1/2">
            <h4 class="font-bold text-xl mb-3">Task Detail:</h4>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
                <div class="w-full">
                    @if ($is_add)
                    <form class="flex items-center" action="{{ route('store', ['redirect' => $redirect]) }}" method="POST">
                        @csrf
                        <div class="relative w-full ">
                            <input type="hidden" name="id" value="" id="simple-search" class="mb-2 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul..." required="">
                            <input type="hidden" name="is_done" value="" id="simple-search" class="mb-2 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul..." required="">
                            <input type="text" name="judul" value="" id="simple-search" class="mb-2 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul..." required="">
                            <textarea name="deskripsi" value="" placeholder="Deskripsi.." class="mb-2 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="" cols="30" rows="10"></textarea>            
                            <div class="flex justify-between">
                                <span >Kategori:</span>
                                <input name="kategori" type="text" value="" id="simple-search" class="mb-2 block w-3/5 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                            <div class="flex justify-between">
                                <span >Tanggal:</span>
                                <input name="due_date" type="date" value="" id="simple-search" class="mb-2 inline-block w-3/5 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                
                            </div>
                            <div class="flex justify-between">
                                <span >Jam:</span>
                                <input type="time" name="jam" value="" id="simple-search" class="mb-2 inline-block w-3/5 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                
                            </div>
                            <div class="w-full bottom-0">
                                <div class="flex gap-3 justify-end">
                                    <button type="submit" id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-bold text-gray-800  bg-sky-500 border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-sky-700 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                        Simpan
                                    </button>
                                    {{-- <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-bold text-gray-800  bg-sky-100 border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-sky-400 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                        Hapus Tugas
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    @elseif ($Detail)
                    <form class="flex items-center" action="{{ route('simpan', ['redirect' => $redirect]) }}" method="POST">
                        @csrf
                        @php
                            $detail = $todosList->where('id', $Detail)->first(); 
                        @endphp
                        <div class="relative w-full ">
                            <input type="hidden" name="id" value="{{ $detail->id }}" id="simple-search" class="mb-2 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul..." required="">
                            <input type="hidden" name="is_done" value="{{ $detail->is_done }}" id="simple-search" class="mb-2 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul..." required="">
                            <input type="text" name="judul" value="{{ $detail->judul }}" id="simple-search" class="mb-2 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Judul..." required="">
                            <textarea name="deskripsi" value="{{ $detail->deskripsi }}" placeholder="Deskripsi.." class="mb-2 block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" id="" cols="30" rows="10">{{ $detail->deskripsi }}</textarea>            
                            <div class="flex justify-between">
                                <span >Kategori:</span>
                                <input name="kategori" type="text" value="{{ $detail->kategori }}" id="simple-search" class="mb-2 block w-3/5 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                            <div class="flex justify-between">
                                <span >Tanggal:</span>
                                <input name="due_date" type="date" value="{{ $detail->due_date }}" id="simple-search" class="mb-2 inline-block w-3/5 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                
                            </div>
                            <div class="flex justify-between">
                                <span >Jam:</span>
                                <input type="time" name="jam" value="{{ $detail->jam }}" id="simple-search" class="mb-2 inline-block w-3/5 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                
                            </div>
                            <div class="w-full bottom-0">
                                <div class="flex gap-3 justify-end">
                                    <button type="submit" id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-bold text-gray-800  bg-sky-500 border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-sky-700 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                        Simpan
                                    </button>
                                    {{-- <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="flex items-center justify-center w-full px-4 py-2 text-sm font-bold text-gray-800  bg-sky-100 border border-gray-200 rounded-lg md:w-auto focus:outline-none hover:bg-sky-400 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                        Hapus Tugas
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                        <div class="w-full h-28 rounded-lg bg-green-300 p-2">
                            <h2 class="text-center">Pilih todo list yang anda inginkan</h2>
                        </div>
                    @endif

                    {{-- @livewire('todo-details') --}}

                </div>

            
        </div>
    </div>
</x-layout>