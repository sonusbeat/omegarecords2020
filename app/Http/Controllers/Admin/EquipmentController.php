<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EquipmentRequest;
use App\Models\Equipment;
use App\Models\EquipmentCategory;
//use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of equipment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipment = Equipment::with(['equipment_category' => function($query) {
            $query->select(['id', 'name']);
        }])->orderBy('equipment_category_id', 'asc')->paginate(8);

        return view('admin.equipment.index', compact('equipment'));
    }

    /**
     * Show the form for creating a new equipment category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EquipmentCategory::select(['id', 'name'])->get();

        return view('admin.equipment.create', compact('categories'));
    }

    /**
     * Store a newly created equipment category in storage.
     *
     * @param EquipmentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {
        // Create and save to database
        $equipment = Equipment::create($request->all());

        // Create session variable for message confirmation
        session()->flash('message', "Se agregó el equipo \"{$equipment->name}\" exitosamente");

        // Redirect to users list
        return redirect()->route('admin.equipment.index');
    }

    /**
     * Show the form for editing the specified equipment category.
     *
     * @param integer $id
     * @return void
     */
    public function edit($id)
    {
        $equipment = Equipment::find($id);
        $categories = EquipmentCategory::select(['id', 'name'])->get();

        return view('admin.equipment.edit', compact('equipment', 'categories'));
    }

    /**
     * Update the specified equipment category in storage.
     *
     * @param EquipmentRequest $request
     * @param interger $id
     * @return void
     */
    public function update(EquipmentRequest $request, $id)
    {
        // Find the resource into database
        $equipment = Equipment::find($id);

        // Update resource to database
        $equipment->update($request->all());

        // Create session variable for message confirmation
        session()->flash('message', "El equipo \"{$equipment->name}\" ha sido actualizado exitosamente");

        // Redirect to users list
        return redirect()->route('admin.equipment.index');
    }

    /**
     * Toggle active a equipment category resource
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active()
    {
        $equipment = Equipment::where('id', request()->id)->select('id', 'name', 'active')->first();

        if ($equipment->active == 1) {
            $equipment->active = 0;
            $message = 'desactivado';
        } else {
            $equipment->active = 1;
            $message = 'activado';
        }

        // Save to database
        $equipment->save();

        session()->flash('message', "El equipo \"{$equipment->name}\" ha sido {$message} exitosamente");

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
        $equipment = Equipment::where('id', $id)->select(['id', 'name'])->first();

        // Delete resource from database
        $equipment->delete();

        // Create session variable for message confirmation
        session()->flash('message', "El equipo \"{$equipment->name}\" ha sido eliminado exitosamente");

        // Redirect to categories list
        return redirect()->route('admin.equipment.index');
    }
}
