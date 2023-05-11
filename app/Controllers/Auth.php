<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $helpers = ['user'];
    
    /**
     * Method untuk menampilkan View "login". Tempat untuk user
     * memasukan username dan password.
     *
     * @return void
     */
    public function login()
    {
        return view('pages/auth/login');
    }
    
    /**
     * Method yang digunakan untuk autentikasi user yang melakukan
     * percobaan login.
     *
     * @return void
     */
    public function authenticating()
    {
        // Inisialisasi Model User
        $userModel = new UserModel();

        // Mengambil data username dan password dari POST Request yang telah di submit user di view login
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        // Mencocokan username yang dimasukkan dengan yang ada di database
        // Jika ada, Simpan data row tersebut di variable $user
        $user = $userModel->where('username', $data['username'])->first();

        // Jika User ditemukan
        if($user){
            // Check apakah password yang dimasukkan dengan password
            // yang ada di database pada $user sama.
            $isPasswordCorrect = password_verify($data['password'] ?? '', $user['password']);

            // Jika Password Benar
            if ($isPasswordCorrect) {
                $role = 
                // Masukkan data user di variable Session
                // Agar dapat diakses di tiap page.
                session()->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'isLoggedIn' => TRUE
                ]);

                // Redirect ke halaman utama
                // return redirect()->to(url_to('home'));
                return "BERHASIL LOGIN";
            }
                // Jika Password salah, Berikan pesan dan redirect ke halaman login
                session()->setFlashdata('msg', 'Password is incorrect.');
                // return redirect()->to(url_to('login'));
                return "GAGAL LOGIN";
        }               
        
        // Jika Username tidak ditemukan, Berikan pesan dan redirect ke halaman login
        session()->setFlashdata('msg', 'Username is incorrect.');
        // return redirect()->to(url_to('login'));
        return "GAGAL LOGIN";
    }

        
    /**
     * Method untuk menampilkan View "register". Tempat untuk user
     * melakukan registrasi.
     *
     * @return void
     */
    public function register()
    {
        return view('pages/auth/register');
    }

    public function store()
    {
        // Inisialisasi Model User
        $userModel = new UserModel();
        
        // Peraturan untuk validasi form
        $rules = [
            'username' => 'required',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'passconf' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            
            //Jika tidak tervalidasi, maka tampilkan halaman register
            //dan sematkan error dari validasinya. 
            return redirect()->to(url_to('register'))->withInput(validation_errors());
        
        } else {

            // Jika berhasil validasi, maka simpan semua data di $data
            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                //Hashing password agar terenkripsi 
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];

            // Simpan data ke tabel user
            // Equivalen INSERT INTO USER VALUES ($DATA)
            $userModel->save($data);

            return redirect()->to(url_to('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(url_to('login'));
    }
}
