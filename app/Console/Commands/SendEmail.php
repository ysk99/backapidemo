<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use App\Article;
use App\Eotime;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     * 例如：php artisan command:sendemail 来使用命令
     * @var string
     */
    protected $signature = 'command:sendemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //命令执行的函数
        $content = Eotime::findOrFail(1);
        $content_title = $content['title'];
        $content_days= $content['days'];
        // $article->delete();
        // 邮件模板文件
        $view  = 'emails.test';
        // 模板展示数据
        // $data  = ['content' => $content,];
        // $content = "测试一下邮件";
        $data  = [
            // 'content' => $content,
            'title' => $content_title,
            'days' => $content_days,
            // 'logo'    => 'https://gitee.com/phpspace/php-demo/raw/master/laravel-demo/public/static/images/qrcode_344.jpg',
        ];
        $toMail = "1309683435@qq.com";
        $subject = '邮件名称';
        // 添加附件
        // $attach = "/Users/wangtest/code/php-demo/laravel-demo/public/robots.txt";

        return Mail::send($view, $data, function ($message) use ($toMail, $subject) {
            $message->subject($subject);
            $message->to($toMail);
            // $message->attach($attach);
        });
    }
}
