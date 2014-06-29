<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends \BaseController {

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
            ->withCategories(Category::all());
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
        // We use the Ardent packages to hydrate the input entries
        $category = new Category;

        if ($category->save())
            // Successfully created!
            return Redirect::route('category.index')
                ->withMessageSuccess('Category "' . $category->name . '" has been created!');

        // Returning an error!
        return Redirect::route('category.create')
            ->withErrors($category->errors())
            ->withMessageAlert('Oeps, there were some errors!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
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

        $heading = 'Category: ' . $results->first()->category->name;

        return View::make('formula.index')
            ->withFormulas($results)
            ->withHeading($heading);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return View::make('category.edit')
            ->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        $category = Category::findOrFail($id);

        if ($category->updateUniques())
            return Redirect::route('category.index')
                ->withMessageSuccess('Category "' . $category->name . '" has been updated!');

        return Redirect::route('category.edit', $id)
            ->withErrors($category->errors())
            ->withMessageAlert('Oeps, there were some errors!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return Redirect::route('category.index')
            ->withMessageInfo('Category "' . $category->name . '" is deleted!');
    }
}
