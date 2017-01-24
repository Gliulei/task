<?php
/**
 *
 * @author liu.lei_1206 <liu.lei_1206@immomo.com>
 * @since  2017-01-18
 */
namespace console;
use models\Task;
require '../init.php';
class GuardController {

}
$task = new Task();
$task->getList();
