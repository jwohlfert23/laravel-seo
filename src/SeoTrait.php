<?php namespace Jwohlfert23\LaravelSeo;

trait SeoTrait
{

    /**
     * @return Seo
     */
    public function seo()
    {
        return app('seo');
    }

}