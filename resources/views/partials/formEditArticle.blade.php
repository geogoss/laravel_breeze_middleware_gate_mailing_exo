<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="max-w-4xl p-6 mt-5 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
                        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Account settings</h2>
                    
                        <form action="/article/{{$article->id}} " method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="username">Titre de l'article</label>
                                    <input id="username" name="titre" value="{{$article->titre}} " type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
                                </div>
                                <div>
                                    <label class="text-gray-700 dark:text-gray-200" for="text">Contenu de l'article</label>
                                    <textarea name="texte" id="text" cols="30" rows="10" type="text" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">{{$article->texte}} </textarea>
                                </div>
                            </div>
                    
                            <div class="flex justify-end mt-6">
                                <button type="submit" class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Ajouter</button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>








