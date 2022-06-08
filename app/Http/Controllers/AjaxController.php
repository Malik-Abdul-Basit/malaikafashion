<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function index(Request $request){
        $select = $request->select;
        $value = $request->value;
        $dependent = $request->dependent;
        $table = $request->table;
        $_token = $request->_token;
        if(!empty($select) && !empty($value) && !empty($dependent) && !empty($table) && !empty($_token)){
            $output = '<option value="0"> Select '.ucfirst($table).'</option>';
            $data = DB::table($table)
                ->where($select,'=', $value)
                ->where('status','=','a')
                ->orderBy('id','desc')
                //->groupBy($select)
                ->get();
            if(count($data)>0){
                foreach($data as $index => $row){
                    $output .= '<option value="'.$row->id.'">'.$row->heading.'</option>';
                }
            }
            echo $output;
        }
    }
}
