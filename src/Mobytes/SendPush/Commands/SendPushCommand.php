<?php

namespace Mobytes\SendPush\Commands;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Mobytes\SendPush\SendPush;

class SendPushCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'sendpush:send';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SendPush Command';

    protected $push;

    /**
     * Create a new command instance.
     * @param SendPush $push
     */
    public function __construct(SendPush $push)
    {
        parent::__construct();
        $this->push = $push;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $title      = $this->argument('title');
        $msg        = $this->argument('msg');

        $this->push->push($title, $msg);

        return $this->push->send();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['title', InputArgument::REQUIRED, 'Título de la notificación.'],
            ['msg', InputArgument::REQUIRED, 'Mensaje de la notificiación.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
//            ['url', null, InputOption::VALUE_OPTIONAL, 'URL to send.', null],
//            ['urltitle', null, InputOption::VALUE_OPTIONAL, 'URL Title to send.', null],
//            ['sound', null, InputOption::VALUE_OPTIONAL, 'Set notification Sound.', null],
//            ['device', null, InputOption::VALUE_OPTIONAL, 'Set a Device.', null],
//            ['priority', null, InputOption::VALUE_OPTIONAL, 'Set a Priority Message.', null],
//            ['retry', null, InputOption::VALUE_OPTIONAL, 'Set a Retry for the Priority.', null],
//            ['expire', null, InputOption::VALUE_OPTIONAL, 'Set an expire for the Priority.', null],
//            ['html', null, InputOption::VALUE_OPTIONAL, 'Sets if message should be sent as HTML.', null],
//            ['debug', null, InputOption::VALUE_NONE, 'Iniciar modo desarrollo', null],
        ];
    }
}