<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
    //
    public function show(Request $request): View
    {
        
        $detailId = intval($request->query('detail'));
        if(request()->is('home')){
            $todo = Todo::where(function ($query) {
                $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('due_date', '=', date("Y-m-d"))->where('is_done', '=', 0);
            });
            $header = 'Today';
        }elseif(request()->is('upcoming')){
            $todo = Todo::where(function ($query) {
                $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('due_date', '>', date("Y-m-d"))->where('is_done', '=', 0);
            });
            $header = 'Upcoming';
        }elseif(request()->is('done')){
            $todo = Todo::where(function ($query) {
                $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('is_done', '=', 1);
            });
            $header = 'Done';
        }elseif(request()->is('Personal')){
            $todo = Todo::where(function ($query) {
                $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('kategori', '=', 'Personal');
            });
            $header = 'Personal';
        }elseif(request()->is('Kerjaan')){
            $todo = Todo::where(function ($query) {
                $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('kategori', '=', 'Kerjaan');
            });
            $header = 'Kerjaan';
        }elseif(request()->is('Liburan')){
            $todo = Todo::where(function ($query) {
                $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('kategori', '=', 'Liburan');
            });
            $header = 'Liburan';
        }
        return view('home', [
                'todosList' => $todo->get(),
                'today' => Todo::where(function ($query) {
                    $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('due_date', '=', date("Y-m-d"))->where('is_done', '=', 0);
                })->count(),  
                'upcoming' => Todo::where(function ($query) {
                    $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('due_date', '>', date("Y-m-d"))->where('is_done', '=', 0);
                })->count(),
                'done' => Todo::where(function ($query) {
                    $query->where('user_id', '=', Auth::id())->where('is_done', '=', 1);
                })->count(),
                'Personal' => Todo::where(function ($query) {
                    $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Personal');
                })->count(),
                'Kerjaan' => Todo::where(function ($query) {
                    $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Kerjaan');
                })->count(),
                'Liburan' => Todo::where(function ($query) {
                    $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Liburan');
                })->count(),
                'Detail' => $detailId,
                'Header' => $header
        ]);
    }
    public function simpan(Request $request) {
        $redirect = $request->query('redirect');
        $data = request()->validate([
            'id' => 'required|integer',
            'judul' => 'required|string',
            'deskripsi' => 'nullable|string|max:255',
            'due_date' => 'required|date',
            'jam' => 'required|',
            'is_done' => 'required|integer'
        ]);
        
        $kategori = ["Personal", "Kerjaan", "Liburan"];     
        Todo::updateOrCreate(
            ['id' => $data['id']],
            array_merge($data, [
                'user_id' => Auth::id(), 
                'kategori' => $kategori[rand(0, 2)]
            ])
        );
        // dd($request);
        if($redirect == "upcoming"){
            return redirect('/upcoming')->with('success', 'Data berhasil disimpan');
            
        }elseif($redirect == "done"){
            return redirect('/done')->with('success', 'Data berhasil disimpan');
            
        }else{
            return redirect('/home')->with('success', 'Data berhasil disimpan');
            
        }
        
    }   
    public function store(Request $request): RedirectResponse
    {
        $redirect = $request->query('redirect');
        // Validate the request...
 
        $Todo = new Todo;
        
        $Todo->user_id = Auth::id();
        $Todo->judul = $request->input('judul');
        $Todo->kategori = $request->input('kategori');
        $Todo->deskripsi = $request->input('deskripsi');
        $Todo->due_date = $request->input('due_date');
        $Todo->jam = $request->input('jam');
        if($redirect == "done"){
            $Todo->is_done = 1;
        }else{
            $Todo->is_done = 0;
        }
 
        $Todo->save();
 
        if($redirect == "upcoming"){
            return redirect('/upcoming')->with('success', 'Data berhasil disimpan');
            
        }elseif($redirect == "done"){
            return redirect('/done')->with('success', 'Data berhasil disimpan');
            
        }else{
            return redirect('/home')->with('success', 'Data berhasil disimpan');
            
        }
    }
    public function todoHandler(Request $request)
    {
        $todoIds = $request->input('todo-ids');
        $action = $request->input('action');
        $redirect = $request->query('redirect');
    

        if($redirect == "upcoming"){
            $dest =  redirect('/upcoming');
            
        }elseif($redirect == "done"){
            $dest = redirect('/done');
            
        }else{
            $dest = redirect('/home');
            
        }

        switch ($action) {
            case 'checklist':
                Todo::whereIn('id', $todoIds)->update(['is_done' => true]);
                return $dest->with('success', 'To-Do berhasil di-checklist!');
            
            case 'delete':
                Todo::whereIn('id', $todoIds)->delete();
                return $dest->with('success', 'To-Do berhasil dihapus!');
            
            default:
                return $dest->with('error', 'Aksi tidak dikenali!');
        }
    }



        // public function showUpcoming(Request $request): View
    // {
    //     $detailId = intval($request->query('detail'));
        
    //     // dd($cek)
    //     $todo = Todo::where(function ($query) {
    //         $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('due_date', '>', date("Y-m-d"))->where('is_done', '=', 0);
    //     });
    //     return view('home', [
    //             'todosList' => $todo->get(),
    //             'today' => Todo::where(function ($query) {
    //                 $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('due_date', '=', date("Y-m-d"))->where('is_done', '=', 0);
    //             })->count(),
    //             'upcoming' => $todo->count(),
    //             'done' => Todo::where(function ($query) {
    //                 $query->where('user_id', '=', Auth::id())->where('is_done', '=', Auth::id());
    //             })->count(),
    //             'Personal' => Todo::where(function ($query) {
    //                 $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Personal');
    //             })->count(),
    //             'Kerjaan' => Todo::where(function ($query) {
    //                 $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Kerjaan');
    //             })->count(),
    //             'Liburan' => Todo::where(function ($query) {
    //                 $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Liburan');
    //             })->count(),
    //             'Detail' => $detailId,
    //             'Header' => 'Upcoming'
    //     ]);
    // }
    // public function showDone(Request $request): View
    // {
    //     $detailId = intval($request->query('detail'));
        
    //     $todo = Todo::where(function ($query) {
    //         $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('is_done', '=', Auth::id());
    //     });
    //     // dd($cek)
    //     return view('home', [
    //             'todosList' => $todo->get(),
    //             'today' => Todo::where(function ($query) {
    //                 $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('due_date', '=', date("Y-m-d"))->where('is_done', '=', 0);
    //             })->count(),
    //             'upcoming' => Todo::where(function ($query) {
    //                 $query->where('user_id', 'like', '%' . Auth::id() . '%')->where('due_date', '>', date("Y-m-d"))->where('is_done', '=', 0);
    //             })->count(),
    //             'done' => $todo->count(),
    //             'Personal' => Todo::where(function ($query) {
    //                 $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Personal');
    //             })->count(),
    //             'Kerjaan' => Todo::where(function ($query) {
    //                 $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Kerjaan');
    //             })->count(),
    //             'Liburan' => Todo::where(function ($query) {
    //                 $query->where('user_id', '=', Auth::id())->where('kategori', '=', 'Liburan');
    //             })->count(),
    //             'Detail' => $detailId,
    //             'Header' => "Done"
    //     ]);
    // }

}
