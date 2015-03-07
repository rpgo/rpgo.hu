<?php namespace Rpgo\Http\Composers;


use Illuminate\View\View;
use Rpgo\Models\Type;

class TypeComposer {

    public function compose(View $view)
    {
        $types = Type::orderBy('name')->get();

        $view->with(compact('types'));
    }

}