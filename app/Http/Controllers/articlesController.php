<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\articles;
use App\Models\projects;

class ArticlesController extends Controller
{
    //Front page side
    public function articles()
    {
        $articles = articles::orderBy('published_date', 'desc')->paginate(5);
        return view('articles', ['articles' => $articles]);
    }

    public function article($article_id)
    {
        //pass the article_id to the view
        $article = articles::where('id', $article_id)->get();
        return view('article-view', ['article_list' => $article]);
    }

    



    //Admin Panel side
    public function ArticlesView()
    {
        $articles = articles::all();
        return view('admin.article-view', ['articles_list' => $articles]);
    }

    public function ArticlesAdd()
    {
        $projects = projects::all();
        return view('admin.article-add', ['projects_list' => $projects]);
    }

    public function ArticlesInsert(Request $request)
    {
        //validate the request
        $validatedData = $request->validate([
            'thumb_nail_title' => 'required | max:255',
            'project_id' => 'required',
            'content' => 'required',
            'thumb_nail_summary' => 'required | max:255',
            'thumb_nail_pic' => 'required | image | mimes:jpeg,png,jpg,gif | max:2048',
        ]);

        // Handle the image upload
        if ($request->hasFile('thumb_nail_pic')) {
            $image = $request->file('thumb_nail_pic');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/uploads/articles'), $imageName);
            $validatedData['thumb_nail_pic'] = 'assets/uploads/articles/' . $imageName;
        }

         // Create a new Articles model instance and fill it with the validated data
         $newArticle = new articles();
         $newArticle->fill($validatedData);
 
         // Save the new Article to the database
         $newArticle->save();

        return redirect()->route('admin.articlesView')->with('success', 'Article added successfully!');
    }

    public function ArticlesEdit($id)
{
    $article = articles::findOrFail($id);
    $projects_list = projects::all();

    return view('admin.article-edit', compact('article', 'projects_list'));
}

public function ArticlesUpdate(Request $request, $id)
{
    //validate the request
    $validatedData = $request->validate([
        'thumb_nail_title' => 'required|max:255',
        'project_id' => 'required',
        'content' => 'required',
        'thumb_nail_summary' => 'required|max:255',
        'thumb_nail_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Find the existing article
    $article = articles::findOrFail($id);

    // Handle the image upload
    if ($request->hasFile('thumb_nail_pic')) {
        // Delete the old image if it exists
        if ($article->thumb_nail_pic) {
            if (file_exists(public_path($article->thumb_nail_pic))) {
                unlink(public_path($article->thumb_nail_pic));
            }
        }

        $image = $request->file('thumb_nail_pic');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/uploads/articles'), $imageName);
        $validatedData['thumb_nail_pic'] = 'assets/uploads/articles/' . $imageName;
    }

    // Update the article with the validated data
    $article->update($validatedData);

    return redirect()->route('admin.articlesView')->with('success', 'Article updated successfully!');
}

public function ArticlesDelete(Request $request, $id)
{
    // Find the article
    $article = articles::findOrFail($id);

    // Delete the thumbnail image if it exists
    if ($article->thumb_nail_pic) {
        if (file_exists(public_path($article->thumb_nail_pic))) {
            unlink(public_path($article->thumb_nail_pic));
        }
    }

    // Delete the article
    $article->delete();

    return redirect()->route('admin.articlesView')->with('success', 'Article deleted successfully!');
}


}
