<?php

use \Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends \BaseController
{
    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post', 'put', 'patch', 'delete']);
        $this->beforeFilter('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('category.index')
            ->with('categories', Category::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('category.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $rules = Category::$validationRules;
        $rules['name'][] = 'unique:categories,name';
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('category.create')
                ->withInput()
                ->withErrors($validator)
                ->with('message', 'Oeps, there were some errors!');
        }

        $category = new Category;
        $category->name = Input::get('name');
        $category->save();

        return Redirect::route('category.index')
            ->with('message', 'Category "' . $category->name . '" has been created!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $results = Formula::whereCategoryId($id)->with('category')->get();

        if ($results->isEmpty()) {
            $e = new ModelNotFoundException();
            $e->setModel('Category');
            throw $e;
        }

        $category = 'Category: ' . $results->first()->category->name;

        return View::make('formula.index')
            ->with('formulas', $results)
            ->with('heading', $category);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return View::make('category.edit')
            ->with('category', $category);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $rules = Category::$validationRules;
        $rules['name'][] = 'unique:categories,name,' . $id;
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('category.edit', $id)
                ->withInput()
                ->withErrors($validator)
                ->with('message', 'Oeps, there were some errors!');
        }

        $category = Category::findOrFail($id);
        $category->name = Input::get('name');
        $category->save();

        return Redirect::route('category.index')
            ->with('message', 'Category "' . $category->name . '" has been updated!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return Redirect::route('category.index')
            ->with('message', 'Category "' . $category->name . '" is deleted!');
    }


}
