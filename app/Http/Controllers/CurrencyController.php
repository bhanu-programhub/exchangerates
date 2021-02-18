<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use AshAllenDesign\LaravelExchangeRates\ExchangeRate;
 
use Guzzle\Http\Exception\ClientErrorResponseException;
 
use carbon\Carbon;
 
class CurrencyController extends Controller
{
    //
    public function index() {
      
     return view('currency');
    }    
 
    public function exchangeCurrency(Request $request) {
         
      $amount = ($request->amount)?($request->amount):(1);
 
      $apikey = 'a9ce58f67a07be4f23eb';
 
      $from_Currency = urlencode($request->from_currency);
      $to_Currency = urlencode($request->to_currency);
      $query =  "{$from_Currency}_{$to_Currency}";
      
 
      // change to the free URL if you're using the free version
      $json = file_get_contents("https://free.currconv.com/api/v7/convert?q={$query}&compact=ultra&apiKey=a9ce58f67a07be4f23eb");
     // dd($json);exit;
      $obj = json_decode($json, true);
      
       
      $val = $obj["$query"];
      $total = $val * $amount;
      $data =  number_format($total, 2, '.', '');
 
      /*$total = $val['val'] * 1;
 
      $formatValue = number_format($total, 2, '.', '');
       
      $data = "$amount $from_Currency = $to_Currency $formatValue";
      dd($formatValue);exit;*/
      echo $data; die;
     
   }
 
}