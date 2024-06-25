@extends('components.layout')

@section('content')

<div class="note-container single-note">
    {{-- here we use 'route('note.create')' to redirect to next page  --}}
    <a href="{{ route('note.create') }}" class="new-note-btn"> 
        New Note 
    </a>

    <div class="notes"> 
        <div class="note">
            <div class="note-body"> 
                {{-- Here we use Str::words() in order to be shorter --}}
                {{ $note->note }}
                <div class="note-buttons" style="display: flex; gap: 10px; align-items: center; margin-top: 10px;">
                    <a href="{{ route('note.edit', $note) }}" class="note-edit-button" style="text-decoration: none; padding: 8px 12px; background-color: #4CAF50; color: white; border-radius: 4px;">Edit</a>
                    <form action="{{ route('note.destroy', $note) }}" method="POST" onsubmit="return ConfirmationMessage();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="note-delete-button" style="padding: 8px 12px; background-color: #f44336; color: white; border: none; border-radius: 4px;">Delete</button>
                    </form>
                </div>
                <div class="note-date" style="margin-top: 10px;">
                    {{ $note->created_at }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ConfirmationMessage(){
        return confirm("Do you really want to delete this note?");
    }
</script>

@endsection
