<?php
/**
 * Created by PhpStorm.
 * User: humengtao
 * Date: 16/9/26
 * Time: 22:33
 */

namespace App\Http\Controllers\Web;


use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Records;
use App\User;
use Auth;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $username = $user->name;
        $articles = $user
            ->article()
            ->where('user_id', Auth::user()->id)
            ->get();
        $records = Records::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
        foreach ($articles as $article) {
            $article->comment_count = Comment::where('article_id', $article->id)->count();
        }
        foreach ($records as $record) {
            $record->title = Article::where('id', $record->article_id)->value('title');
        }
        return view('web.user-center', compact('username', 'articles', 'records'));
    }

    public function updateAvatar(Request $request)
    {
        $filename=$request->user()->email.'.png';
        Storage::disk('avatar')->put($filename, file_get_contents($request->file('avatar')->getRealPath()));
        if (Storage::disk('avatar')->exists($filename)){
            $url=asset(Storage::url("public/avatar/".$request->user()->email.'.png'));
            User::where('id',$request->user()->id)->update(['avatar_url'=>$url]);
            return redirect('/user');
        } else{
            return 'upload failed';
        }
    }
}