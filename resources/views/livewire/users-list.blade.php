<!-- wire poll so that the table will sync even without entering the create button -->
<div wire:poll.visible.5s class="mt-24 p-5 mx-auto w-full ml-10 rounded-3xl shadow  border-t-2">
    <h1 class="font-semibold text-3xl">Users List</h1>
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
                @foreach($registers as $register)
                <tr>
                    <td class="border-b px-6 py-4">{{$register->name}}</td>
                    <td class="border-b px-6 py-4">{{$register->email}}</td>
                    <td class="border-b px-6 py-4">{{$register->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <!-- <h3>{{$register->name}}</h3> -->
        </div>
   

    <!-- pagination -->
    {{$registers->links()}}

</div>
