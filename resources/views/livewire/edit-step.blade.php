<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="p-2">
        <h2 class="pb-2 text-bold px-2"> Add steps to your todo
            <span wire:click="increment" class="fas fa-plus px-2"></span></h2>

        @foreach($steps as $step)
            <div class="flex justify-center py-2"
                 wire:key="{{$loop->index}}">
                <input name="stepName[]" class=" font-bold py-1 px-0 border
                rounded"
                       placeholder="{{'Describe step '.($loop->index+1)}}"
                       value="{{$step['name']}}"/>
                <input  type="hidden" name="stepId[]"
                       value="{{$step['id']}}"/>
                <span class="fas fa-times text-red-500 px-3 py-2 "
                      wire:click="decrement({{$loop->index}})"></span>
            </div>
        @endforeach
    </div>
</div>
