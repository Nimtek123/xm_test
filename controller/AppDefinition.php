<?php

class AppDefinition
{
    protected $validators;

    public function __construct(array $attributes = [])
    {
        $this->setAttributes($attributes);
    }

    private function setAttributes($attributes)
    {
        foreach ($attributes as $name => $value) {
            $this->{$name} = $value;
        }
    }

    public function getValidators()
    {
        return $this->validators;
    }
}
