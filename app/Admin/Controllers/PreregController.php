<?php

namespace App\Admin\Controllers;

use App\Models\prereg;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PreregController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '事前預約資料';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new prereg());
        $grid->model()->latest();
        $grid->column('mobile', __('手機號碼'));
        $grid->column('ip', __('Ip'));
        $grid->column('created_at', __('建立時間'));
        $grid->column('updated_at', __('更新時間'));
        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->equal('ip', 'Ip');
            $filter->between('created_at', 'created_at')->datetime();
        });
        $grid->disableRowSelector();
        $grid->disableActions();
        $grid->disableCreateButton();
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
        $show = new Show(prereg::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('mobile', __('Mobile'));
        $show->field('ip', __('Ip'));
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
        $form = new Form(new prereg());

        $form->mobile('mobile', __('Mobile'));
        $form->ip('ip', __('Ip'));

        return $form;
    }
}
