<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Element;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $elements = Element::all();
        $html = '<ul>';
        foreach ($elements as $element) {
            // Выбираем корневые элементы
            if (count($element->parents) == 0) {
                $html .= '<li>' . $element->name;
                // Проверяем наличие дочерних элементов
                if (count($element->children) > 0) {
                    $html .= '<ul>';
                    $html .= $this->getChildren($element->children);
                    $html .= '</ul>';
                }

                $html .= '</li>';
            }
        }

        $html .= '</ul>';
        // echo $html;
        // dd($out);
        return view('home', ['elements' => $html]);
    }

    /**
     * Рекурсивный поиск вложенных элементов
     *
     * @param  object $children [description]
     * @param  string $html     [description]
     * @return string           [description]
     */
    private function getChildren($children, $html = '')
    {
        foreach ($children as $child) {
            $html .= '<li>' . $child->name;

            if (count($child->children) > 0) {
                $html .= '<ul>';
                $html .= $this->getChildren($child->children);
                $html .= '</ul>';
            }

            $html .= '</li>';
        }

        return $html;
    }
}
