<?php

namespace App;

use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Category extends Eloquent
{
    //
            // define binary/blob fields
        protected $table = 'Category';
    // protected $binaries = ['id','name','email','password'];

    // define the sequence name used for incrementing
    // default value would be {table}_{primaryKey}_seq if not set
    protected $sequence = 'id';

}
