<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Email;
use App\Models\Keys;
use App\Models\Number;
use App\Models\Page;
use App\Models\Post;
use App\Models\Settings;
use App\Models\Slider;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use PHPUnit\Framework\Exception;

class HomeController extends Controller
{
    protected function formatDateVietnamese($dateInput) {
        // Chuyển thành timestamp
        $timestamp = strtotime($dateInput);

        // Mảng ngày trong tuần tiếng Việt
        $days = [
            'Chủ nhật',
            'Thứ hai',
            'Thứ ba',
            'Thứ tư',
            'Thứ năm',
            'Thứ sáu',
            'Thứ bảy'
        ];

        // Lấy thứ trong tuần (0 = CN, 1 = Thứ 2, ...)
        $dayOfWeek = date('w', $timestamp);

        // Định dạng ngày theo dd/mm/YYYY
        $formattedDate = date('d/m/Y', $timestamp);

        return $days[$dayOfWeek] . ', Ngày ' . $formattedDate;
    }

    /**
     * @return Factory|View|Application
     */
    public function index()
    {
        $sliders = Slider::where('status',1)->orderBy('order','asc')->get();
        return view('homes.index', [
            'sliders'=>$sliders
        ]);
    }
    public function category(string $slug = null)
    {
        // Danh sách category
        $cats = Category::where('status', 1)
            ->orderBy('order', 'ASC')
            ->get();

        // Nếu không có category nào
        if ($cats->isEmpty()) {
            abort(404);
        }

        // Category hiện tại
        $cat = $slug
            ? Category::where('slug', $slug)->where('status', 1)->firstOrFail()
            : $cats->first();

        // Bài viết theo category + phân trang
        $posts = Post::where('parent_id', $cat->id)
            ->where('status', 1)
            ->orderBy('order', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->paginate(6)
            ->withQueryString(); // giữ ?page, ?p, ?z...

        return view('homes.category', compact('cats', 'cat', 'posts'));
    }
    public function page(string $type, string $slug = null)
    {
        $typeMap = [
            'gioi-thieu' => 0,
            'tuyen-dung' => 1,
        ];
        $type = $typeMap[$type];
        $pages = Page::where('type', $type)->where('status', 1)->orderBy('order','asc')->get();
        $page = Page::where('type', $type);
        if($slug != ""){
            $page = $page->where('slug', $slug)->firstOrFail();
        }else{
            $page = $page->where('status', 1)->orderBy('order','asc')->firstOrFail();
        }
        return view('homes.page', [
            'title' => $type==0 ? __('lang.about'): __('lang.career'),
            'link' => url('/').'/'.($type==0 ? 'gioi-thieu': 'tuyen-dung'),
            'page' => $page,
            'pages' => $pages,
        ]);
    }
    public function products()
    {
        return view('homes.contact', []);
    }
    public function detail_product()
    {
        return view('homes.contact', []);
    }
    public function registerEmail()
    {
        $input = Request::all();
        if(empty(strip_tags($input['email']))){
            return Response::json(['status' => 'error', 'msg' => __('lang.plscheckInfo')], 201);
        }
        $check = Email::where('email',strip_tags($input['email']))->first();
        if(!empty($check->id)) {
            return Response::json(['status' => 'error', 'msg' => __('lang.emailexitx')], 201);
        }
        $email = new Email();
        $email->email = strip_tags($input['email']);
        $email->save();
        return Response::json(['status' => 'success', 'msg' => __('lang.registersuccess')], 200);
    }
    public function contact()
    {
        return view('homes.contact', []);
    }
    public function detail($slug='')
    {
        $post = Post::where('slug', $slug)->with('tags')->firstOrFail();
        $cat = Category::where('id', $post->parent_id)->firstOrFail();
        $cats = Category::where('status', 1)
            ->orderBy('order', 'ASC')
            ->get();

        $posts = Post::where('parent_id',$post->parent_id)->where('id','<>',$post->id)->where('status',1)->orderBy('order','ASC')->orderBy('updated_at','DESC')->limit(5)->get();
        return view('homes.detail', [
            'cat' => $cat,
            'cats' => $cats,
            'post' => $post,
            'posts' => $posts,
        ]);
    }

}
