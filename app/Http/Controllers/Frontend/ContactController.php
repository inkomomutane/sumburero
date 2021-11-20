<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;
use App\Models\Website;

class ContactController extends Controller
{
    public function index(){
        $website = Website::all();
        if($website->count() > 0 ) return view('frontend.contact.contact')->with('website',$website->first()); 
        return view('frontend.contact.contact')->with('website',null); 
    }
    public function sendMail(Request $request){
       $valid =  $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "message" => "required|string"]);
            
        try {
            $mail = Mail::create($valid);
            if($request->newslatter){ $mail->newslatter = true; $mail->save();}
            session()->flash('success', 'Mensagem enviada com sucesso. aguarde o nosso retorno. Obrigado!');
            return redirect()->route('contact');
        } catch (\Throwable $th) {
            session()->flash('error', 'Erro ao enviar mensagem, por favor tente novamente!');
            return redirect()->route('contact');
        }
    }

}
