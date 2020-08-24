<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    private $category;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = category::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($category) {

                    $action = '<a href="' . route('admin.categories.edit', ['category' => $category->id]) . '" class="btn btn-success" id="edit-category" data-id=' . $category->id . '>EDITAR </a>';
                    $action .= '<meta name="csrf-token" content="{{ csrf_token() }}">';
                    $action .= '<a id="delete-category" data-id=' . $category->id . ' class="btn btn-danger delete-category">REMOVER</a>';

                    return $action;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->category->create($data);

        flash('Categoria cadastrada com sucesso');
        return view('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category = $this->category->findOrFail($category);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $data = $request->all();
        $category = $this->category->find($category);
        $category->update($data);

        flash('Categoria atualizada com sucesso');
        return view('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        //
    }
}
