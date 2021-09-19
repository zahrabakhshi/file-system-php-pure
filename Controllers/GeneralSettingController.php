<?php

class GeneralSettingController
{
    private GeneralSetting $general_setting;

    public function getGeneralSetting(){
        return $this->general_setting;
    }

    public function __construct()
    {
        $this->general_setting = new GeneralSetting();
        $this->general_setting->fetchSettings();
    }

    public function renderGeneralSettingView()
    {

        require_once '/home/zahra/PhpstormProjects/filesale/Views/general-setting.php';

    }

    public function addFileType(string $file_type)
    {
        $this->general_setting->file_type_allowed[] = $file_type;
        $this->general_setting->updateSetting();
        $this->renderGeneralSettingView();
    }

    public function deleteFileType(string $file_type)
    {
        $key = array_search($file_type , $this->general_setting->file_type_allowed);
        unset($this->general_setting->file_type_allowed[$key]);
        $this->general_setting->updateSetting();
        $this->renderGeneralSettingView();

    }

    public function editFileType(string $old_file_type, string $new_file_type)
    {

        $new_file_type_arr = [];
        foreach ($this->general_setting->file_type_allowed as $file_type) {
            if ($file_type != $old_file_type) {
                $new_file_type_arr[] = $file_type;
            } else{
                $new_file_type_arr[] = $new_file_type;
            }
        }
        $this->general_setting->file_type_allowed= $new_file_type_arr;
        $this->general_setting->updateSetting();
        $this->renderGeneralSettingView();
    }

    public function editMaxUploadSize(int $max_size)
    {

        $this->general_setting->file_max_size = $max_size;
        $this->general_setting->updateSetting();
        $this->renderGeneralSettingView();

    }

    public function editGustFileStorageTime(int $max_time)
    {
        $this->general_setting->max_guest_file_storage_time = $max_time;
        $this->general_setting->updateSetting();
        $this->renderGeneralSettingView();

    }

}