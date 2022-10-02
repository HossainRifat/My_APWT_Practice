<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product{
    var $name;
    var $size;

    function __construct($name, $size)
    {
        $this->name=$name;
        $this->size=$size;
    }
}


class pageController extends Controller
{   
    var $productList = [];
    
    function Add_list(){
        $p1 = new Product("car","large");
        $p2 = new Product("juce","small");
        $p3 = new Product("water bottle","small");
        $this->productList=array($p1,$p2,$p3);
    }

    function Hello(){
        return view('hello');
    }

    function About(){
        return view('about_us');
    }

    function Products(){
        $this->Add_list();
        return view('products')->with("productList",$this->productList);
    }

    function Add_product(){
        return view('add_product');
    }

    function Contact(){
        return view('contact');
    }

    function Our_team(){
        return view('our_team');
    }

    function showProduct(Request $rq){
        $output = "submitted";
        $output.="<br>Product Name:" .$rq->ProductName;
        $output.="<br>Product size:" .$rq->ProductSize;
        $p1 = new Product($rq->ProductName,$rq->ProductSize);
        $this->Add_list();
        $this->productList[] =  $p1;
        return view("updated_product")->with("productList",$this->productList);
    }

    function Registration(){
        return view('registration');
    }
}
