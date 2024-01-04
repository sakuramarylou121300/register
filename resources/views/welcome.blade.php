<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body clas="antialiased">
        <div class='flex'>
            <div class="w-2/4">
                <!-- THE DEFAULT IN SEARCH BAR NOW WILL BE PROF, THIS IS FROM THE MOUNT -->
                <!-- @livewire('users-list', ['lazy'=> true], ['search'=>'prof']) -->
                <!-- <livewire:users-list lazy  search="prof"/> -->
            </div>
            <div class="w-2/4">
                <!-- THIS IS FROM TODO-LIST-BLADE.PHP -->
                @livewire('register-form')
            </div>
        </div>
    </body>

</html>