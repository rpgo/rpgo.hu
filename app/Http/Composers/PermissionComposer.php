<?php namespace Rpgo\Http\Composers;


use Illuminate\View\View;
use Rpgo\Models\Permission;

class PermissionComposer {

    public function compose(View $view)
    {
        $permissions = Permission::orderBy('name')->get();

        $view->with(compact('permissions'));
    }

}