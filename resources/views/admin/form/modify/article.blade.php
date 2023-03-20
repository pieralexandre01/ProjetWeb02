<x-admin.layout>
    {{-- <x-slot name="titre"></x-slot> --}}

    <x-admin.header />

    <main>

        <form action="{{ route('article-update', $article->id) }}" method="post">
            @csrf
            {{-- garder le input hidden pour le user id --}}
            <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
            <input name="title" type="text" value="{{ $article->title }}">
            <textarea name="text" cols="30" rows="10">{{ $article->text }}</textarea>
            <select name="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <input type="submit">
        </form>

    </main>

    <x-footer />

</x-admin.layout>
