@foreach($categories as $category)
    <p><b>Category Name:</b></p> {{$category->category}}<br><br>
    <p><b>Educational Content ID:</b></p> {{$category->educationalcontent_id}}<br><br>
    <a href="{{'/educationalcontentcategories/'.$category->id.'/edit'}}">Edit</a>
    <form action="{{'/educationalcontentcategories/'. $category->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <a href="{{'/educationalcontentcategories/'.$category->id}}">Delete</a>
     <hr>


@endforeach