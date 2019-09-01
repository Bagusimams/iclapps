<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'prodi_pi' => [
            'driver' => 'session',
            'provider' => 'prodi_pis',
        ],

        'prodi' => [
            'driver' => 'session',
            'provider' => 'prodis',
        ],

        'internship' => [
            'driver' => 'session',
            'provider' => 'internships',
        ],

        'student' => [
            'driver' => 'session',
            'provider' => 'students',
        ],

        'lecturer' => [
            'driver' => 'session',
            'provider' => 'lecturers',
        ],

        'staff' => [
            'driver' => 'session',
            'provider' => 'staff',
        ],

        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'prodi_pis' => [
            'driver' => 'eloquent',
            'model' => App\Models\ProdiPi::class,
        ],

        'prodis' => [
            'driver' => 'eloquent',
            'model' => App\Models\Prodi::class,
        ],

        'internships' => [
            'driver' => 'eloquent',
            'model' => App\Models\Internship::class,
        ],

        'students' => [
            'driver' => 'eloquent',
            'model' => App\Models\Student::class,
        ],

        'lecturers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Lecturer::class,
        ],

        'staff' => [
            'driver' => 'eloquent',
            'model' => App\Models\Staff::class,
        ],

        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'prodi_pis' => [
            'provider' => 'prodi_pis',
            'table' => 'prodi_pi_password_resets',
            'expire' => 60,
        ],

        'prodis' => [
            'provider' => 'prodis',
            'table' => 'prodi_password_resets',
            'expire' => 60,
        ],

        'internships' => [
            'provider' => 'internships',
            'table' => 'internship_password_resets',
            'expire' => 60,
        ],

        'students' => [
            'provider' => 'students',
            'table' => 'student_password_resets',
            'expire' => 60,
        ],

        'lecturers' => [
            'provider' => 'lecturers',
            'table' => 'lecturer_password_resets',
            'expire' => 60,
        ],

        'staff' => [
            'provider' => 'staff',
            'table' => 'staff_password_resets',
            'expire' => 60,
        ],

        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

];
