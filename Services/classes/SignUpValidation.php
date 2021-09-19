<?php


class SignUpValidation
{
    private $email;
    private $phone_number;
    private $password;
    private $re_password;
    private array $errors;


    /**
     * SignUpValidation constructor.
     * @param $email
     * @param $phone_number
     * @param $password
     * @param $re_password
     */
    public function __construct($email, $phone_number, $password, $re_password)
    {
        $this->email = $email;
        $this->phone_number = $phone_number;
        $this->password = $password;
        $this->re_password = $re_password;
    }

    public function checkValidation()
    {

        if ($this->checkSet() &&
            $this->checkEmpty() &&
            $this->checkEmailValidation() &&
            $this->checkPhoneNumberFormat() &&
            $this->checkPassAndRePassMatch() &&
            $this->checkPassFromat()
        ) {

            return true;

        }else{

            return false;

        }

    }

    public function getErrors(){
        return $this->errors;
    }

    private function checkSet()
    {
        $return_value = true;
        if (!isset($this->email)) {
            $this->errors[] = 'عنصر ورودی نام کاربری باید ارسال شود';
            $return_value = false;
        }
        if (!isset($this->phone_number)) {
            $this->errors[] = 'عنصر ورودی شماره موبایل باید ارسال شود';
            $return_value = false;
        }
        if (!isset($this->password)) {
            $this->errors[] = 'عنصر ورودی رمز عبور باید ارسال شود';
            $return_value = false;
        }
        if (!isset($this->re_password)) {
            $this->errors[] = 'عنصر ورودی تکرار رمز عبور باید ارسال شود';
            $return_value = false;
        }
        return $return_value;
    }

    private function checkEmpty()
    {
        $return_value = true;

        if (empty($this->email)) {
            $this->errors[] = 'نام کاربری نمیتواند خالی باشد';
            $return_value = false;
        }
        if (empty($this->phone_number)) {
            $this->errors[] = 'شماره موبایل نمیتواند خالی باشد';
            $return_value = false;
        }
        if (empty($this->password)) {
            $this->errors[] = 'رمز عبور نمیتواند خالی باشد';
            $return_value = false;
        }
        if (empty($this->re_password)) {
            $this->errors[] = 'تکرار رمز عبور نمیتواند خالی باشد';
            $return_value = false;
        }
        return $return_value;
    }

    private function checkEmailValidation()
    {

        $return_value = true;
        $email_pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";

        if (!preg_match($email_pattern, $this->email)) {
            $this->errors[] = 'فرمت ایمیل وارد شده نا معتبر است';
            $return_value = false;
        }
        return $return_value;

    }

    private function checkPhoneNumberFormat()
    {

        $return_value = true;
        $phone_pattern = "/^(?:98|\+98|0098|0)?9[0-9]{9}$/";

        if (!preg_match($phone_pattern, $this->phone_number)) {
            $this->errors[] = 'فرمت موبایل وارد شده نا معتبر است';
            $return_value = false;
        }
        return $return_value;

    }

    private function checkPassFromat(){

        $return_value = true;
        $password_pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,}$/";

        if(!preg_match($password_pattern , $this->password)){

            $this->errors[] = 'رمز عبور باید حداقل چهار حرف و شامل حروف بزرگ و کوچک و اعداد باشد';
            $return_value = false;

        }

        return $return_value;
        
    }

    private function checkPassAndRePassMatch()
    {

        $return_value = true;
        if ($this->password != $this->re_password) {
            $this->errors[] = 'تکرار رمز عبور با رمز عبور مطابقت ندارد';
            $return_value = false;
        }
        return $return_value;
    }

}