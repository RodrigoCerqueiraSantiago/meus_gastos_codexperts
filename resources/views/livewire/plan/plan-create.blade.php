<div class="max-w-7xl mx-auto py-15 px-4 mt-5">

    <x-slot name="header">Criar Plano</x-slot>

    @include('includes.message')

    <form action="" wire:submit.prevent="createPlan" class="w-full max-w-7xl mx-auto">
        <div class="flex flex-wrap -mx-3 mb-4">

            <!-- <p class="w-full px-3 mb-4 md:mb-0"> em tela média margin bottn está 6 (tailwind) não precisa, fica pra estudo futuro -->
            <p class="w-full px-3 mb-1">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Nome Plano</label>
                <input type="text" name="name" wire:model="plan.name"
                       class="block appearance-none w-full bg-gray-200 border @error('plan.name') border-red-500 @else border-gray-200 @enderror
                           text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                @error('plan.name')
                    <h5 class="text-red-500 text-xs italic">{{$message}}</h5>
                @enderror
            </p>

            <p class="w-full px-3 mb-1 mt-4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Descrição Plano</label>
                <input type="text" name="description" wire:model="plan.description"
                       class="block appearance-none w-full bg-gray-200 border @error('plan.description') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                @error('plan.description')
                    <h5 class="text-red-500 text-xs italic">{{$message}}</h5>
                @enderror
            </p>


            <p class="w-full px-3 mb-1 mt-4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Valor do Plano</label>
                <input type="text" name="price" wire:model="plan.price"
                       class="block appearance-none w-full bg-gray-200 border @error('plan.price') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">


                @error('plan.price')
                    <h5 class="text-red-500 text-xs italic">{{$message}}</h5>
                @enderror

            </p>

            <p class="w-full px-3 mb-1 mt-4">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Apelido Plano</label>

                <input type="text" name="slug" wire:model="plan.slug"
                       class="block appearance-none w-full bg-gray-200 @error('plan.slug') border-red-500 @else border-gray-200 @enderror  text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">

                @error('plan.slug')
                    <h5 class="text-red-500 text-xs italic">{{$message}}</h5>
                @enderror
            </p>

        </div>
        <div class="w-full py-4 px-3 mb-4">

            <button type="submit"
                    class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
                    Criar Plano
            </button>
        </div>

    </form>
</div>
