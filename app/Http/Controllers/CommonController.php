<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Logging;
use Barryvdh\Debugbar\Facade as Debugbar;

class CommonController extends Controller {

    /**
     * Generic delete method to delete record from the database
     * @param Request $request
     * @return type
     */
    public function deleteRecord(Request $request) {
        $recordId = $request->get('recordId');
        $model1 = "\\App\\Model\\" . $request->get('model');
        $model2 = "\\App\\" . $request->get('model');

        if (class_exists($model1)) {
            $model = $model1;
        } else if (class_exists($model2)) {
            $model = $model2;
        } else {
            return Response()->json(array('message' => 'failed'), 505);
        }

        if ($model::destroy($recordId)) {
            if ($request->get('model') == "Asset") {
                Logging::logActivity("Deleted asset. Asset tag: " . $recordId);
            } else if (strpos($request->get('model'), "Personnel") !== false) {
                Logging::logActivity("Deleted personnel. Employee ID: " . $recordId);
            }

            return Response()->json(array('message' => 'success'), 200);
        } else {
            return Response()->json(array('message' => 'failed'), 204);
        }
    }

}
