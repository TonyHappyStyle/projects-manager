<?php

namespace App\Admin\Controllers;

use App\Models\Module;
use App\Models\Project;
use App\Models\Camera;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Modulebon\Modulebon;
use Illuminate\Support\MessageBag;
use Encore\Admin\Widgets\Table;

class ProjectController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '项目管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Module());

        $grid->model()->orderBy('order', 'desc');
        $grid->expandFilter();

        $grid->column('id', __('Id'));
        $grid->column('name', __('项目名称'));
        $grid->column('order', __('排序'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Module());
        $form->text('id')->readonly();
        $form->text('name','项目名称')->setWidth(7, 2)->required();
        $form->text('order', __('排序'));

        return $form;
    }
}
