<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use App\Mail\ReservationReminderMail;
use Illuminate\Support\Facades\Mail;

class SendReservationReminders extends Command
{
    protected $signature = 'send:reservation-reminders';
    protected $description = 'Send reservation reminders to users.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = now()->format('Y-m-d');
        $reservations = Reservation::where('reserve_date', $today)->get();

        foreach ($reservations as $reservation) {
            Mail::to($reservation->user->email)->send(new ReservationReminderMail($reservation));
        }

        $this->info('リマインドメールを送信しました。');
    }
}
