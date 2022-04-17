<x-admin-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class ="flex  m-2 p-2">
              <a href ="{{route('Admin.reservations.index')}}"
             class="px-4 py-2   text-gray-700 bg-white  dark:text-gray-200 dark:bg-gray-800 rounded-lg">Back</a>
          </div>
          <div class="p-2 m-2 bg-slate-100 rounded" >
              <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                  <form method="POST" action = "{{route('Admin.reservations.store')}}">
                    @csrf
                    <div class="sm:col-span-6">
                      <label for="title" class="block text-sm font-medium text-gray-700"> first name </label>
                      <div class="mt-1">
                        <input type="text" id="first_name" wire:model.lazy="name" name="first_name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                      </div>
                    </div>
                    <div class="sm:col-span-6">
                      <label for="title" class="block text-sm font-medium text-gray-700"> last name </label>
                      <div class="mt-1">
                        <input type="text" id="last_name" wire:model.lazy="name" name="last_name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                      </div>
                    </div>
                    <div class="sm:col-span-6">
                      <label for="title" class="block text-sm font-medium text-gray-700"> email </label>
                      <div class="mt-1">
                        <input type="email" id="email" wire:model.lazy="name" name="email" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                      </div>
                    </div>
                    <div class="sm:col-span-6">
                      <label for="tel_number" class="block text-sm font-medium text-gray-700"> Telephone Number</label>
                      <div class="mt-1">
                        <input type="text" id="tel_number" wire:model.lazy="name" name="tel_number" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                      </div>
                      <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700"> Reservation date </label>
                        <div class="mt-1">
                          <input type="datetime-local" id="res_date" wire:model.lazy="name" name="res_date" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                        </div>
                      </div>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                      <label for="" class="block text-sm font-medium text-gray-700">guest number</label>
                      <div class="mt-1">
                        <input type="number" id="guest_number" wire:model.lazy="title" name="guest_number" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                      </div>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                      <label for="categories" class="block text-sm font-medium text-gray-700">Table</label>
                      <div class="mt-1">
                       <select  id="table_id" name="table_id" class="form-multiselect block w-full mt-1"  required>
                         @foreach($tables as $table)
                         <option value ="{{$table->id}}">{{$table->name}} ({{$table->guest_number}} Guests)</option>
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