@extends('layouts.layout')
@foreach($categories as $category)
    <p><b>Category Name:</b></p> {{$category->category}}<br><br>
    <p><b>Educational Content ID:</b></p> {{$category->educationalcontent_id}}<br><br>
    <a href="{{'/educationalcontentcategories/'.$category->id.'/edit'}}"><button  class="btn btn-primary">Edit</button></a><br>
    <form action="{{'/educationalcontentcategories/'. $category->id}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <br><a href="{{'/educationalcontentcategories/'.$category->id}}"><button class="btn btn-primary">Delete</button></a>
     <hr>

    </form>
@endforeach