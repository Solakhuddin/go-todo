<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Resources\TodoResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $todos = Todo::latest()->paginate(5);

        //return collection of posts as a resource
        return new TodoResource(true, 'List Data Posts', $todos);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required',
            'content'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        //create post
        $todo = Todo::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content,
        ]);

        //return response
        return new TodoResource(true, 'Data Post Berhasil Ditambahkan!', $todo);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find post by ID
        $todo = Todo::find($id);

        //return single post as a resource
        return new TodoResource(true, 'Detail Data Post!', $todo);
    }
     /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'judul'     => 'required|string|max:255',
            'deskripsi'     => 'required|string|max:255',
        ]);

        // //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $todo = Todo::find($id);

        //check if image is not empty
        // if ($request->hasFile('image')) {

        //     //upload image
        //     // $image = $request->file('image');
        //     // $image->storeAs('public/posts', $image->hashName());

        //     //delete old image
        //     // Storage::delete('public/posts/' . basename($todo->image));

        //     //update post with new image
        //     $todo->update([
        //         'judul'     => $request->judul,
        //         'deskripsi'     => $request->deskripsi,
        //     ]);
        // } else {

        //     //update post without image
        //     $todo->update([
        //         'judul'     => $request->judul,
        //         'deskripsi'     => $request->deskripsi,
        //     ]);
        // }
        $todo->update([
            'judul'     => $request->judul,
            'deskripsi'     => $request->deskripsi,
        ]);
        
        //return response
        return new TodoResource(true, 'Data To-Do Berhasil Diubah!', $todo);
    }
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {

        //find post by ID
        $todo = Todo::find($id);

        //delete image
        // Storage::delete('public/posts/'.basename($todo->image));

        //delete post
        $todo->delete();

        //return response
        return new TodoResource(true, 'Data To-Do Berhasil Dihapus!', null);
    }
}
