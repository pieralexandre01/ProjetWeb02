<x-admin.layout>
    {{-- <x-slot name="titre"></x-slot> --}}

    <x-admin.header />

    <main>

        <form action="{{ route('activity-update', $activity->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- garder le input hidden pour le id --}}
            <input name="activity_id" type="hidden" value="{{ $activity->id }}">
            <input name="title" type="text" value="{{ $activity->title }}">
            <textarea name="description" cols="30" rows="10">{{ $activity->description }}</textarea>
            <input type="file" name="image">
            <input type="submit">
        </form>

    </main>

    <x-footer />

</x-admin.layout>
