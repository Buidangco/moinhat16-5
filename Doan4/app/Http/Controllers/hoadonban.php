<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use DB;

class hoadonban extends Controller
{
    public function Khachhang()
    {
    	$i=1;
    	$data1=DB::table('khachhang')->paginate(5);
    	 $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    	return view('hoadonban.Khachhang')->with('data1',$data1)->with('data',$data)->with('i',$i);
    }

    public function hoadonban()
    {
    	$i=1;
    	$data1=DB::table('hoadonban')->paginate(5);
    	
    	 $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    	return view('hoadonban.hoadonban')->with('data1',$data1)->with('data',$data)->with('i',$i);
    }

    public function hoadonban_view($mahoadon)
    {
    	$i=1;
    	 $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();
    	  $data1 =DB::table("cthoadonban1")
    	  ->join('hoadonban', 'cthoadonban1.mahoadon', 'hoadonban.mahoadon')
        ->join('sanpham','sanpham.id','cthoadonban1.masanpham')
        ->select('cthoadonban1.*','sanpham.name','hoadonban.maKh','sanpham.image')
        ->where('hoadonban.mahoadon',$mahoadon)
        ->get();
        return view('hoadonban.viewhoadonban')->with('data1',$data1)->with('i',$i);
    }

    public function hoadonban_duyet($mahoadon)
    {
    	$i=1;
    	 $data = DB::table('codeloai')->select('nameLoai','code','idLoai')->get();


        DB::table('hoadonban')->where('mahoadon',$mahoadon)->update(['xacnhan'=>'Đã duyệt']);
            	  $data1 =DB::table("cthoadonban1")
    	  ->join('hoadonban', 'cthoadonban1.mahoadon', 'hoadonban.mahoadon')
        ->join('sanpham','sanpham.id','cthoadonban1.masanpham')
        ->select('cthoadonban1.*','sanpham.name','hoadonban.makh','hoadonban.gia','hoadonban.ngayban','hoadonban.xacnhan')
        ->where('hoadonban.mahoadon',$mahoadon)
        ->get();
        return Redirect()->back();
    }
}
