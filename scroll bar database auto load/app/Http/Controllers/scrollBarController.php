<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
class scrollBarController extends Controller
{
    public function jqueryLoadMore(Request $request)

    {

        $products=Product::paginate(8);
        $html='';
        foreach ($products as $product) {

            $html.='<li>'.$product->id.' <strong>'.$product->title.'</strong> : '.$product->description.'</li>';

        }


        if ($request->ajax()) {

            return $html;

        }
        return view('jqueryLoadmore');

    }

}
