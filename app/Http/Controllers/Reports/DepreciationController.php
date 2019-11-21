<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use DebugBar;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class DepreciationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $assets = $this->getAssetData($request);

        $allDepTable = [];
        $maxYear = 0;
        foreach ($assets as $asset) {
            $cost = $asset->purchasedCost;
            $lifespan = $asset->lifespan;
            $depValue = ($cost - 0) / $lifespan;
            $depRate = round(($depValue / $cost) * 100, 2);

            $depTable = array();
            for ($a = 1; $a <= $lifespan; $a++) {
                $depTable[$a]['rate'] = $depRate;
                $depTable[$a]['cost'] = round($cost);
                $depTable[$a]['less'] = round($depValue);
                $depTable[$a]['newCost'] = $depTable[$a]['cost'] - $depTable[$a]['less'];

                $cost -= $depValue;
            }
            $allDepTable[$asset->name]['depreciation'] = $depTable;
            $allDepTable[$asset->name]['start'] = date('F d, Y', strtotime($asset->purchasedDate));
            $allDepTable[$asset->name]['end'] = date('F d, Y', strtotime($asset->purchasedDate . ' + ' . $asset->lifespan . ' years'));

            if ($lifespan > $maxYear) {
                $maxYear = $lifespan;
            }
        }

        $settings['maxYear'] = $maxYear;
        $settings['filterValue'] = $request->get('filterValue');
        $settings['sortBy'] = $request->get('sortBy');
        $settings['sorting'] = $request->get('sorting');
        $settings['format'] = $request->has('format') ? $request->get('format') : 'year';

//        \Debugbar::info($settings['downloadLink']);
        return view("pages.reports.depreciation")->with(['settings' => $settings, 'records' => $allDepTable]);
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

    public function pdf(Request $request) {

        $assets = $this->getAssetData($request);

        $allDepTable = [];
        $maxYear = 0;
        foreach ($assets as $asset) {
            $cost = $asset->purchasedCost;
            $lifespan = $asset->lifespan;
            $depValue = ($cost - 0) / $lifespan;
            $depRate = round(($depValue / $cost) * 100, 2);

            $depTable = array();
            for ($a = 1; $a <= $lifespan; $a++) {
                $depTable[$a]['rate'] = $depRate;
                $depTable[$a]['cost'] = round($cost);
                $depTable[$a]['less'] = round($depValue);
                $depTable[$a]['newCost'] = $depTable[$a]['cost'] - $depTable[$a]['less'];

                $cost -= $depValue;
            }
            $allDepTable[$asset->name]['depreciation'] = $depTable;
            $allDepTable[$asset->name]['start'] = date('F d, Y', strtotime($asset->purchasedDate));
            $allDepTable[$asset->name]['end'] = date('F d, Y', strtotime($asset->purchasedDate . ' + ' . $asset->lifespan . ' years'));

            if ($lifespan > $maxYear) {
                $maxYear = $lifespan;
            }
        }

        $settings['maxYear'] = $maxYear;
        $settings['format'] = $request->has('format') ? $request->get('format') : 'year';

        $pdf = PDF::loadView('pdf.depreciation', ['settings' => $settings, 'records' => $allDepTable]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function excel(Request $request) {

        $assets = $this->getAssetData($request);

        $allDepTable = [];
        $maxYear = 0;
        foreach ($assets as $asset) {
            $cost = $asset->purchasedCost;
            $lifespan = $asset->lifespan;
            $depValue = ($cost - 0) / $lifespan;
            $depRate = round(($depValue / $cost) * 100, 2);

            $depTable = array();
            for ($a = 1; $a <= $lifespan; $a++) {
                $depTable[$a]['rate'] = $depRate;
                $depTable[$a]['cost'] = round($cost);
                $depTable[$a]['less'] = round($depValue);
                $depTable[$a]['newCost'] = $depTable[$a]['cost'] - $depTable[$a]['less'];

                $cost -= $depValue;
            }
            $allDepTable[$asset->name]['depreciation'] = $depTable;
            $allDepTable[$asset->name]['start'] = date('F d, Y', strtotime($asset->purchasedDate));
            $allDepTable[$asset->name]['end'] = date('F d, Y', strtotime($asset->purchasedDate . ' + ' . $asset->lifespan . ' years'));

            if ($lifespan > $maxYear) {
                $maxYear = $lifespan;
            }
        }

        return $allDepTable;

        $settings['maxYear'] = $maxYear;

        return Excel::create("deprecation_table_" . date('YmdHis'), function($excel) use ($allDepTable) {
                    $excel->sheet('sheet', function($sheet) use ($allDepTable) {
                        $sheet->fromArray($allDepTable);
                    });
                })->download("xls");
    }

    private function getAssetData(Request $request) {
        $assets = Asset::where(function($q) use ($request) {
                    $q->whereNotNull('purchasedCost');
                    $q->whereNotNull('lifespan');

                    if ($request->has('filterValue') && $request->get('filterValue') != '') {
                        $q->where('name', 'like', '%' . trim($request->get('filterValue')) . '%');
                    }

                    if ($request->has('format')) {
                        $format = trim($request->get('format'));
                    } else {
                        $format = 'year';
                    }
                    $q->where('lifespan_format', '=', $format);
                });

        if ($request->has('sortBy')) {
            $assets = $assets->orderBy($request->get('sortBy'), $request->get('sorting'))->get();
        } else {
            $assets = $assets->orderBy('created_at', 'desc')->get();
        }

        return $assets;
    }

}
