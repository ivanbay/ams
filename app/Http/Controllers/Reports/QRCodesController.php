<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use Barryvdh\DomPDF\Facade as PDF;

class QRCodesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        if ($request->has("filterValue")) {
            $asset = Asset::where("name", "like", '%' . $request->filterValue . '%')
                            ->orWhere("tag", "like", '%' . $request->filterValue . '%')
                            ->get()->makeHidden(['historical']);
        } else {
            $asset = Asset::get()->makeHidden(['historical']);
        }

        $qrcodes = $asset->map(function($asset) {
            return collect($asset->toArray())
                            ->only(['tag', 'name', 'assigned_to'])
                            ->all();
        });

        $qrcodes = $asset->filter(function($item, $key) {

//            if ($request->has("filter") && $request->get("filter") == 'assigned') {
//                
//            } else if ($request->has("filter") && $request->get("filter") == 'unassigned') {
//                if ($item['assigned_to'] == null) {
//                    return true;
//                }
//            } else {
//                return true;
//            }

            if ($item['assigned_to'] != null) {
                return true;
            }
        });

        $qrcodes->values();



        return view("pages.reports.qrcodes")->with('qrcodes', $qrcodes);
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

    public function qrCodePdf(Request $request) {


        $asset = Asset::where(function($q) use($request) {
                    if ($request->has('tags')) {
                        $q->whereIn('tag', $request->get('tags'));
                    }
                })->get()->makeHidden(['historical']);


        $assets = $asset->map(function($asset) {
                    return collect($asset->toArray())
                                    ->only(['tag', 'name', 'assigned_to'])
                                    ->all();
                })->filter(function($item, $key) {
                    if ($item['assigned_to'] != null) {
                        return true;
                    }
                })->values();

        $pdf = PDF::loadView('pdf.QRCodes', ['assets' => $assets]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

}
