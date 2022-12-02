<x-app-layout>
    <x-tailwind.layouts.container>
        @foreach($terms as $term)
            <x-tailwind.cards.article-card :title="$term->name">
                {{ $term->description }}
            </x-tailwind.cards.article-card>
        @endforeach
    </x-tailwind.layouts.container>
</x-app-layout>
