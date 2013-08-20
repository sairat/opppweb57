<?php
/**
 * Created by PhpStorm.
 * User: SAIRAT
 * Date: 13/8/2556
 * Time: 10:24 น.
 */
class Basics extends \Phalcon\Mvc\Model {
    public function render_json($json) {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        echo $json;
    }
}