<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\LoginReminder;
use App\Models\User;
use Carbon\Carbon;

class SendLoginReminderEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $title;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $title)
    {
        $this->email = $email;
        $this->title = $title;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $details = [
        //     'title' => 'Hace tiempo que no sabemos nada de ti',
        //     'body' => '¿Cómo estás? Vemos que hace 7 días no te conectas a la plataforma.'
        // ];

        // $limit = Carbon::now()->subDay(7);
        // $inactive_users = User::where('last_login', '<', $limit)->get();

        // $details = [
        //     'title' => $this->title,
        //     'body' => $this->body
        // ];

        $mail = new LoginReminder($this->title);

        // foreach( $this->inactive_users as $user ){
        //     Mail::to($user->email)->send($mail);
        // }

        Mail::to($this->email)->send($mail);

        // Mail::to('ramon.fabian@mt.gob.do')->send($mail);
    }
}
