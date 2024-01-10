<?php

namespace WibesoftCompany\LaravelRequestDefault\Traits;

trait InputDefaulter
{
    protected function passedValidation(): void
    {
        $this->defaulter();
    }


    protected function defaulter()
    {
        $defaults = $this->defaults();
        foreach ($defaults as $key => $value) {
            if (!$this->has($key)) {
                $this->merge([$key => $value]);
            }
        }
    }
}
