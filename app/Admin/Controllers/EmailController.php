<?php

namespace App\Admin\Controllers;

use App\Models\Email;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EmailController extends BaseAdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Email';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Email());
        $grid->model()->orderBy('created_at', 'desc');
        $grid->column('id', __('Id'));
        $grid->column('email', __('Email'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->actions(function ($actions) {
            $actions->disableEdit();   // ❌ bỏ Edit
            // $actions->disableView(); // (nếu muốn bỏ luôn View)
            // delete vẫn giữ mặc định
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
        $show = new Show(Email::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('email', __('Email'));
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
        $form = new Form(new Email());

        $form->text('title', __('Name'));
        $form->date('date', 'Ngày')
            ->default(date('Y-m-d'))
            ->rules('required');
        $form->switch('status', __('Status'))->default(1);
        return $form;
    }
}
