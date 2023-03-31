<x-admin.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">forms</x-slot>

    <x-admin.header />

    <main>

        <div class="page_title mb-4">
            <h1 class="text-end">EDIT: ARTICLE</h1>

            <div class="title_decoration">
                <div class="circle"></div>
            </div>
        </div>

        <span><a class="general_button ms-5" href="{{ route('admin-dashboard') }}">go back</a></span>

        <div class="admin_create_container mx-auto mt-4">
            <div id="account_create" class="form-container border_box py-4">

                <h3 class="text-center mt-sm-3">EDIT AN ARTICLE</h3>

                <form action="{{ route('article-update', $article->id) }}" method="post" enctype="multipart/form-data"
                    class="d-flex flex-column align-items-start gap-2 gap-md-0 w-100 mt-3 mt-sm-4">
                    @csrf

                    <input name="user_id" type="hidden" value="{{ $article->user_id }}">

                    <div class="d-flex flex-column flex-md-row align-items-start gap-2 gap-md-5 mb-md-3 mb-lg-4 w-100">
                        <div class="d-flex flex-column w-100">
                            <label for="title" class="mb-1">TITLE</label>
                            <input name="title" type="text" value="{{ $article->title }}">
                            <x-msg-error field="title" />
                        </div>
                        <div class="d-flex flex-column w-100">
                            <label for="category" class="mb-1">CATEGORY</label>
                            <select name="category" class="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="d-flex flex-column mb-md-3 mb-lg-4 w-100">
                        <label for="description" class="mb-1">DESCRIPTION</label>
                        <textarea name="text" cols="30" rows="10">{{ $article->text }}</textarea>
                        <x-msg-error field="description" />
                    </div>

                    <input type="submit" class="align-self-center mt-3 mt-md-0">
                </form>
            </div>
        </div>

    </main>

    <x-footer />

</x-admin.layout>
