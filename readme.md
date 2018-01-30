### Laravel SEO


##### Installation

Install package

`composer require jwohlfert23/laravel-seo`

You can publish the config to change default setting like the base of your title, twitter handle, etc.

`php artisan vendor:publish --provider="Jwohlfert23\LaravelSeo\ServiceProvider"`

Add `Jwohlfert23\LaravelSeo\SeoTrait` to your base controller.  This will allow you to easily change the page title and other meta information directly from your controller like so...
```
public function index() 
{
    $this->seo()->setTitle('Home')->setDescription('This is out home page');
     
    return view('home');
}
```

Insert `app('seo')->render()` into the head of your layout like so...

```
<head>
....
{!! app('seo')->render() !}}
...
</head>
```

