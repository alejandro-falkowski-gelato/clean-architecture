<?php

/**
 * Routes
 *
 * PHP Version 7
 *
 * @category Todo
 * @package  Gelato
 * @author   Alejandro Falkowski <alejandro.falkowski@gelato.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     https://www.gelato.com/
 */

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $app->get(
        '/hello/{name}',
        function (Request $request, Response $response, array $args) {
            $name = $args['name'];
            $response->getBody()->write("Hello, $name");

            return $response;
        }
    );
};
