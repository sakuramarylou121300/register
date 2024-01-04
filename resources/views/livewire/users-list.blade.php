<!-- wire poll so that the table will sync even without entering the create button -->
<div wire:poll.visible.5s class="mt-24 p-5 mx-auto w-full ml-10 rounded-3xl shadow  border-t-2">
    <div class="flex justify-between">
        <div>
            
            <h1 class="font-semibold text-3xl">Users List</h1>  
        </div>
        <div class="flex">
            <div>
                <button wire:click="update" type="button" class="block mt-3 px-4  py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600 mr-3" >
                    Search
                </button>
            </div>
            <div>
                <!-- .live means to search while user types -->
                <input wire:model.live.throttle.200ms='search' type="text" placeholder="Search..."
                    class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full mt-3 px-4  py-2.5">
            </div>
            
        </div>
      
    </div>

    <div class="mt-3">
        <!-- render all users -->
        <table class="w-full whitespace-nowrap">
            <thead>
                <tr class="text-left font-bold">
                <th class="border-b px-6 py-4">NAME</th>
                <th class="border-b px-6 py-4">EMAIL</th>
                <th class="border-b px-6 py-4">JOINED</th>
                </tr>
            </thead>

            <!-- THESE ARE THE DATA -->
            <tbody>
                @foreach($this->registers as $register)
                <tr>
                    <td class="border-b px-6 py-4">{{$register->name}}</td>
                    <td class="border-b px-6 py-4">{{$register->email}}</td>
                    <td class="border-b px-6 py-4">{{$register->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   

    <!-- pagination -->
    {{$registers->links()}}

</div>
