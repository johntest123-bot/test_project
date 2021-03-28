<?php
    use App\model\Type;
    use App\User;
    use App\model\Reply;
    use App\model\Comment;
    use Illuminate\Support\Facades\URL;


    function getInformations($types) {
        return Information::active()->where('information_category_id', $types)->orderBy('id', 'DESC')->take(6)->get();
    }

    function infoContact() {
        return User::where('is_admin', 1)->first();
    }

    function listMenu() {
        return Type::all();
    }

    function commentLastest() {
        return Comment::with('user')->orderBy('id', 'DESC')->take(6)->get();
    }

    function getInformationCategory($id) {
        return InformationCategory::whereId($id)->get()->first();
    }

    function getSuggestArticleCategories() {
        return ArticleCategory::active()->with('articles')->orderBy('id', 'ASC')->take(1)->get();
    }

    function getTotalReplies($article) {
        $comment_ids = $article->comments->pluck('id')->toArray();
        $replies = Reply::whereIn('comment_id', $comment_ids)->get();
        return count($comment_ids) + count($replies);
    }

    function firstCharacterOfName($name) {
        return strtoupper(substr($name, 0, 1));
    }

    function statusStr($status) {
        return
        [
            0 => 'Disabled',
            1 => 'Active'
        ][$status];
    }


    function loadImage($image) {
        if ($image) {
            return URL::to('/').'/images/'.$image;
        } else {
            return URL::to('/').'/images/default-image.jpg';
        }
    }

    function settingTypeText($type) {
        return
        [   
            0 => 'Số Điện thoại',
            1 => 'Giờ mở cửa',
            2 => '€ịa chỉ',
            3 => 'Hỗ trợ trực tuyến kinh doanh',
            4 => 'Hỗ trợ trực tuyến kĩ thuật',
            5 => 'Hỗ trợ trực tuyến bán hàng - bảo hành',
            6 => 'Tiêu đề trang',
            7 => 'Trợ giúp'
        ][$type];
    }

    function bannerTypeText($type) {
        return
        [
            0 => 'Logo',
            1 => 'Trên cùng bên phải',
            2 => 'Trên cùng bên trái',
            3 => 'Bên trái ngoài cùng',
            4 => 'Bên phải ngoài cùng',
            5 => 'Bên trái',
            6 => 'Bên phải',
            7 => 'Slider'
        ][$type];
    }

    function getNewestComments() {
        return Comment::with('user')->where('commentable_type', 'App\model\Product')->orderBy('id', 'DESC')->take(10)->get();
    }

    function getBanner($type) {
        if ($type == BannerType::Slider)
        {
            $slider = Banner::active()->where('type', $type)->first();
            return BannerItem::active()->where('banner_id', $slider->id)->get();
        }
        return Banner::active()->where('type', $type)->first();
    }

    function getSetting($type) {
        return Setting::where('type', $type)->first();
    }

    function getOnlineSupportSetting() {
        return Setting::with('onlineSupportInformations')->whereIn('type', onlineSupportSettingTypes())->get();
    }


    function getProductImageUrl($id) {
        $product = Product::findOrFail($id);
        if ($product->image_type == 1)
        {
            return $product->image;
        }
        else
        {
            if ($product->image) {
                return URL::to('/').'/images/'.$product->image;
            } else {
                return URL::to('/').'/images/default-image.jpg';
            }
        }
    }
    function clean_str($string) {
        $result = str_replace(array("\r", "\n", "\t", "\a"), '', $string);
		
        return $result;
     }

 
