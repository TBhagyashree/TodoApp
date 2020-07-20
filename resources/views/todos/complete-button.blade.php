
    @if($todo->completed)
        <span onclick="event.preventDefault();
            document.getElementById('todo-incomplete-{{$todo->id}}').submit()"
              class="fas fa-check mr-3 text-green-500"></span>
        <form style="display:none" id="{{'todo-incomplete-'.$todo->id}}"
              action="{{route('todoIncomplete',$todo->id)}}" method="post">
            @csrf
            @method('delete') {{--put and patch are same--}}
        </form>
    @else
        <span onclick="event.preventDefault();
            document.getElementById('todo-complete-{{$todo->id}}').submit()"
              class="fas fa-check mr-3 text-gray-400 cursor-pointer ">
                        </span>
        <form style="display:none" id="{{'todo-complete-'.$todo->id}}"
              action="{{route('todoComplete',$todo->id)}}" method="post">
            @csrf
            @method('put') {{--put and patch are same--}}
        </form>
@endif
