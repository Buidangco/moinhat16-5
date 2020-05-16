<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use App\Charts\bieudo;
use Carbon\Carbon;
use Auth;
use DB;

class thongke extends Controller
{
    public function index(Request $req)
    {
        
                        // Auth::logout();
    	 $query=DB::table("codeloai");
    	$query=$query->select("*");
    	$data=$query->paginate(15);
    	$forngay=DB::table('hoadonban')->get();
    	$so=[];
    	$ngay=[];
    	foreach ($forngay as $key => $value) {
    		$date =\Carbon\Carbon::today()->subDays(7);
    		  $now = Carbon::now();
             $day= Carbon::now()->dayOfWeek;
            $tuan=$now->subDays($day);
    		$layngay=DB::table('hoadonban')
    		->where([
                ['ngayban','<=',$tuan ],
                ['ngayban', '>=', $date],
                ['xacnhan', 'Đã duyệt'],
                   ])
    		->get();
    	}	
    		foreach ($layngay as $key => $value) {
    			$ct=DB::table('cthoadonban1')->where('mahoadon',$value->mahoadon)->SUM('soluong');
    			// foreach ($ct as $key => $value) {

    				array_push($so,$ct);
    		       array_push($ngay,$value->ngayban);
    			// }
    			
    		}		
    		$chart = new bieudo;
    	$chart->labels($ngay);
    	$chart->dataset('Số lượng sản phẩm', 'line', $so)->options([
    		'color'=>'red',
    	]);


    	$so1=[];
    	$ngay1=[];
    	foreach ($forngay as $key => $value) {
    		$date =\Carbon\Carbon::today()->subDays(30);
    		// $now = Carbon::now()->toDateString();
            $now = Carbon::now();
             $day= Carbon::now()->day;
            $thang=$now->subDays($day);  
    		$layngay=DB::table('hoadonban')
    		->where([
                ['ngayban','<=',$thang],
                ['ngayban', '>=', $date],
                 ['xacnhan', 'Đã duyệt'],
                   ])
    		->get();
    	}	
    		foreach ($layngay as $key => $value) {
    			$ct=DB::table('cthoadonban1')->where('mahoadon',$value->mahoadon)->SUM('soluong');
    			// foreach ($ct as $key => $value) {

    				array_push($so1,$ct);
    		       array_push($ngay1,$value->ngayban);
    			// }
    			
    		}		
    		$chart1 = new bieudo;
    	$chart1->labels($ngay1);
    	$chart1->dataset('Số lượng sản phẩm', 'line', $so1)->options([
    		'color'=>'red',
    	]);
    	return view('home.home',['chart'=>$chart,'data'=>$data,'chart1'=>$chart1]);
    }
}
