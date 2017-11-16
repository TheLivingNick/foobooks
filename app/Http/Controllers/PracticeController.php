<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Debugbar;
use cebe\markdown\MarkdownExtra;
use App\Rules\AlphaAndSpaces;
use App\Book; # <----------- NEW

class PracticeController extends Controller
{
    public function practiceX()
    {
      $book = new Book();
      $books = $book->where('title', 'LIKE', '%Harry Potter%')->get();

      if ($books->isEmpty()) {
          dump('No matches found');
      } else {
          foreach ($books as $book) {
              dump($book->title);
          }
      }
    }

    public function practice7()
    {
      # Instantiate a new Book Model object
      $newBook = new Book();

      # Set the parameters
      # Note how each parameter corresponds to a field in the table
      $newBook->title = 'Harry Potter and the Sorcerer\'s Stone';
      $newBook->author = 'J.K. Rowling';
      $newBook->published = 1997;
      $newBook->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
      $newBook->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

      # Invoke the Eloquent `save` method to generate a new row in the
      # `books` table, with the above data
      $newBook->save();

      dump($newBook->toArray());
    }


    /**
    * Demonstration of a custom validation rule
    */
    public function practice6(Request $request)
    {

        $name = $request->input('name', null);

        $this->validate($request, [
            'name' => [new AlphaAndSpaces]
            #'name' => 'regex:/^[\pL\s\-]+$/u'
        ]);

        return view('practice.6')->with([
            'name' => $name,
        ]);
    }


    /**
    *
    */
    public function practice5()
    {
        $parser = new MarkdownExtra();
        echo $parser->parse('# Hello World');
    }


    /**
    *
    */
    public function practice4()
    {
        Debugbar::info($_GET);
        Debugbar::info(['a' => 1, 'b' => 2, 'c' => 3]);
        Debugbar::error('Error!');
        Debugbar::warning('Watch out…');
        Debugbar::addMessage('Another message', 'mylabel');
        return 'Practice 4';
    }

    /**
    *
    */
    public function practice3()
    {
        return view('abc');
    }


    /**
    *
    */
    public function practice2()
    {
        $email = config('mail');
        dump($email);
    }

    /**
    *
    */
    public function practice1()
    {
        dump('This is the first example.');
    }


    /**
    * ANY (GET/POST/PUT/DELETE)
    * /practice/{n?}
    *
    * This method accepts all requests to /practice/ and
    * invokes the appropriate method.
    *
    * http://foobooks.loc/practice/1 => Invokes practice1
    * http://foobooks.loc/practice/5 => Invokes practice5
    * http://foobooks.loc/practice/999 => Practice route [practice999] not defined
    */
    public function index($n = null)
    {
        # If no specific practice is specified, show index of all available methods
        if (is_null($n)) {
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    # Echo'ing display code from a controller is typically bad; making an
                    # exception here because:
                    # 1. This controller is for debugging/demonstration purposes only
                    # 2. This controller is introduced before we cover views
                    echo "<a href='".str_replace('practice', '/practice/', $method)."'>" . $method . "</a><br>";
                }
            }
            # Otherwise, load the requested method
        } else {
            $method = 'practice'.$n;

            if (method_exists($this, $method)) {
                return $this->$method();
            } else {
                dd("Practice route [{$n}] not defined");
            }
        }
    }
}
