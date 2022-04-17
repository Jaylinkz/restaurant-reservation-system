<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class ="flex  m-2 p-2">
                <a href ="{{route('Admin.tables.index')}}"
               class="px-4 py-2   text-gray-700 bg-white  dark:text-gray-200 dark:bg-gray-800 rounded-lg">Back</a>
            </div>
            <div class="p-2 m-2 bg-slate-100 rounded" >
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form method="POST" action = "{{route('Admin.tables.store')}}">
                      @csrf
                      <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                          <input type="text" id="name" wire:model.lazy="name" name="name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                        </div>
                      </div>
                      <div class="sm:col-span-6 pt-5">
                        <label for="" class="block text-sm font-medium text-gray-700">guest number</label>
                        <div class="mt-1">
                          <input type="text" id="guest_number" wire:model.lazy="title" name="guest_number" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                        </div>
                      </div>
                      <div class="sm:col-span-6 pt-5">
                        <label for="Status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1">
                         <select  id="status" name="status" class="form-multiselect block w-full mt-1" required>
                           @foreach(App\Enums\TableStatus::cases() as $status)
                           <option value = "{{$status->value}}">{{$status->name}}</option>
                           @endforeach
                         </select>
                        </div>
                      </div>
                      <div class="sm:col-span-6 pt-5">
                        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                        <div class="mt-1">
                         <select  id="location" name="location" class="form-multiselect block w-full mt-1" required>
                           @foreach(App\Enums\TableLocation::cases() as $location)
                           <option value ="{{$location->value}}">{{$location->name}}</option>
                           @endforeach
                           
                         </select>
                        </div>
                      </div>
                      <div class="mt-6 p-4">
                      <button type ="submit" class="px-4 py-2 text-gray-700 bg-white  dark:text-gray-200 dark:bg-gray-800 rounded-lg">ADD</button>
                      </div>
                    </form>
                  </div>
            </div>
            
    </div>
    
        </div>
    </div>
</x-admin-layout>