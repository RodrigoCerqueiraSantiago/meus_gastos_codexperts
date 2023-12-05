<div class="max-w-7xl mx-auto py-15 px-4 mt-10">
    <x-slot name="header">
        Atualizar Registro
    </x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="updateExpense" class="w-full max-w-7xl mx-auto">

        <div class="flex flex-wrap -mx-3 mb-6">

            <p class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Descrição Registro</label>
                <input type="text" name="description" wire:model="description"
                       class="block appearance-none w-full bg-gray-200 border @error('description') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('description')
            <h5 class="text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>


            <p class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Valor do Registro</label>
                <input type="text" name="amount" wire:model="amount"
                       class="block appearance-none w-full bg-gray-200 border @error('amount') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

            @error('amount')
            <h5 class="text-red-500 text-xs italic">{{$message}}</h5>
            @enderror

            </p>


            <p class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Tipo do Registro</label>
                <select name="type" id="" wire:model="type" class="block appearance-none w-full bg-gray-200 border @error('type') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="">Selecione o tipo do registro: Entrada ou Saída...</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>

            @error('type')
            <h5 class="text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>


            <!-- Imagem -->
            <p class="w-full px-3 mb-6 md:mb-0 mt-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Foto Comprovante</label>
                <input type="file" name="photo" wire:model="photo"
                       class="block appearance-none w-full bg-gray-200 border @error('photo') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">



                @if($expense->photo)
                <figure class="sm:max-w-sm ">
                    <img class="h-auto mt-3 ml-3 max-w-full rounded-lg" src="{{route('expenses.photo', $expense->id)}}" alt="image description">
                    <figcaption class="mt-2 text-sm text-center text-gray-500 dark:text-gray-400">{{$expense->description}}</figcaption>
                </figure>
                @endif


            @error('photo')
            <h5 class="text-red-500 text-xs italic">{{$message}}</h5>
            @enderror
            </p>

        </div>
        <div class="w-full py-4 px-3 mb-6 md:mb-0">

            <button type="submit"
                    class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">Atualizar Registro</button>



            <button class="bg-red-500 text-white px-4 py-2">Click me</button>
        </div>
    </form>
</div>
