<?php

namespace App\Admin\Controllers;

use App\Models\image;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class bannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '首頁BN管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new image());
        $grid->model()->orderBy('status', 'desc')->orderBy('sort', 'asc');
        $grid->column('file_name', __('圖片'))->image();
        $grid->column('sort', __('順序(小到大)'));
        $grid->column('status', __('狀態'))->using(['Y' => '開啟', 'N' => '關閉'])->label(['N' => 'default', 'Y' => 'danger']);

        $grid->disableRowSelector();
        $grid->disableFilter();
        $grid->disableExport();

        $grid->actions(function ($actions) {
            $actions->disableView();
            // $actions->disableEdit();
        });
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
        $show = new Show(image::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('file_name', __('File name'));
        $show->field('sort', __('Sort'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new image());
        $form->image('file_name', __('圖片'))->move('upload/index');
        $form->number('sort', __('Sort'));
        $form->select('status', __('Status'))->options(['N' => '關閉', 'Y' => '開啟'])->default('N');

        return $form;
    }
}
