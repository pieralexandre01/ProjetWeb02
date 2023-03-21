<x-public.layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="css_file">public/packages</x-slot>

    <x-public.header :page="$page" />

    <main>

        @foreach ($packages as $package)
            <h2>{{ $package->title }}</h2>
            <form action="{{ route('package-addtocart', $package->id) }}" method="post">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <select name="package_quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <input type="submit" value="add to cart">
            </form>
        @endforeach

    </main>

    <x-public.footer />

</x-public.layout>
