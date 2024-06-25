@extends('components.layout')

@section('content')


     
        



<form action="{{route('note.store')}}" method="POST">
    @csrf

<div class="note-container single-note mt-5">
    {{-- here we use 'route('note.create')' to redirect to next page  --}}
    <div class="notes"> 

                <div class="note">
                    <div class="note-body"> 
                        {{-- here we but this Str::words() in order to be shorter--}}

                            <textarea style="border: none;" name="note"  class="note" cols="65" rows="5">


                            </textarea>

                            <div class="note-buttons">   
                
                                <button class="note-delete-button">Delete</button>
                                <button type="submit" class="note-submit-button">Save</button>
                            </div>
                            
                    
                    </div>
                
            

        </div>

    </div>
        


</div>
    
</form>


@endsection