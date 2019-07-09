<?php
namespace App\Console; use App\System; use Carbon\Carbon; use Illuminate\Console\Scheduling\Schedule; use Illuminate\Foundation\Console\Kernel as ConsoleKernel; use Illuminate\Support\Facades\DB; use Illuminate\Support\Facades\Log; use Illuminate\Support\Facades\Schema; class Kernel extends ConsoleKernel { protected $commands = array(); protected function schedule(Schedule $spba8a1c) { if (!app()->runningInConsole()) { return; } if (System::_getInt('order_clean_unpay_open') === 1) { $sp135b94 = System::_getInt('order_clean_unpay_day', 7); $spba8a1c->call(function () use($sp135b94) { echo '[' . date('Y-m-d H:i:s') . "] cleaning unpaid orders({$sp135b94} days ago)...\n"; \App\Order::where('status', \App\Order::STATUS_UNPAY)->where('created_at', '<', (new Carbon())->addDays(-$sp135b94))->delete(); $sp06fc7d = '[' . date('Y-m-d H:i:s') . '] unpaid-orders cleaned 
'; echo $sp06fc7d; })->dailyAt('01:00'); } $spba8a1c->call(function () { $sp135b94 = 7; echo '[' . date('Y-m-d H:i:s') . "] cleaning deleted cards({$sp135b94} days ago)...\n"; \App\Card::onlyTrashed()->where('deleted_at', '<', (new Carbon())->addDays(-$sp135b94))->forceDelete(); $sp06fc7d = '[' . date('Y-m-d H:i:s') . '] deleted-cards cleaned
'; echo $sp06fc7d; })->dailyAt('02:00'); } protected function commands() { $this->load(__DIR__ . '/Commands'); require base_path('routes/console.php'); } }