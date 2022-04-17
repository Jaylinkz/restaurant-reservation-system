<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class ="flex justify-end m-2 p-2">
                <a href ="{{route('Admin.reservations.create')}}"
               class="px-4 py-2   text-gray-700 bg-white  dark:text-gray-200 dark:bg-gray-800 rounded-lg">New Table</a>
            </div>
           
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
    <th scope="col" class="px-6 py-3">
    Name
    </th>
    <th scope="col" class="px-6 py-3">
    Email
    </th>
    <th scope="col" class="px-6 py-3">
    TEl Number
    </th>
    <th scope="col" class="px-6 py-3">
    Reservation date
    </th>
    <th scope="col" class="px-6 py-3">
       Table name
        </th>

    <th scope="col" class="px-6 py-3">
     Guest Number
    </th>
    <th scope="col" class="px-6 py-3">
     Action
    </th>
    
    </tr>
    </thead>
    <tbody>
    @foreach($reservations as $reservation)
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="px-6 py-4">
   {{$reservation->first_name}} {{$reservation->last_name}}
    </td>
    <td class="px-6 py-4">
    {{$reservation->email}}
    </td>
    <td class="px-6 py-4">
    {{$reservation->tel_number}}
    </td>
    <td class="px-6 py-4">
    {{$reservation->res_date}}
    </td>
    <td class="px-6 py-4">
    {{$reservation->Table->name}}
    </td>

    <td class="px-6 py-4">
    {{$reservation->guest_number}}
    </td>

    <td class="px-6 py-4 text-right">
        <div class="flex space-x-2">
    <a href="{{route("Admin.reservations.edit",$reservation->id)}}"  class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Edit</a>
    <form method="POST" action="{{ route('Admin.reservations.destroy',$reservation->id) }}" accept-charset="UTF-8"  class=" px-2 py-4 bg-red-500 hover:bg-red-700 rounded-lg text-white">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit" onclick="return confirm(&quot;Confirm delete?&quot;)"> Delete</button>
    </form>
        </div>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
    </div>
    
        </div>
    </div>
</x-admin-layout>