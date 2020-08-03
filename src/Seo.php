<?php

namespace Jwohlfert23\LaravelSeo;

use Illuminate\Support\Arr;

class Seo
{
    protected $meta = [];
    protected $separator = ' - ';

    public function setAbsoluteTitle($bool = true)
    {
        Arr::set($this->meta, 'absolute_title', $bool);
        return $this;
    }


    public function setOgTitle($bool = true)
    {
        Arr::set($this->meta, 'og_title', $bool);
        return $this;
    }

    public function setOgDescription($bool = true)
    {
        Arr::set($this->meta, 'og_description', $bool);
        return $this;
    }

    public function setTitle($value)
    {
        if (is_array($value))
            $value = implode($this->separator, $value);

        Arr::set($this->meta, 'title', $value);
        return $this;
    }

    public function prependTitle($value, $separator = ' - ')
    {
        $title = Arr::get($this->meta, 'title');
        Arr::set($this->meta, 'title', $value . $separator . $title);
        return $this;
    }

    public function setImage($value, $width = null, $height = null)
    {
        Arr::set($this->meta, 'image', $value);

        if ($width) {
            Arr::set($this->meta, 'image_width', (int)$width);
        }
        if ($height) {
            Arr::set($this->meta, 'image_height', (int)$height);
        }
        return $this;
    }

    public function setDescription($value)
    {
        Arr::set($this->meta, 'description', $value);
        return $this;
    }

    public function setAuthor($value)
    {
        Arr::set($this->meta, 'author', $value);
        return $this;
    }

    public function setKeywords($value)
    {
        Arr::set($this->meta, 'keywords', $value);
        return $this;
    }

    public function setUrl($value)
    {
        Arr::set($this->meta, 'url', $value);
        return $this;
    }

    public function setPublishedTime($value)
    {
        Arr::set($this->meta, 'published_time', $value);
        return $this;
    }

    public function setType($value)
    {
        Arr::set($this->meta, 'type', $value);
        return $this;
    }

    public function setProductAttribute($key, $value)
    {
        Arr::set($this->meta, 'product.' . $key, $value);
        return $this;
    }

    public function render()
    {
        $view = view('seo::meta', ['meta' => $this->meta])->render();

        return preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $view);

    }

}
