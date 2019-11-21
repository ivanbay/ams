<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Supplier;
use App\Helpers\Logging;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class SuppliersController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $suppliers = Supplier::get();
        return view('pages/settings/suppliers')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            $supplier = Supplier::firstOrNew(array('id' => $request->get('id')));
            $supplier->name = $request->get('name');
            $supplier->description = $request->get('description');

            if ($supplier->exists) {
                Logging::logActivity("Supplier " . $request->get('name') . " records was updated.");
            } else {
                Logging::logActivity("New supplier, " . $request->get('name') . " has been added.");
            }

            if ($supplier->save()) {
                return redirect()->back()->with('successMessage', 'Supplier successfully added/updated!');
            } else {
                return redirect()->back()->with('errorMessage', 'Something went wrong! Please try again.');
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect()->back()->with('errorMessage', 'Something went wrong! Maybe role already exist.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $supplier = Supplier::find($id);

        if ($supplier != "") {
            return Response()->json($supplier, 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function pdf() {
        $suppliers = Supplier::get();

        $pdf = PDF::loadView('pdf.suppliers', ['suppliers' => $suppliers]);
        return $pdf->stream();
    }

    public function excel() {
        $suppliers = Supplier::get();

        return Excel::create("suppliers_table_" . date('YmdHis'), function($excel) use ($suppliers) {
                    $excel->sheet('sheet', function($sheet) use ($suppliers) {
                        $sheet->fromArray($suppliers);
                    });
                })->download("xls");
    }

}
