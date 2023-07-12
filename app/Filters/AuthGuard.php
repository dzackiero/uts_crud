<?php

namespace App\Filters;

use App\Controllers\Home;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthGuard implements FilterInterface
{

    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $publicUrl = ['login*', 'register*','/'];
        $roleRestrictedUrl = [
            'Super Admin' => [''],
            'Admin' => ['admin/employees*'],
            'User' => ['admin*'],
        ];

        // Public Accesable Check
        if($this->hasUrl($publicUrl)){
            return;
        }

        // Is Public
        if (!$this->isLogin()) {
            return redirect()->to(url_to('login'));
        }

        // Role filter (Dont Have Permission)
        if($this->hasUrl($roleRestrictedUrl[$this->getRole()])){
            return redirect()->to(url_to('home'));
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
    
    /**
     * hasUrl
     *
     * @param  array $urls
     * @return boolean
     */
    public function hasUrl($urls)
    {  
        foreach($urls as $url){
            if (url_is($url)) {
                return true;
            }
        }

        return false;
    }


    /**
     * men-check apakah user termasuk di dalam role(s) yang dijadikan parameter. 
     * akan mengembalikan TRUE jika $role == $userRole
     *
     * @param string $roles
     * @return boolean
     */
    function hasRole(...$roles){
        
        foreach ($roles as $role) {
        if ($role == getRole()) {
            return true;
        }
        }

        return false;
    }  
    
    /**
     * isLogin
     *
     * @return boolean|null
     */
    function isLogin(){
        return session()->get('isLoggedIn');
    }


    /**
     * Mengambil role user. Jika tidak ada akan mengembalikan NULL
     *
     * @return string|null
     */
    function getRole(){
        return session()->get('role');
    }

}
