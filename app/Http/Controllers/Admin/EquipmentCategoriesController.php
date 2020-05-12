<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentCategoriesRequest;
use App\Models\EquipmentCategory;
//use Illuminate\Http\Request;

class EquipmentCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of equipment categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = EquipmentCategory::orderBy('position', 'asc')->get();

        return view('admin.equipment-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new equipment category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipment-categories.create', compact('count'));
    }

    /**
     * Store a newly created equipment category in storage.
     *
     * @param EquipmentCategoriesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentCategoriesRequest $request)
    {
        // Create and save to database
        $category = EquipmentCategory::create($request->all());

        // Create session variable for message confirmation
        session()->flash('message', "La categoria de equipo \"{$category->name}\" ha sido creada exitosamente");

        // Redirect to users list
        return redirect()->route('admin.equipment_categories.index');
    }

    /**
     * Display the specified equipment category.
     *
     * @param integer $id
     * @return void
     */
    public function show($id)
    {
        $category = EquipmentCategory::find($id);

        return view('admin.equipment-categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified equipment category.
     *
     * @param integer $id
     * @return void
     */
    public function edit($id)
    {
        $category = EquipmentCategory::find($id);
        $count = EquipmentCategory::count();

        return view('admin.equipment-categories.edit', compact('category', 'count'));
    }

    /**
     * Update the specified equipment category in storage.
     *
     * @param EquipmentCategoriesRequest $request
     * @param interger $id
     * @return void
     */
    public function update(EquipmentCategoriesRequest $request, $id)
    {
        // Find the resource into database
        $category = EquipmentCategory::find($id);

        // Update resource to database
        $category->update($request->all());

        // Create session variable for message confirmation
        session()->flash('message', "La categoría \"{$category->name}\" ha sido actualizada exitosamente");

        // Redirect to users list
        return redirect()->route('admin.equipment_categories.index');
    }

    /**
     * Toggle active a equipment category resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active()
    {
        $category = EquipmentCategory::where('id', request()->id)->select('id', 'name', 'active')->first();

        if ($category->active == 1) {
            $category->active = 0;
            $message = 'desactivada';
        } else {
            $category->active = 1;
            $message = 'activada';
        }

        $category->save();

        session()->flash('message', "El usuario \"{$category->name}\" ha sido {$message} exitosamente");

        return redirect()->back();
    }

    /**
     * Remove the specified equipment category from storage
     *
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Find record from database and create object resource
        $category = EquipmentCategory::where('id', $id)->select(['id', 'name'])->first();

        // Delete resource from database
        $category->delete();

        // Create session variable for message confirmation
        session()->flash('message', "La categoría \"{$category->name}\" ha sido eliminada exitosamente");

        // Redirect to categories list
        return redirect()->route('admin.equipment_categories.index');
    }
}
