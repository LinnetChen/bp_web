<?php

namespace App\Admin\Controllers;

use App\Models\announcement;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class announcementController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '公告管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new announcement());
        $grid->model()
            ->orderBy('open', 'desc')
            ->orderBy('sort', 'desc')
            ->orderBy('created_at', 'desc');
        $grid->column('title', __('標題'));
        $grid->column('cate', __('分類'))->using(['activity' => '活動', 'system' => '系統']);
        $grid->column('sort', __('排序(大到小)'));
        $grid->column('open', __('是否開啟'))->using(['Y' => '開啟', 'N' => '關閉'])->label(['N' => 'default', 'Y' => 'danger']);

        $grid->column('created_at', __('對外時間'))->display(function () {
            $time = date('Y-m-d H:i:s', strtotime($this->created_at));
            return $time;
        });
        $grid->column('updated_at', __('更新時間'))->display(function () {
            $time = date('Y-m-d H:i:s', strtotime($this->updated_at));
            return $time;
        });
        $grid->disableRowSelector();

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
        $show = new Show(announcement::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
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
        $form = new Form(new announcement());

        $form->text('title', __('標題'));
        $form->ckeditor('content', __('內文'));
        $form->radio('cate', __('分類'))->options(['activity' => '活動', 'system' => '系統']);
        $form->radio('open', __('是否開啟'))->options(['N' => '關閉', 'Y' => '開啟']);
        $form->number('sort', __('排序'));

        //表單按鈕關閉
        $form->disableEditingCheck();
        $form->disableViewCheck();
        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
        });
        $form->datetime('created_at', __('發佈日期'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
