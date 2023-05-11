<?php

  
  /**
   * Mengambil role user.
   *
   * @return string|null
   */
  function getRole(){
    return session()->get('role');
  }
  
  /**
   * Mengambil username user.
   *
   * @return string|null
   */
  function getUsername(){
    return session()->get('username');
  }

  /**
   * Mengambil id user.
   *
   * @return string|null
   */
  function getId(){
    return session()->get('id');
  }
  
    /**
   * Mengambil email user.
   *
   * @return string|null
   */
  function getEmail(){
    return session()->get('email');
  }
