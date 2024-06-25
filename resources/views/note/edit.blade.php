@extends('components.layout')

@section('content')

<div class="note-container single-note mt-5">
    <div class="notes"> 
        <div class="note">
            <form action="{{ route('note.update', $note) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="note-body"> 
                    <textarea name="note" id="note" class="note" cols="65" rows="5">{{ $note->note }}</textarea>
                </div>
                <div class="note-buttons" style="display: flex; justify-content: space-between; align-items: center;">
                    <button type="submit" class="note-submit-button">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
