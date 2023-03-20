<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">admin/forms</x-slot>

    <x-admin.header />

    <main>

        <form action="{{ route('article-update', $article->id) }}" method="post">
            @csrf
            {{-- garder le input hidden pour le user id QUI A ÉCRIT L'ARTICLE ET NON CONNCETÉ --}}
            <input name="user_id" type="hidden" value="{{ $article->user_id }}">

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
