<?php
    /**
     * Created by JetBrains PhpStorm.
     * User: lulzgotskill
     */
class Registration
{
    private $databaseUsersTable;
    private $cryptMethod;
    private $showMessage;

    
    //
    public function setDatabaseUserTable($database_user_table)
    {
        $this->databaseUsersTable=$database_user_table;
    }
    
    
    public function setCryptMethod($crypt_method)
    {
        $this->cryptMethod=$crypt_method;
    }

    public function setCrypt($text_to_crypt)
    {
        switch($this->cryptMethod)
        {
            case 'md5': $text_to_crypt=trim(md5($text_to_crypt)); break;
            case 'sha1': $text_to_crypt=trim(sha1($text_to_crypt)); break;
        }
       return $text_to_crypt;
    }

    static public function setEscape($text_to_escape)
    {
        if(!get_magic_quotes_gpc()) $text_to_escape=mysql_real_escape_string($text_to_escape);
        return $text_to_escape;
    }
    

    public function setShowMessage($registration_show_message)
    {
        if(is_bool($registration_show_message)) $this->showMessage=$registration_show_message;
    }

    public function getMessage($message_text, $message_html_tag_open=null, $message_html_tag_close=null, $message_die=false)
    {
        if($this->showMessage)
        {
            if($message_die) die($message_text);
            else echo $message_html_tag_open . $message_text . $message_html_tag_close;
        }
    }

    // туду: валидейт как отдельный метод
    public function setUserRegistration()
    {
        //if(!$this->databaseUsersTable) $this->getMessage(';','','','true');
        $user_name=$this->setEscape($_POST['user_name']);
        $user_pass=$_POST['user_pass'];
        $user_confirm_pass=$_POST['user_confirm_pass'];
        $user_mail=$_POST['user_mail'];
        $user_confirm_mail=$_POST['user_confirm_mail'];
        $user_crypted_pass=$this->setCrypt($user_pass);
        $result_user_name=mysql_query("SELECT * FROM"." ".$this->databaseUsersTable." "."WHERE user_name='$user_name'");
        $result_user_mail=mysql_query("SELECT * FROM"." ".$this->databaseUsersTable." "."WHERE user_mail='$user_mail'");
        if((strlen($user_name)<6) or (strlen($user_name)>16)) $this->getMessage('Имя должно содержать от 6 до 16 символов');
        elseif(mysql_num_rows($result_user_name)) $this->getMessage('Имя уже занято');
        elseif((strlen($user_pass)<8) or (strlen($user_pass)>16)) $this->getMessage('Пароль должен содержать от 8 до 16 символов');
        elseif($user_pass!=$user_confirm_pass) $this->getMessage('Пароли не совпадают');
        elseif(mysql_num_rows($result_user_mail)) $this->getMessage('email уже используется');
        elseif($user_mail!=$user_confirm_mail) $this->getMessage('почта не совпадает');
        elseif(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{4,})+\.)+([a-zA-Z0-9]{2,})+$/", $user_mail)) $this->getMessage('email некошерный');
        else
        {
            if(mysql_query("INSERT INTO"." ".$this->databaseUsersTable." "."(name, password, email) VALUES ('$user_name', '$user_crypted_pass', '$user_mail')")) $this->getMessage('Регистрация прошла успешно');
        }
    }

    public function Validate()
    {

    }
}

?>