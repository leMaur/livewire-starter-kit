<?php

declare(strict_types=1);

test('globals')
    ->expect(['dd', 'ddd', 'die', 'dump', 'var_dump', 'sleep', 'usleep', 'exit', 'phpinfo', 'print_r', 'var_export'])
    ->toBeUsedInNothing();

test('strict types are used everywhere')
    ->expect('App')
    ->toUseStrictTypes();

test('models')
    ->expect('App\Models')
    ->toBeClasses()
    ->ignoring('App\Models\Concerns');

test('models extends base model')
    ->expect('App\Models')
    ->toExtend(Illuminate\Database\Eloquent\Model::class)
    ->ignoring('App\Models\Concerns');

test('models traits')
    ->expect('App\Models\Concerns')
    ->toBeTraits()
    ->toOnlyBeUsedIn('App\Models');

test('controllers')
    ->expect('App\Http\Controllers')
    ->toBeClasses()
//    ->toBeFinal()
    ->classes();
//    ->toExtendNothing();

test('commands')
    ->expect('App\Console\Commands')
    ->toExtend(Illuminate\Console\Command::class)
    ->toHaveMethod('handle');

test('jobs')
    ->expect('App\Jobs')
    ->toBeClasses()
//    ->toBeFinal()
    ->toImplement(Illuminate\Contracts\Queue\ShouldQueue::class)
    ->toUseTrait(Illuminate\Bus\Queueable::class)
    ->toHaveMethod('handle');

test('mail')
    ->expect('App\Mail')
    ->toBeClasses()
//    ->toBeFinal()
    ->toExtend(Illuminate\Contracts\Mail\Mailable::class)
//    ->toImplement(Illuminate\Contracts\Queue\ShouldQueue::class)
    ->toHaveMethod('envelope')
    ->toHaveMethod('content');

test('notifications')
    ->expect('App\Notifications')
    ->toBeClasses()
//    ->toBeFinal()
    ->toExtend(Illuminate\Notifications\Notification::class)
    ->toImplement(Illuminate\Contracts\Queue\ShouldQueue::class)
    ->toHaveMethod('via')
    ->toHaveMethod('toMail');
