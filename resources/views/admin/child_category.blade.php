
<li class="list-group-item"><a href="{{route('admin.list-product', $child_category->id)}}">{{ $child_category->name }}</a></li>
@if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('admin.child_category', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif