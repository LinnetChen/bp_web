<?php

namespace App\Admin\Controllers;

use App\Models\preregLog;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PreregLogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '事前預約-投票Log';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new preregLog());
        $grid->model()->latest();
        // $grid->model()->orderby('created_at','desc');

        $grid->column('ip', __('Ip'));
        $grid->column('choose', __('選擇'))->using(['bao' => '籠包汪', 'hero' => '英雄汪'])->sortable();

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
        $show = new Show(preregLog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('ip', __('Ip'));
        $show->field('choose', __('Choose'));
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
        $form = new Form(new preregLog());

        $form->ip('ip', __('Ip'));
        $form->text('choose', __('Choose'));

        return $form;
    }
}
