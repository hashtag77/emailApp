<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = DB::table('email_templates')->where('id', $this->data['template'])->first();
        if(!empty($user))
        {
            return $this->from('sagrawal2830@gmail.com')->subject($user->template_name)->markdown('name')->with([
                            'first_name' => $this->data['first_name'],
                            'last_name' => $this->data['last_name'],
                            'email' => $this->data['email'],
                            'phone' => $this->data['phone'],
                            'address' => $this->data['address'],
                            'city' => $this->data['city'],
                            'state' => $this->data['state'],
                            'country' => $this->data['country'],
                            'template_name' => $user->template_name,
                            'user_template' => $user->template_layout,
                        ]);
        }
        else
        {

            $template = '<html><body><h2>Email Template</h2><div class="container" style="padding: 20px;background-color: #f1f1f1;"><h2>Welcome,</h2><p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum.</p></div></body></html>';
            return $this->from('sagrawal2830@gmail.com')->subject($user->template_name)->markdown('name')->with([
                            'first_name' => $this->data['first_name'],
                            'last_name' => $this->data['last_name'],
                            'email' => $this->data['email'],
                            'phone' => $this->data['phone'],
                            'address' => $this->data['address'],
                            'city' => $this->data['city'],
                            'state' => $this->data['state'],
                            'country' => $this->data['country'],
                            'template_name' => $user->template_name,
                            'user_template' => $template,
                        ]);
        }
    }
}
