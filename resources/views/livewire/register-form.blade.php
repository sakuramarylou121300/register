<div class="mt-10 p-5 mx-auto sm:max-w-sm shadow border-teal-500 border-t-2">

    <div class="flex">
        <h2 class="text-center font-semibold text-2x text-gray-800 mb-5">Create New Account</h2>
    </div>

    <!-- IF SUCCESS CREATE THEN FLASH A MESSAGE FROM BACKEND -->
    @if (session('success'))
        <span class="text-green-500">{{session('success')}}</span>
    @endif

    <!-- CREATE FROM BACKEND CREATE FUNCTION -->
    <form wire:submit="create">
        <label class="mt-3 block text-sm font-medium leading-6  text-gray-900">Name</label>
        <input wire:model='name' type="text" id="name" placeholder="name.."
        class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-4  py-2">
        @error('name')
        <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

        <label class="mt-3 block text-sm font-medium leading-6  text-gray-900">Email</label>
        <input wire:model='email' type="email" id="name" placeholder="email.."
        class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-4  py-2">
        @error('email')
        <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

        <label class="mt-3 block text-sm font-medium leading-6  text-gray-900">Password</label>
        <input wire:model='password' type="password" id="password" placeholder="password.."
        class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-4  py-2">
        @error('password')
        <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

        <label class="mt-3 block text-sm font-medium leading-6  text-gray-900">Profile Picture</label>
        <input wire:model="image" type="file" accept="image/png, image/jpeg" id="image" 
        class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full px-4  py-2">
        @error('image')
        <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror

        <!-- TO DISPLAY IMAGE -->
        @if($image)
            <img src="{{$image->temporaryUrl()}}" alt=""
            class="rounded w-20 h-20 mt-5 block">
        @endif

        <!-- LOAD THIS WHEN WIRE IS LOADING OR WHEN THE UPLOAD IS LOADING -->
        <div wire:loading wire:target="image">
            <span class="text-green-500">Uploading ...</span>
        </div>

        <!-- THIS IS FOR THE LOADING -->
        <div wire:loading.delay.longest> 
            <span class="text-green-500">Sending ...</span>
        </div>

        <button wire.click.prevent="ReloadList"class="block mt-3 px-4  py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600" >
            Reload List
        </button>

        <button 
            wire:loading.attr="disabled" 
            wire:loading.class.remove="bg-blue-500"
            type="submit"
        class="block mt-3 px-4  py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Create</button>
    </form>
</div>
