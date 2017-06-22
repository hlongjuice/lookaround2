@foreach($categories as $category)
    @if($category->parent_id==$parent_id)
        <ul>
            <li>
                {{$category->title}}
            </li>
        </ul>
    @endif
    <li>{{$category->title}}</li>
    @include('admin.contents.categories.list_categories',['categories'=>$categories,'parent_id'=>$category->id]);
    @endforeach