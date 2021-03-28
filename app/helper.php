<?php
    use App\model\Type;
    use App\User;
    use App\model\Reply;
    use App\model\Post;
    use App\model\Comment;
    use App\model\Tag;
    use Illuminate\Support\Facades\URL;

    function infoContact() {
        return User::where('is_admin', 1)->first();
    }

    function listMenu() {
        return Type::all();
    }

    function commentLastest() {
        return Comment::orderBy('id', 'DESC')->take(6)->get();
    }

    function listTags() {
        return Tag::all();
    }

    function getTotalReplies($article) {
        $comment_ids = $article->comments->pluck('id')->toArray();
        $replies = Reply::whereIn('comment_id', $comment_ids)->get();
        return count($comment_ids) + count($replies);
    }

    function firstCharacterOfName($name) {
        return strtoupper(substr($name, 0, 1));
    }


    function loadImage($image) {
        if ($image) {
            return URL::to('/').'/images/'.$image;
        } else {
            return URL::to('/').'/images/default-image.jpg';
        }
    }

