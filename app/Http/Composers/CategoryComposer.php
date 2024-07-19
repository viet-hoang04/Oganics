<?php
namespace App\Http\Composers;

use Illuminate\View\View;
use App\Models\CategoryModel;


class CategoryComposer
{
    public function compose(View $view)
    {
        $data_category = CategoryModel::all();
        $view->with('data_category', $data_category);
    }
}
