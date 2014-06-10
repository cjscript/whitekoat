<?php

namespace db;

/**
 * Description of InitDb
 *
 * @author cjscript
 */
class InitDb
{

    public function init()
    {
        // refresh database
        $script = dirname(dirname(__FILE__)) . '/database/wk_db82332_1Qxdf/whitekoat.sql';
        $vals['db_host'] = '127.0.0.1';
        $vals['db_user'] = 'root';
        $vals['db_pass'] = '45drTweXsit24E3';
        $vals['db_name'] = 'whitekoat';

        $command = '/xampp/mysql/bin/mysql'
                . ' --host=' . $vals['db_host']
                . ' --user=' . $vals['db_user']
                . ' --password=' . $vals['db_pass']
                . ' --database=' . $vals['db_name']
                . ' --execute="SOURCE ' . $script . '"';
        shell_exec($command);
    }

}
