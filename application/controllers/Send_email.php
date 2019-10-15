<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {

    public function index(){
        $this->load->library('email');
        $this->email->initialize(array(
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.sendgrid.net',
            'smtp_user' => 'username_sendgrid_saya',  // Ganti dengan username akun SendGrid anda
            'smtp_pass' => 'password_sendgrid_saya',  // Ganti dengan password akun SendGrid anda
            'smtp_port' => 587,
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
        ));
        $this->email->from('no-replay@contoh.com', 'Blog cacan.id | Rony Chandra Kudus');
        $this->email->to('penerima@gmail.com'); // Ganti dengan email tujuan (penerima)
        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://i.imgur.com/lrJITeY.jpg');
        $this->email->subject('Send Email Dengan SMTP SendGrid CodeIgniter 3 | Blog cacan.id'); // Subject email
        $this->email->message("Ini adalah contoh email CodeIgniter3 yang dikirim menggunakan SMTP SendGrid.<br>"
                . "<br> Klik <strong><a href='https://blog.cacan.id/send-email-dengan-smtp-sendgrid-codeigniter-3/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");
        if ($this->email->send()){ // Tampilkan pesan sukses atau error
            echo 'Sukses! email berhasil dikirim.';
        }else{
            echo 'Error! email tidak dapat dikirim.';
        }
        echo $this->email->print_debugger(); // Debugging error
    }
}