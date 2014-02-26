<?php
/**
 * Created by PhpStorm.
 * User: ricblt
 * Date: 26/02/14
 * Time: 10:14
 */

namespace joboffer\Core;


use joboffer\Controller\InputController;

require_once('Controller/InputController.php');
require_once('Core/Request.php');
require_once('Core/Response.php');

class FrontController
{
    private $formatToMimeType = array(
        'json' => 'application/json',
        'xml' => 'text/xml',
        'html' => 'text/html',
    );

    public function dispatch(Request $request)
    {
        $controller = new InputController($request);
        $action = $request->getAction();
        $data = $controller->$action();

        try {
            $nfq = new \Nfq_Smarty();
            $nfq->assign($data);
            $output = $nfq->fetch($request->getFormat() . '/' . $action . '.tpl');
        } catch (\SmartyException $exception) {
            $response = new Response();
            $response->setResponseCode(404);
            return $response;
        }
        return new Response($output, $this->formatToMimeType[$request->getFormat()]);
    }
}
