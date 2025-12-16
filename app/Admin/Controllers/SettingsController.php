<?php

namespace App\Admin\Controllers;

use App\Models\Settings;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Request;

class SettingsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Settings';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Settings());
        $grid->disableCreation();
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableView();
        });
        return $grid;
    }
    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail()
    {
        $show = new Show(Settings::findOrFail(1));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone', __('Hotline'));
        $show->field('phone_display', __('Hiển thị hotline'));
        $show->field('phone2', __('Hotline2'));
        $show->field('phone2_display', __('Hiển thị hotline2'));
        $show->field('address', __('Địa chỉ'));
        $show->field('facebook', __('Facebook'));
        $show->field('youtube', __('Link youtube'));
        $show->field('tiktok', __('Link tiktok'));
        $show->field('email_receive', __('Email nhận liên hệ'));
        $show->field('site_title', __('Title website'));
        $show->field('meta_description', __('Meta description'));
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
        $form = new Form(new Settings());
        $setting = Settings::first();
        $content = isset($setting->content) ? json_decode($setting->content): '';
        $form->text('name','Tên website');
        $form->text('address', __('Địa chỉ'));
        $form->text('address_en', __('Địa chỉ (EN)'));
        $form->text('mst', __('M.S.D.N'));
        $form->text('phone', __('Điện thoại'));
        $form->text('email', __('Email'));
        $form->text('facebook', __('Facebook'));
        $form->text('youtube', __('Youtube'));
        $form->text('zalo', __('Zalo'));
        $form->text('email_receive', __('Email nhận liên hệ'));
        $form->image('logo', __('Logo'));
        $form->image('favicon', __('Favicon'));
        $form->image('image_og', __('Ảnh show trên social'));
        $form->image('img_soicau', __('Ảnh giới thiệu'));
        $form->tinyEditor('about', __('Mô tả giới thiệu'));
        $form->tinyEditor('about_en', __('Mô tả giới thiệu (EN)'));
        //$form->tinyEditor('textfooter', __('Text footer'));
        $form->image('img_lvkd1', __('Ảnh lĩnh vực kinh doanh 1'));
        $form->image('img_lvkd2', __('Ảnh lĩnh vực kinh doanh 2'));
        $form->image('img_lvkd3', __('Ảnh lĩnh vực kinh doanh 3'));
        $form->image('img_lvkd4', __('Ảnh lĩnh vực kinh doanh 4'));
        $form->image('img_lvkd_cd1', __('Ảnh lĩnh vực kinh doanh 5'));
        $form->image('img_lvkd_cd2', __('Ảnh lĩnh vực kinh doanh 6'));
        $form->image('img_lvkd_cd3', __('Ảnh lĩnh vực kinh doanh 7'));
        $form->tinyEditor('linhvuc', __('Text Lĩnh vực kinh doanh'));
        $form->tinyEditor('linhvuc_en', __('Text Lĩnh vực kinh doanh (EN)'));
        $form->image('image_tag', __('Ảnh hạt giống chất lượng cao'));
        $form->tinyEditor('texttag', __('Text hạt giống chất lượng cao'));
        $form->tinyEditor('texttag_en', __('Text hạt giống chất lượng cao (EN)'));
        $form->text('site_title', __('Tiêu đề website'));
        $form->text('meta_description', __('Meta description'));
        $form->hidden('content', __('Content'));
        //$form->image('img_soicau', __('Img soi cầu'));
        $form->text('googlemap', __('Google map'))->default($content->googlemap ?? "");
        //$form->tinyEditor('soicau1', __('Soi cầu 2'))->default($content->soicau1 ?? "");
        //$form->tinyEditor('text_run', __('Text chạy'))->default($content->text_run ?? "");
        $form->submitted(function (Form $form) {
            $content = [];
            $content['googlemap'] = Request::input('googlemap');
            //$content['soicau1'] = Request::input('soicau1');
            //$content['text_run'] = Request::input('text_run');
            $form->content = json_encode($content);
            $form->ignore('googlemap');
            //$form->ignore('soicau1');
            //$form->ignore('text_run');
        });
        return $form;
    }
}
