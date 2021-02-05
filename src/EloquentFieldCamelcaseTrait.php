<?php


namespace ZoranWong\EloquentFieldCamelcase;


/**
 * @see laravel框架中使EloquentORM类库支持驼峰方式访问数据库字段
 * @property array $attributes
 * @property array $relations
 * @method getAttributeValue(string $name): mixed
 * @method setAttribute(string $name, mixed $value): boolean
 * @method getAttribute(string $name): mixed
 * */
trait EloquentFieldCamelcaseTrait
{
    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (($value = $this->getAttribute($name)) || ($value = $this[$name])) {
            return $value;
        }
        $key = upperCaseSplit($name, '_');
        return $this->getAttribute($key) ?? $this[$key];
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->setAttribute(upperCaseSplit($name, '_'), $value);
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
        return !!$this->{$name};
    }

    public function __unset($name)
    {
        // TODO: Implement __unset() method.
        if (!$this->getAttribute($name)) {
            $name = upperCaseSplit($name, '_');
        }
        unset($this->attributes[$name], $this->relations[$name]);
    }
}
