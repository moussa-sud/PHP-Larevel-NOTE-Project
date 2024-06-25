@extends('components.layout')

@section('content')

{{-- in here we display the message of "success" the indication from the controller --}}
@if ($message= Session::get('success'))

<div class="success-message" role="alert">
    {{$message}}
</div>
    
@endif
    

    <div class="note-container py-12">
        {{-- here we use 'route('note.create')' to redirect to next page  --}}
        <a href="{{route('note.create')}}" class="new-note-btn"> 
            New Note 
        </a>

        <div class="notes"> 

            @foreach ($notes as $note)
                    <div class="note">
                        <div class="note-body"> 
                            {{-- here we but this Str::words() in order to be shorter--}}
                            {{Str::words($note->note, 30)}}

                            
                        </div>
                    
                        <div class="note-date">

                            {{ $note -> created_at }}

                        </div>
                <div class="note-buttons">
                    <a href="{{route('note.show', $note)}}" class="note-edit-button">View</a>    
                    <a href="{{route('note.edit', $note) }}" class="note-edit-button">Edit</a>  

                    <form action="{{ route('note.destroy', $note) }}" method="POST" onsubmit="return ConfirmationMessage();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="note-delete-button">Delete</button>
                    </form>
                    <script>
                        function ConfirmationMessage(){
                            return confirm("Do you want really delete this note !"); 
                        }
                    </script>
                    
                </div>
            </div>
            
                @endforeach
        </div>
            
<script>
    function ConfirmationMessage(){
        return confirm("Do you want really delete this note !"); 
    }
</script>

    </div>
@endsection