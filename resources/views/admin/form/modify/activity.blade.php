<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">admin/forms</x-slot>

    <x-admin.header />

    <main>

        <form action="{{ route('activity-update', $activity->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input name="title" type="text" value="{{ $activity->title }}">
            <x-msg-error field="title" />

            <textarea name="description" cols="30" rows="10">{{ $activity->description }}</textarea>
            <x-msg-error field="description" />

            <input type="datetime-local" name="date" value="{{ $activity->date }}">
            <x-msg-error field="date" />

            <input type="file" name="image">
            <x-msg-error field="image" />

            <input type="submit">
        </form>

    </main>

    <x-footer />

</x-admin.layout>
