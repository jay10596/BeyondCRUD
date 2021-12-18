<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helper\Helper;

class CardType extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'card:type';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will help user to determine the type of card';

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
     * @return int
     */
    public function handle()
    {
        // Ask a question 
        $name = $this->ask('Howdy, stranger! What is your name?');

        // Go through validation process
        $this->validation_process($name);
        
        while (1) 
        {
            // Confirm
            if ($this->confirm('Do you wish to try another card? [y|N]')) 
            {
                $this->validation_process($name);
            }
            else 
            {
                $this->line('Thank you for your time. See you soon!');
                break;
            }
        }
    }

    public function validation_process($name)
    {
        // Ask for sensitive information
        $card_no = $this->secret('Welcome ' . $name . ', what is your 16-digit card number? (no space)');

        // Check if the number is valid and then return type
        if(!preg_match('([a-zA-Z])', $card_no) && strlen($card_no) == 16)
        {
            if(Helper::is_valid($card_no))
            {
                $card_type = Helper::check_card_type($card_no[0]);
                $this->line('Successfully validated.');
                $this->line('Card Type: ' . $card_type);
            } 
            else 
            {
                $this->line('Error! The given card number is not valid.');
            }
        }
        else 
        {
            $this->line('Error! The card must have 16 digits without any letters.');
        }
    }
}
// 4360747031718010 