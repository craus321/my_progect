<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use TCG\Voyager\Models\Post;
use App\Models\AboutPrice;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function form_price()
    {
        Carbon::setLocale('ru');
        $prices = AboutPrice::all();
        return view('content.content', compact('prices'));
    }

    public function index()
    {
        Carbon::setLocale('ru');
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get(); // Получаем три последних блога
        $prices = AboutPrice::all(); // Получаем все цены
        return view('content.content', compact('posts', 'prices')); // Возвращаем и цены и блоги
    }

}
