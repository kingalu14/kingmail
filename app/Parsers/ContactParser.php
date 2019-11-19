<?php
namespace App\Parsers;
use App\Contact;
use Auth;
use Cyberduck\LaravelExcel\Contract\ParserInterface;

class ContactParser implements ParserInterface
{
    public function transform($row, $header)
    {
        $model = new Contact();
        $model->fname = $row[0];
        $model->lname = $row[1];
        $model->email = $row[2];
        $model->user_id = Auth::user()->id;
        $model->bulk_id = $row[2];

        return $model;
    }
}  
 