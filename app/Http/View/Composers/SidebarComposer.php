<?php

namespace App\Http\View\Composers;

use App\Main\SidebarPanel;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!is_null(request()->route())) {
            $pageName = request()->route()->getName();
            $routePrefix = explode('/', $pageName)[0] ?? '';
            switch ($routePrefix) {
                case 'dashboard':
                    $view->with('sidebarMenu', SidebarPanel::dashboard());
                    break;
                case 'template.choose':
                    $view->with('sidebarMenu', SidebarPanel::templates());
                    break;
                case 'case-study.create':
                    $view->with('sidebarMenu', SidebarPanel::case_studies());
                    break;
                case 'case-study.manage':
                    $view->with('sidebarMenu', SidebarPanel::case_studies());
                    break;
                case 'case-study.edit':
                    $view->with('sidebarMenu', SidebarPanel::case_studies());
                    break;
                default:
                    $view->with('sidebarMenu', SidebarPanel::dashboard());
            }
            
            $view->with('allSidebarItems', SidebarPanel::all());
            $view->with('pageName', $pageName);
            $view->with('routePrefix', $routePrefix);
        }
    }
}
