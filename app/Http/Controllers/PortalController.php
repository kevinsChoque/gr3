<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\TPersona;
use App\Models\TConductor;
use App\Models\TUnidadVehicular;
use App\Models\TArchivo;
use App\Models\TInfraccion;
use App\Models\TCev;

class PortalController extends Controller
{
    public function actionPortal()
    {
        return view('portal.portal');
    }
}
