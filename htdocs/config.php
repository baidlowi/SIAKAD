<?php //Menyambungkan web dengan database

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = 'sql113.byetcluster.com';
$CFG->dbname    = 'epiz_31707062_26';
$CFG->dbuser    = '31707062_6';
$CFG->dbpass    = 'K8)30upSN]';
$CFG->prefix    = 'mdlx4_';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => '',
  'dbsocket' => '',
  'dbcollation' => 'utf8_general_ci',
);

$CFG->wwwroot   = 'http://sistem-akademik.epizy.com/02';
$CFG->dataroot  = '/home/vol5_7/epizy.com/epiz_31707062/siakad';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');
