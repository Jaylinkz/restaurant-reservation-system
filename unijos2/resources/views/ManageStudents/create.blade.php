<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2 m-2 bg-slate-100 rounded" >
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                    <form Method="POST" action="{{route("students.store")}}" enctype="multipart/form-data">
                        @csrf
                      <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Name </label>
                        <div class="mt-1">
                          <input type="text" id="name"  name="name" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                        </div>
                      </div>
                      <div class="sm:col-span-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email address </label>
                        <div class="mt-1">
                          <input type="email" id="email"  name="email" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                        </div>
                      </div>
                      <div class="sm:col-span-6">
                        
                        <div class="mt-1">
                          
                        </div>
                      </div>
                      <div class="sm:col-span-6">
                        <label for="matric_no" class="block text-sm font-medium text-gray-700">Matric Number</label>
                        <div class="mt-1">
                          <input type="text" id="Matric_no"  name="matric_no" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
                        </div>
                      
                      </div>
                      <div class="sm:col-span-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Set password </label>
                        <div class="mt-1">
                          <input type="text" id="password"  name="password" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" required/>
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
</x-app-layout>