<?php

namespace App\Models;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMailable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Mailing extends Model
{
    /* use HasFactory; */

    static function sendMail() {
       
        $correo = new ContactMailable;
      
        $sendemail = Mail::to('berta.liphoto@gmail.com')->send($correo);
    
        return "Mensaje Enviado";
    }
}