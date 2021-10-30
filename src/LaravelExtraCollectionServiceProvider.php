<?php

namespace Emrul1875\LaravelExtraCollection;

use Illuminate\Support\ServiceProvider;
use Emrul1875\LaravelExtraCollection\LaravelExtraCollection;
use Illuminate\Database\Eloquent\Collection;

class LaravelExtraCollectionServiceProvider extends ServiceProvider {
    public function boot() {
        Collection::macro('prependValue', function ($data, $isNotNull = false) {
            $le = new LaravelExtraCollection($this);
            return $le->prependValue($data, $isNotNull);
        });

        Collection::macro('appendValue', function ($data, $isNotNull = false) {
            $le = new LaravelExtraCollection($this);
            return $le->appendValue($data, $isNotNull);
        });

        Collection::macro('concatValue', function ($propname, $arrayOfFields, $delim = null) {
            $le = new LaravelExtraCollection($this);
            return $le->concatValue($propname, $arrayOfFields, $delim);
        });

        Collection::macro('at', function ($index) {
            $le = new LaravelExtraCollection($this);
            return $le->at($index);
        });

        Collection::macro('find', function ($callback) {
            $le = new LaravelExtraCollection($this);
            return $le->find($callback);
        });

        Collection::macro('findIndex', function ($callback) {
            $le = new LaravelExtraCollection($this);
            return $le->findIndex($callback);
        });
    }

    public function register() {
        
    }
}