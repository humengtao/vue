<?php
/**
 * Created by PhpStorm.
 * User: humengtao
 * Date: 2016/10/25
 * Time: 00:16
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class StaticPageController extends Controller
{
    function index()
    {
        return view('web.about');
    }

    function faq(){
        return view('web.faq');
    }
}