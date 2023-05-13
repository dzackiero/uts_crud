<?php
  
  /**
   * men-check apakah user termasuk di dalam role(s) yang dijadikan parameter. 
   * akan mengembalikan TRUE jika $role == $userRole
   *
   * @param string $roles
   * @return 
   */
  function hasRole(...$roles){
    
    foreach ($roles as $role) {
      if ($role == getRole()) {
        return true;
      }
    }

    return false;
  }  

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
  
  /**
   * Mengambil username user. Jika tidak ada akan mengembalikan NULL
   *
   * @return string|null
   */
  function getUsername(){
    return session()->get('username');
  }

  /**
   * Mengambil id user. Jika tidak ada akan mengembalikan NULL
   *
   * @return string|null
   */
  function getId(){
    return session()->get('id');
  }
  
    /**
   * Mengambil email user. Jika tidak ada akan mengembalikan NULL
   *
   * @return string|null
   */
  function getEmail(){
    return session()->get('email');
  }
