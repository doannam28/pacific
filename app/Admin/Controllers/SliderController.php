<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Slider;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SliderController extends BaseAdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Ảnh slider';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Slider());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Tiêu đề'));
        $grid->column('image', __('Image'))->display(function ($thumbnail) {
            if (!$thumbnail) return '';
            return "<img src='".Storage::disk('admin')->url($thumbnail)."' style='max-width: 100px; max-height: 100px;'>";
        });
        $grid->column('image_mobile', __('Image mobile'))->display(function ($thumbnail) {
            if (!$thumbnail) return '';
            return "<img src='".Storage::disk('admin')->url($thumbnail)."' style='max-width: 100px; max-height: 100px;'>";
        });
        $grid->column('order', __('Vị trí'))->integer();
        $grid->column('status', __('Status'))->switch();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Slider::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Tiêu đề'));
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
        $form = new Form(new Slider());
        $form->text('title', __('Tiêu đề'));
        $form->image('image', __('Image'))->rules('image|mimes:jpeg,png,jpg,gif,svg')
            ->name(function ($file) {
                return \App\Files\Storage::getFileName($file);
            })->required();
        $form->image('image_mobile', __('Image mobile'))->rules('image|mimes:jpeg,png,jpg,gif,svg')
            ->name(function ($file) {
                return \App\Files\Storage::getFileName($file);
            })->required();
        $form->number('order', __('Vị trí'))->default(0);
        $form->switch('status', __('Status'))->default(1);
        return $form;
    }
}
