


@foreach($contents as $content)


<p><b>Title: </b></p>    {{$content->title }}<br><br>

<p><b>Educational Content: </b></p>    {{$content->content}}<br><br>

<p><b>Educational Category: </b></p>   {{$content->category }}<br><br>

    <a href="{{'/educationalcontent/'.$content->id.'/edit'}}">Edit</a>
<form action="{{'/educationalcontent/'. $content->id}}" method="post">
    {{csrf_field()}}
    {{method_field('DELETE')}}
<a href="{{'/educationalcontent/'.$content->id}}">Delete</a>
</form>
    <hr>

@endforeach







