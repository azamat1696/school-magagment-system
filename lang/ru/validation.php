<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute должен быть принят.',
    'accepted_if' => ':attribute должен быть принят, если :other :value.',
    'active_url' => ':attribute не является действительным URL.',
    'after' => ':attribute должен быть датой, после :date.',
    'after_or_equal' => ':attribute должен быть датой, после или равной :date.',
    'alpha' => ':attribute должен содержать только буквы.',
    'alpha_dash' => ':attribute должен содержать только буквы, цифры, тире и подчеркивания.',
    'alpha_num' => ':attribute должен содержать только буквы и цифры.',
    'array' => ':attribute должен быть массивом.',
    'before' => ':attribute должен быть датой, до :date.',
    'before_or_equal' => ':attribute должен быть датой, до или равной :date.',
    'between' => [
        'array' => ':attribute должен содержать от :min до :max элементов.',
        'file' => ':attribute должен быть между :min и :max килобайт.',
        'numeric' => ':attribute должен быть между :min и :max.',
        'string' => ':attribute должен содержать от :min до :max символов.',
    ],
    'boolean' => ':attribute должен быть true или false.',
    'confirmed' => ':attribute не совпадает с подтверждением.',
    'current_password' => 'Неверный пароль.',
    'date' => ':attribute не является действительной датой.',
    'date_equals' => ':attribute должен быть равен :date.',
    'date_format' => ':attribute не соответствует формату :format.',
    'declined' => ':attribute должен быть отклонен.',
    'declined_if' => ':attribute должен быть отклонен, если :other :value.',
    'different' => ':attribute и :other должны быть разными.',
    'digits' => ':attribute должен быть :digits цифр.',
    'digits_between' => ':attribute должен содержать от :min до :max цифр.',
    'dimensions' => ':attribute имеет недопустимые размеры изображения.',
    'distinct' => ':attribute имеет повторяющееся значение.',
    'doesnt_end_with' => ':attribute не должен заканчиваться ни одним из следующих значений: :values.',

    'doesnt_start_with' => ':attribute не может начинаться с одного из следующих: :values.',
    'email' => ':attribute должен быть действительным адресом электронной почты.',
    'ends_with' => ':attribute должен заканчиваться на один из следующих символов: :values.',
    'enum' => 'Выбранный :attribute недопустим.',
    'exists' => 'Выбранный :attribute недопустим.',
    'file' => ':attribute должен быть файлом.',
    'filled' => 'Поле :attribute должно содержать значение.',
    'gt' => [
        'array' => ':attribute должен содержать более :value элементов.',
        'file' => ':attribute должен быть больше :value килобайт.',
        'numeric' => ':attribute должен быть больше :value.',
        'string' => ':attribute должен содержать более :value символов.',
    ],
    'gte' => [
        'array' => ':attribute должен содержать :value элементов или более.',
        'file' => ':attribute должен быть больше или равен :value килобайт.',
        'numeric' => ':attribute должен быть больше или равен :value.',
        'string' => ':attribute должен содержать :value символов или более.',
    ],
    'image' => ':attribute должен быть изображением.',
    'in' => 'Выбранный :attribute недопустим.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => ':attribute должен быть целым числом.',
    'ip' => ':attribute должен быть действительным IP-адресом.',
    'ipv4' => ':attribute должен быть действительным IPv4-адресом.',
    'ipv6' => ':attribute должен быть действительным IPv6-адресом.',
    'json' => ':attribute должен быть действительной строкой JSON.',
    'lowercase' => ':attribute должен быть в нижнем регистре.',
    'lt' => [
        'array' => ':attribute должен содержать менее :value элементов.',
        'file' => ':attribute должен быть меньше :value килобайт.',
        'numeric' => ':attribute должен быть меньше :value.',
        'string' => ':attribute должен содержать менее :value символов.',
    ],
    'lte' => [
        'array' => ':attribute не должен содержать более :value элементов.',
        'file' => ':attribute должен быть меньше или равен :value килобайт.',
        'numeric' => ':attribute должен быть меньше или равен :value.',
        'string' => ':attribute должен содержать не более :value символов.',
    ],
    'mac_address' => ':attribute должен быть действительным MAC-адресом.',
    'max' => [
        'array' => ':attribute не может содержать более :max элементов.',
        'file' => ':attribute не должен быть больше :max килобайт.',
        'numeric' => ':attribute не должен быть больше :max.',
        'string' => 'Поле :attribute не должно содержать более :max символов.',
    ],

    'max_digits' => ':attribute должен содержать не более :max цифр.',
    'mimes' => ':attribute должен быть файлом типа: :values.',
    'mimetypes' => ':attribute должен быть файлом типа: :values.',
    'min' => [
        'array' => ':attribute должен содержать не менее :min элементов.',
        'file' => ':attribute должен иметь размер не менее :min килобайт.',
        'numeric' => ':attribute должен быть не менее :min.',
        'string' => ':attribute должен содержать не менее :min символов.',
    ],
    'min_digits' => ':attribute должен содержать не менее :min цифр.',
    'multiple_of' => ':attribute должен быть кратен :value.',
    'not_in' => 'Выбранный :attribute недействительный.',
    'not_regex' => 'Недопустимый формат :attribute.',
    'numeric' => ':attribute должен быть числом.',
    'password' => [
        'letters' => ':attribute должен содержать как минимум одну букву.',
        'mixed' => ':attribute должен содержать как минимум одну заглавную и одну строчную букву.',
        'numbers' => ':attribute должен содержать как минимум одну цифру.',
        'symbols' => ':attribute должен содержать как минимум один символ.',
        'uncompromised' => 'Указанный :attribute появился в утечке данных. Пожалуйста, выберите другой :attribute.',
    ],
    'present' => 'Поле :attribute должно быть заполнено.',
    'prohibited' => 'Поле :attribute запрещено.',
    'prohibited_if' => 'Поле :attribute запрещено, когда :other имеет значение :value.',
    'prohibited_unless' => 'Поле :attribute запрещено, если :other не находится в :values.',
    'prohibits' => 'Поле :attribute запрещает наличие :other.',
    'regex' => 'Недопустимый формат :attribute.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_array_keys' => 'Поле :attribute должно содержать записи для: :values.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other имеет значение :value.',
    'required_if_accepted' => 'Поле :attribute обязательно для заполнения, когда :other принят.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, если :other не находится в :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values присутствует.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values присутствуют.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values отсутствует.',

    'required_without_all' => 'Поле :attribute обязательно, если отсутствуют все :values.',
    'same' => 'Поля :attribute и :other должны совпадать.',
    'size' => [
        'array' => 'Поле :attribute должно содержать :size элементов.',
        'file' => 'Размер :attribute должен быть :size килобайт.',
        'numeric' => 'Поле :attribute должно быть равно :size.',
        'string' => 'Длина поля :attribute должна быть :size символов.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться с одного из следующих значений: :values.',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть допустимым часовым поясом.',
    'unique' => 'Поле :attribute уже занято.',
    'uploaded' => 'Не удалось загрузить :attribute.',
    'uppercase' => 'Поле :attribute должно быть в верхнем регистре.',
    'url' => 'Поле :attribute должно быть допустимым URL-адресом.',
    'uuid' => 'Поле :attribute должно быть допустимым UUID.',
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
