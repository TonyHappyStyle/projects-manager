<?php

namespace App\Admin\Controllers;

use App\Models\Module;
use App\Models\ManageLog;
use App\Models\Camera;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Modulebon\Modulebon;
use Illuminate\Support\MessageBag;
use Encore\Admin\Widgets\Table;

class ModuleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '模块管理';

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
        $grid->column('name', __('模块名称'));
        $grid->column('order', __('排序'));
        $grid->column('description', __('描述'));
        $grid->column('test', __('测试地址'));
        $grid->column('yanshi', __('演示地址'));
        $grid->column('product', __('生产地址'));

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
        $form->text('name','名称')->setWidth(7, 2)->required();
        $form->text('order', __('排序'));
        $form->text('description', __('描述'));
        $form->text('test', __('测试地址'));
        $form->text('yanshi', __('演示地址'));
        $form->text('product', __('生产地址'));
        $form->select('project_id', __('项目'))->options('/api/projects');

        return $form;
    }
}
