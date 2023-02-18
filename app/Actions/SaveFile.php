<?php


namespace App\Actions;


class SaveFile extends Action
{
    protected $file;
    protected $directory;
    public function __construct($file,$directory)
    {
        $this->file = $file;
        $this->directory = $directory;
    }
    public function __invoke(): string
    {
        $extension = $this->file->getClientOriginalExtension();
        $filename =time().mt_rand(1000,9999).'.'.$extension;
        $this->file->move(public_path("img/$this->directory/"), $filename);
        return  "img/$this->directory/".$filename;
    }

}
