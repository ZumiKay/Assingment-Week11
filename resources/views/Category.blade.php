@extends('layout.app')
@section('content')
<header class="masthead" style="(background-image: url('dist/assets/img/post-bg.jpg')">

    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    @if(Auth::user())
                        <h1>{{Auth::user()->full_name}}'s Category</h1>
                    @endif
                    @if(Auth::user()->role == 'Admin')
                    <div id="overlay">
                        <form id="text" action="{{route("createCategory")}}" method="POST">
                            @csrf
                            <label>Name</label>
                            <input type="text" name="name" required/>
                            <label>Content</label>
                            <input type="text" name="content" required/>
                            <button type="submit">Add Category</button>
                            <a onclick="off()">Cancel</a>
                        </form>
                    </div>
                    <div style="padding: 20px">
                        <button onclick="on()">Add New Category</button>
                    </div>
                        @endif

                </div>
            </div>
        </div>
    </div>
</header>
<div class="table-container">
    <table>

        <th>ID</th>
        <th>Category</th>
        <th>Content</th>
        <th style="border: 0px"></th>
        <th style="border: 0px"></th>
        <th style="border: 0px"></th>

        @foreach($category as $i )
            <div id="overlay1">
                <form style="margin-top: 400px;" action="/editcategory/{{$i->id}}" method="POST">
                    @csrf
                    <label>Title</label>
                    <input value="{{$i->name}}"  name="name" type="text"/>
                    <label>Description</label>
                    <input value="{{$i->content}}"  name="content" type="text"/>
                    <button type="submit">Edit Category</button>
                    <button onclick="off1()" type='button'> Cancel </button>
                </form>
            </div>

            <tr>

                <td>{{$i->id}}</td>
                <td>{{$i->name}}</td>
                <td>{{$i->content}}</td>

                @if(Auth::user()->role == 'Admin')
                    <td> <button onclick="on1()">Edit</button> </td>
                    <td> <button> <a href="deletecategory/{{$i->id}}"> Delete </a> </button> </td>

                @endif

            </tr>
        @endforeach
    </table>

</div>


@endsection
