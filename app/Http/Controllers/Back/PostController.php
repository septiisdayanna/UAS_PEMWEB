<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            // Cek jika user yang login adalah admin (role_id == 1)
            if (auth()->user()->role_id == 1) {
                $post = Post::with('User')->latest()->get();
            } else {
                // Jika bukan admin, tampilkan hanya post dari user yang login
                $post = Post::with('User')->where('user_id', auth()->user()->id)->latest()->get();
            }

            return DataTables::of($post)
                // custom columns
                ->addIndexColumn() //untuk id
                ->addColumn('user_id', function ($post) {
                    return $post->User->name;
                })
                ->addColumn('active', function ($post) {
                    if ($post->active == "no") {
                        return '<span class="badge bg-danger">No</span>';
                    } else {
                        return '<span class="badge bg-success">Yes</span>';
                    }
                })
                ->addColumn('status', function ($post) {
                    if ($post->status == "draft") {
                        return '<span class="badge bg-danger">Draft</span>';
                    } else {
                        return '<span class="badge bg-success">Publish</span>';
                    }
                })
                ->addColumn('button', function ($post) {
                    return '<div class="text-center">
                                <a href="post/'.$post->id.'" class="btn btn-secondary">Detail</a>
                                <a href="post/'.$post->id.'/edit" class="btn btn-primary">Edit</a>
                                <a href="#" onclick="deletePost(this)" data-id="'.$post->id.'" class="btn btn-danger">Delete</a>
                            </div>';
                })
                // panggil custom columns
                ->rawColumns(['user_id', 'active', 'status', 'button'])
                ->make();
        }
        return view('back.post.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.post.create', [
            'categories' => Category::where('active', 'yes')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        // Simpan file gambar
        if ($request->hasFile('image')) {
            $fileName = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/back', $fileName);
            $data['image'] = $fileName;
        }

        // Generate seotitle menggunakan fungsi Str::slug()
        $data['seotitle'] = Str::slug($data['title']);

        //User
        $data['user_id'] = auth()->user()->id;

        $post = Post::create($data);

        // Attach kategori ke post
        if ($request->has('categories')) {
            $categories = array_map('intval', explode(',', $request->input('categories')[0]));
            $post->categories()->sync($categories);
        }

        return redirect(url('post'))->with('success', 'Data post has been created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.post.show', [
            'post' => Post::with(['User', 'Categories'])->find($id),
            //  $post = Post::with('categories')->findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::with('categories')->findOrFail($id);
        $categories = Category::all();
    
        return view('back.post.update', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            // Simpan file gambar
            if ($request->hasFile('image')) {
                $fileName = uniqid().'.'.$request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('public/back', $fileName);

                //unlink image/delete old image
                Storage::delete('public/back/'.$request->oldImage);

                $data['image'] = $fileName;
            }
        } else {
            $data['image'] = $request->oldImage;
        }

        // Generate seotitle menggunakan fungsi Str::slug()
        $data['seotitle'] = Str::slug($data['title']);

        // user
        $data['user_id'] = auth()->user()->id;

        // Cari post berdasarkan ID
        $post = Post::findOrFail($id);

         // Update post
         $post->update($data);

        // Attach kategori ke post
        if ($request->has('categories')) {
            $categories = array_map('intval', explode(',', $request->input('categories')[0]));
            $post->categories()->sync($categories);
        }

        return redirect(url('post'))->with('success', 'Data post has been updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::findOrFail($id);
        Storage::delete('public/back/' . $data->image);
        $data->delete();

        return response()->json([
            'message' => 'Data post has been deleted'
        ]);
    }
}
