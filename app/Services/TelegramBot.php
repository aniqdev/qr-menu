<?php


namespace App\Services;


use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


class TelegramBot implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $message = null;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        self::send($this->message);
    }

    public static function job($message)
    {
    	self::dispatch($message);
    }

    public static function sendError($e)
    {
    	self::send([
			'error' => $e->getMessage(),
			'file' => $e->getFile(),
			'line' => $e->getLine(),
		]);
    }

    public static function jobError($e)
    {
    	self::job([
			'error' => $e->getMessage(),
			'file' => $e->getFile(),
			'line' => $e->getLine(),
		]);
    }

    public static function send($message)
    {
		try {
			$telegram_bot_token = config('app.telegram_bot_token');

			if (!$telegram_bot_token) {
				return;
			}

			$message = print_r($message, 1);
			$message = preg_replace('/^Array/', '', $message);
			$message = trim($message);

			$data = http_build_query([
				'chat_id' => '-1001881468318',
				'text' => $message,
				'parse_mode' => 'HTML',
			]);

			$send_message_url = 'https://api.telegram.org/bot'.$telegram_bot_token.'/sendMessage?' . $data;

			file_get_contents($send_message_url);
		} catch (Exception $e) {
			
		}
    }
}


/**
	Создание телеграм бота:
		botfather
		  /start
		  /newbot
		создать группу или канал
		добавить бота
		сделать его адимном
		написть в личку боту
		написать в чат
		https://api.telegram.org/bot<bot_token>/getUpdates
		посмотреть chat id -> -1001741099979
 */