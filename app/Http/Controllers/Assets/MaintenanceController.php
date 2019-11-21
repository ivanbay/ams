<?php

namespace App\Http\Controllers\Assets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Notification;
use App\Model\Personnel;
use App\Model\AssetLocation;
use App\Model\Maintenance;
use App\Model\MaintenanceStatus;
use App\Http\Requests\MaintenanceUpdateRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class MaintenanceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        Notification::showNotification();

        $records = [];
        $records['personnels'] = Personnel::get();
        $records['locations'] = AssetLocation::get();

        $records['maintenance'] = Maintenance::with(['asset' => function($q) {
                        $q->select(['tag', 'brand', 'model', 'name']);
                    }, 'status' => function($q) {
                        $q->select(['id', 'name']);
                    }])->get();

        return view("pages.maintenance.maintenance")->with('records', $records);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $data = [];
        $data['asset'] = Maintenance::with(['asset' => function($q) {
                        $q->select(['tag', 'brand', 'model', 'name']);
                    }, 'status' => function($q) {
                        $q->select(['id', 'name']);
                    }])->where("joborderid", $id)
                ->first();

        $data['status'] = MaintenanceStatus::all();

        return view('pages.maintenance.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MaintenanceUpdateRequest $request, $id) {

        $fields = [
            "maintenance_status_id" => $request->get("status"),
            "etc" => $request->get("etc"),
            "comments" => $request->get("comments")
        ];

        $status = MaintenanceStatus::where('name', 'like', '%release%')->first();
        if ($request->get("status") == $status->id) {
            $fields["date_released"] = \Carbon\Carbon::now();
        }

        $asset = Maintenance::where("joborderid", $id)->update($fields);

        if ($asset > 0) {
            return redirect()->to('assets/maintenance')->with('successMessage', 'Asset updated successfully!');
        } else {
            return redirect()->to('assets/maintenance')->with('errorMessage', 'Something went wrong! Please try again');
        }
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
        $maintenance = Maintenance::with(['asset' => function($q) {
                        $q->select(['tag', 'brand', 'model', 'name']);
                    }, 'status' => function($q) {
                        $q->select(['id', 'name']);
                    }])->get();

        $pdf = PDF::loadView('pdf.maintenance', ['maintenance' => $maintenance]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function excel() {
        $maintenance = Maintenance::with(['asset' => function($q) {
                        $q->select(['tag', 'brand', 'model', 'name']);
                    }, 'status' => function($q) {
                        $q->select(['id', 'name']);
                    }])->get();

        $i = 1;
        $records[] = ["Job Order", "Asset Tag", "Brand", "Model", "Status", "Date Endorsed", "ETC", "Comments/Note", "Date Released"];
        foreach ($maintenance as $asset) {
            $records[$i][] = $asset->joborderid;
            $records[$i][] = $asset->asset_id;
            $records[$i][] = $asset->asset->brand;
            $records[$i][] = $asset->asset->model;
            $records[$i][] = $asset->status->name;
            $records[$i][] = date('F d, Y H:i:s', strtotime($asset->date_endorsed));
            $records[$i][] = $asset->etc != null ? date('F d, Y', strtotime($asset->etc)) : '-';
            $records[$i][] = $asset->comments;
            $records[$i][] = $asset->date_released != null ? date('F d, Y H:i:s', strtotime($asset->date_released)) : '-';
            $i++;
        }

        return Excel::create("maintenance_table_" . date('YmdHis'), function($excel) use ($records) {
                    $excel->sheet('sheet', function($sheet) use ($records) {
                        $sheet->fromArray($records, null, 'A1', false, false);
                    });
                })->download("xls");
    }

}
