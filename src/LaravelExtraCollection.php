<?php

namespace Emrul1875\LaravelExtraCollection;
use Illuminate\Database\Eloquent\Collection;

class LaravelExtraCollection extends Collection {
    public $collection;
    public function __construct($collection) {
        $this->collection = $collection;
    }

    /**
     * 
     * Field - Value
     * ["key" => "value"]
     * ["value"]
     */
    public function prependValue($data, $isNotNull = false)
    {
        if (array() === $data) return $this->collection;
        if(is_array($data)) {
            return $this->collection->map(function($item, $key) use ($data, $isNotNull) {
                if (isset($data[$key])) {
                    if($isNotNull && $item->{$key}) {
                        $item->{$key} = $data[$key].$item->{$key};
                    } else if (!$isNotNull) {
                        $item->{$key} = $item->{$key} ? $data[$key].$item->{$key} : $data[$key];
                    }
                }
                return $item;
            });
        } else {
            return $this->collection->map(function($item) use ($data, $isNotNull) {
                if ($isNotNull && $item) {
                    $item = $data.$item;
                } else if (!$isNotNull) {
                    $item = $item ? $data.$item : $data;
                }
                return $item;
            });
        }
        
    }

    public function appendValue($data, $isNotNull = false)
    {
        if(is_array($data)) {
            if (array() === $data) return $this->collection;
            return $this->collection->map(function($item, $key) use ($data, $isNotNull) {
                if (isset($data[$key])) {
                    if($isNotNull && $item->{$key}) {
                        $item->{$key} = $item->{$key}.$data[$key];
                    } else if (!$isNotNull) {
                        $item->{$key} = $item->{$key} ? $item->{$key}.$data[$key] : $data[$key];
                    }
                }
                return $item;
            });
        } else {
            return $this->collection->map(function($item) use ($data, $isNotNull) {
                if ($isNotNull && $item) {
                    $item = $item.$data;
                } else if (!$isNotNull) {
                    $item = $item ? $item.$data : $data;
                }
                return $item;
            });
        }
        
    }


    public function concatValue($propname, $arrayOfProps, $delim = null) {
        if (!$propname) {
            return $this->collection;
        }
        if (is_array($arrayOfProps)) {
            return $this->collection->map(function($item) use ($propname, $arrayOfProps, $delim) {
                if (count($arrayOfProps) > 0)  {
                    $newprop = "";
                    $i = 1;
                    foreach($arrayOfProps as $prop) {
                        if (isset($item->{$prop})) {
                            $newprop .= $item->{$prop};
                            if ($delim && count($arrayOfProps) != $i) {
                                $newprop .= $delim;
                            }
                        }
                        $i++;
                    }
                    if ($newprop) {
                        $item->{$propname} = $newprop;
                    }
                }
                return $item;
            });
        } else {
            return $this->collection;
        }
    }

    public function at($index) {
        if ($index > -1) {
            return $this->collection[$index];
        } else {
            return $this->collection[$this->collection->count() + $index];
        }
    }

    public function find($callback) {
        $result = null;
        foreach ($this->collection as $key => $value) {
            $result = $callback($value, $key);
            if ($result) {
                return $value;
            }
        }
        return null;
    }

    public function findIndex($callback) {
        $result = null;
        foreach ($this->collection as $key => $value) {
            $result = $callback($value, $key);
            if ($result) {
                return $key;
            }
        }
        return -1;
    }
}