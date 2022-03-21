<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                Search bar here

                <h4>SEARCH PRODUCT: </h4>
                <form action="searchpage" method="post">
                
                    <label > Name <label>
                    <input type="text" name="item_name"><br><br>
                    
                    <button type="submit">Search</button>

            </div>
        </div>
    </div>
</x-app-layout>
