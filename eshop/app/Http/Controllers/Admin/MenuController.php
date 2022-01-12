<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateRequestForm;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    public function create(){
        return view('menu.add', [
            'title' => 'Them danh muc',
            'menus' => $this->menuService->getParent()
        ]);
    } 

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function store(CreateRequestForm $request){
        $result = $this->menuService->create($request);

        return redirect()->back();
    }
}
