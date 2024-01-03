<div class="mt-24 p-5 mx-auto w-4/5 rounded-3xl shadow  border-t-2">
    <h1 class="font-semibold text-3xl">Users List</h1>
    <div class="mt-3">
        <!-- render all users -->
        @foreach($registers as $register)
            <h3>{{$register->name}}</h3>
            
        @endforeach
        </div>
   

    <!-- pagination -->
    {{$registers->links()}}

</div>
