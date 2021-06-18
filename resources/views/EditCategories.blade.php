<div class="form-container">

    <form style="margin-top: 400px; margin-left: 400px" action="/updateCategory/{{$category[0]->id}}" method="POST">
        @csrf
        <label>Name</label>
        <input name="name" style="padding:20px; border: 2px solid black;font-size: larger" value="{{$category[0]->name}}"  type="text"/>
        <label>Content</label>
        <input name="content" style="padding:20px; border: 2px solid black;font-size: larger" value="{{$category[0]->content}}"  type="text"/>
        <button  style="padding:20px; border: 2px solid black" type="submit">Edit </button>
        <button  style="padding:20px; border: 2px solid black" type="button"> <a href="/category">Cancel</a> </button>
    </form>
</div>
