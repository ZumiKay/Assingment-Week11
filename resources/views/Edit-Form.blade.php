
    <div class="form-container">

        <form style="margin-top: 400px; margin-left: 400px" action="/update-post/{{$editdata[0]->id}}" method="POST">
            @csrf
            <label>Title</label>
            <input name="title" style="padding:20px; border: 2px solid black;font-size: larger" value="{{$editdata[0]->title}}"  type="text"/>
            <label>Category</label>
            <select name="category_id">
                @foreach($categories as $i)
                <option value="{{$i->name}}">{{$i->name}}</option>
                @endforeach
            </select>
            <label>Description</label>
            <input  style="padding:20px; border: 2px solid black;font-size: larger" value="{{$editdata[0]->description}}"  name="description" type="text"/>
            <button  style="padding:20px; border: 2px solid black" type="submit">Edit </button>
            <button  style="padding:20px; border: 2px solid black" type="button"> <a href="/post">Cancel</a> </button>
        </form>
    </div>

