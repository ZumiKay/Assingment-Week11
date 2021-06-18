@extends('layout.app')
@section('content')
    <header class="masthead" style="(background-image: url('dist/assets/img/post-bg.jpg')">

        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        @if(Auth::user())
                        <h1>{{Auth::user()->full_name}}'s Post Dashboard</h1>
                        @endif
                        <div id="overlay">

                            <form id="text" action="/create-post" method="POST">

                            @csrf
                                <label>Title</label>
                                <input type="text" name="title" required/>
                               <label>Category</label>
                                <select style="border: 1px solid black" name="category">
                                    <option value="">Select one</option>
                                    @foreach($categories as $j )
                                        <option value="{{$j->name}}">{{$j->name}}</option>
                                    @endforeach
                                </select>
                                <label>Description</label>
                                <input type="text" name="description" required/>
                                <button type="submit">Add Post</button>
                                <a onclick="off()">Cancel</a>
                            </form>
                        </div>
                        <div style="padding: 20px">
                        <button onclick="on()">Add New Post</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <div class="table-container">
        <table>

            <th>ID</th>
            <th>Category</th>
            <th>Title</th>
            <th>Description</th>
            <th>Author</th>

            <th style="border: 0px"></th>
            <th style="border: 0px"></th>

            @foreach($data as $i)
                <div id="overlay1">
                    <form style="margin-top: 400px;" action="/editpost/{{$i->id}}" method="POST">
                        @csrf
                        <label>Title</label>
                        <input value="{{$i->title}}" name="title" type="text"/>
                        <label>Description</label>
                        <input value="{{$i->description}}" name="description" type="text"/>
                        <button type="submit">Edit Post</button>
                        <button onclick="off1()" type='button'> Cancel </button>
                    </form>
                </div>

            <tr>
                <td>{{$i->id}}</td>
                <td>{{$i->category_id}}</td>
                <td>{{$i->title}}</td>
                <td>{{$i->description}}</td>
                <td>{{$i->author}} </td>
             @if(Auth::id() == $i->user_id || Auth::user()->role == 'Admin')


              <td> <button onclick="on1()">Edit</button> </td>
              <td> <button> <a href="delete/{{$i->id}}"> Delete </a> </button> </td>
                @endif
            </tr>
            @endforeach
        </table>

    </div>




@endsection
