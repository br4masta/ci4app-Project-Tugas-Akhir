<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
    public function index()
    {
        helper(['form']);
        return view('login/index');
    } 

    public function login()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $email)->first();
        if($data){
            $username = $data['username'];
            $pass = $data['password'];
            $level = $data['level'];
            //log-in sebagai admin
            if(($pass == $password)&&($level == "1")){
                $ses_data = [
                    'user_id'       => $data['id_user'],
                    'username'      => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin');
            }
            //log-in sebagai dosen
            elseif(($pass == $password)&&($level == "2")){
                $ses_data = [
                    'user_id'       => $data['id_user'],
                    'username'      => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dosen');
            }
            //log-in sebagai mahasiswa
            elseif(($pass == $password)&&($level == "3")){
                $ses_data = [
                    'user_id'       => $data['id_user'],
                    'username'      => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/mahasiswa');
            }
            //log-in sebagai dosen penguji
            elseif(($pass == $password)&&($level == "4")){
                $ses_data = [
                    'user_id'       => $data['id_user'],
                    'username'      => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dosenpenguji');
            }
            //log-in sebagai kaprodi
            elseif(($pass == $password)&&($level == "5")){
                $ses_data = [
                    'user_id'       => $data['id_user'],
                    'username'      => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/kaprodi');
            }
           
            //log-in jika user diblokir
            elseif(($pass == $password)&&($level == "6")){
                $session->setFlashdata('msg', "Akun Atas Nama <strong>'$username'</strong> NON-AkTIF Silahkan Hubungi Email Kami
                unitomo.ac.id");
                return redirect()->to('/Auth');
            }
            else{
                $session->setFlashdata('msg', 'Silahkan mencoba Lagi! Password Anda salah');
                return redirect()->to('/Auth');
            }
        }else{
            $session->setFlashdata('msg', 'Maaf Akun Anda belum terdaftar dalam sistem Silahkan Hubungi Email Kami
            unitomo.ac.id');
            return redirect()->to('/Auth');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Auth');
    }
}   