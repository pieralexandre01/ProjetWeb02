<x-admin.layout>
    {{-- <x-slot name="title"></x-slot> --}}
    <x-admin.header />

    <form action="{{ route('article-store') }}" method="post">
        @csrf
        {{-- garder le input hidden pour le user id --}}
        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
        <input name="title" type="text">
        <textarea name="text" cols="30" rows="10"></textarea>

        <select name="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>

</x-admin.layout>
