<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Article;

class HomeController extends Controller
{
    public function adminHome()
    {
        $contacts = Contact::latest()->take(3)->get();
        return view('dashboard', compact('contacts'));
    }
 
    public function userHome()
    {
        $articles = Article::latest()->take(3)->get();
        return view('dashboard', compact('articles'));
    }
 
    public function home()
    {
        $articles = Article::latest()->take(9)->get();
        return view('home', compact('articles'));
    }
 
    public function allMessages()
    {
        $contacts = Contact::latest()->get();
        return view('all_messages', compact('contacts'));
    }
}