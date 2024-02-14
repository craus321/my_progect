<?php

namespace App\Http\Controllers;
use TCG\Voyager\Models\Category;


use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Comment;
use TCG\Voyager\Models\Post;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index_blog()
    {
        Carbon::setLocale('ru');

        $posts = DB::table('posts')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'users.name as author_name', 'categories.name as category_name', DB::raw('COUNT(comments.id) as comment_count'))
            ->groupBy('posts.id', 'users.name', 'categories.name')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(5);

        $categories = DB::table('categories')->get();

        $tags = DB::table('posts')
            ->distinct()
            ->pluck('meta_keywords')
            ->flatMap(function ($tags) {
                return explode(',', $tags);
            })
            ->unique()
            ->values();

        return view('blog.blog', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }

    public function index_blog_new($id)
    {

        Carbon::setLocale('ru');

        $post = DB::table('posts')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->select('posts.*', 'users.name as author_name')
            ->where('posts.id', '=', $id)
            ->first();

        $comments = Comment::where('post_id', $id)->get();



        $posts = Post::orderBy('created_at', 'desc')->take(5)->get();

        $tags = explode(',', $post->meta_keywords);

        $commentCount = $comments->count();

        return view('blog.blog_new', ['post' => $post, 'posts' => $posts, 'comments' => $comments, 'commentCount' => $commentCount, 'tags' => $tags]);
    }


    public function store(Request $request, $postId)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id', // Добавьте валидацию для post_id
            'message' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->input('post_id'); // Используйте post_id из запроса
        $comment->user_id = auth()->id();
        $comment->message = $request->input('message');
        $comment->save();

        $comment->load('user');
        $comment->created_at_formatted = Carbon::parse($comment->created_at)->isoFormat('LL LT');

        return response()->json(['success' => true, 'comment' => $comment]);
    }


    public function indexByCategory($categoryId)
    {
        Carbon::setLocale('ru');
        $posts = DB::table('posts')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->where('categories.id', '=', $categoryId)
            ->select('posts.*', 'users.name as author_name', 'categories.name as category_name', DB::raw('COUNT(comments.id) as comment_count'))
            ->groupBy('posts.id', 'users.name', 'categories.name')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(5);

        $categories = DB::table('categories')->get();

        // Добавление выборки тегов
        $tags = DB::table('posts')
            ->distinct()
            ->pluck('meta_keywords')
            ->flatMap(function ($tags) {
                return explode(',', $tags);
            })
            ->unique()
            ->values();

        return view('blog.blog', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }


    public function indexByTag($tag)
    {  Carbon::setLocale('ru');
        $posts = DB::table('posts')
            ->join('users', 'posts.author_id', '=', 'users.id')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
            ->where('posts.meta_keywords', 'LIKE', '%' . $tag . '%')
            ->select('posts.*', 'users.name as author_name', 'categories.name as category_name', DB::raw('COUNT(comments.id) as comment_count'))
            ->groupBy('posts.id', 'users.name', 'categories.name')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(5);

        $categories = DB::table('categories')->get();

        $tags = DB::table('posts')
            ->distinct()
            ->pluck('meta_keywords')
            ->flatMap(function ($tags) {
                return explode(',', $tags);
            })
            ->unique()
            ->values();

        return view('blog.blog', ['posts' => $posts, 'categories' => $categories, 'tags' => $tags]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        // Используйте Eloquent для поиска статей
        $posts = Post::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('body', 'like', '%' . $searchTerm . '%')
            ->get();

        // Получаем количество комментариев для каждого поста
        $commentCount = Comment::whereIn('post_id', $posts->pluck('id'))->count();

        // Получаем первый пост из результата поиска, если он не пуст
        $post = $posts->isNotEmpty() ? $posts->first() : null;

        // Получаем все категории
        $categories = Category::all();

        // Получаем все теги
        $tags = Tag::all();

        // Получаем все комментарии для отображения в блоге
        $comments = Comment::with('user')->whereIn('post_id', $posts->pluck('id'))->get();

        // Передаем данные в представление
        return view('blog.blog_new', compact('post', 'searchTerm', 'categories', 'tags', 'commentCount', 'comments'));
    }



}

