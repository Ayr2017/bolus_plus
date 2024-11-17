<?php

namespace App\Providers;

use App\Rules\Text;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }


    /**
     * @return void
     */
    public function boot(): void
    {
        Validator::extend('text', function ($attribute, $value, $parameters, $validator)
        {
            $rule = new Text();
            $rule->validate($attribute, $value, function ($message) use ($validator, $attribute) {
                // Здесь вы вызываете функцию $fail через валидатор для добавления ошибки
                $validator->getMessageBag()->add($attribute, $message);
            });

            // Возвращаем true, чтобы остановить генерацию второго сообщения
            return true;

        });
    }
}
