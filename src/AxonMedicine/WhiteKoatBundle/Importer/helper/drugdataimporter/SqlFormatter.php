<?php

/**
 * Formats mysql SQL selects, inserts, updates, and deletes
 *
 * @author cjscript
 */
class SqlFormatter
{

    static function makeInsert($table, $input)
    {
        $query = \SqlFormatter::wrapInsert($table, $input);

        return $query;
    }

    static function makeUpdate($table, $input)
    {
        
    }

    static function makeSelect($table, $cols, $whereItems = null)
    {
        $count = 0;

        $colFields = "";
        $whereFields = "1";

        foreach ($cols as $col)
        {
            if ($count++ > 0)
            {
                $colFields .= ', ';
            }
//            $col = mysql_real_escape_string($col);
            $colFields .= "`$col`";
        }
        $count = 0;
        if (!empty($whereItems))
        {
            foreach ($whereItems as $whereLeft => $whereRight)
            {
//                $whereRight = mysql_real_escape_string($whereRight);

                $whereFields .= " AND `$whereLeft`='$whereRight'";
            }
        }
        return "SELECT $colFields FROM `$table` WHERE $whereFields";
    }

    static function makeInnerSelect($table, $cols, $whereItems)
    {
        return "##(" . \SqlFormatter::makeSelect($table, $cols, $whereItems) . ")##";
    }

    static function makeDelete($table, $input)
    {
        
    }

    private static function wrapInsert($table, $input)
    {
        $count = 1;
        $colFields = '`Id`';
        $valFields = 'GETID()';

        if (array_key_exists('Id', $input))
        {
            $count = 0;
            $colFields = '';
            $valFields = '';
        }

        foreach ($input as $col => $val)
        {
//            $col = mysql_real_escape_string($col);
//            $val = mysql_real_escape_string($val);

            if ($count++ > 0)
            {
                $colFields .= ', ';
                $valFields .= ', ';
            }

            $colFields .= "`$col`";
            $valFields .= "'$val'";
        }
        $colFields .= ",`Version`";
        $colFields .= ",`CreatedBy`";
        $valFields .= ",'1'";
        $valFields .= ",'importer'";

        $colFields = "(" . $colFields . ")";
        $valFields = "(" . $valFields . ")";

        return "INSERT INTO `$table` $colFields VALUES $valFields ;";
    }

    static function makeType($type)
    {
        return \SqlFormatter::makeInnerSelect("Librarytype", array("Id"), array("Name" => $type));
    }

}
