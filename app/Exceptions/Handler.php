<?php

namespace App\Exceptions;

use Exception;
use App\Market;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    // public function render($request, Exception $e)
    // {
        // if ($e instanceof ModelNotFoundException) {
            // $e = new NotFoundHttpException($e->getMessage(), $e);
        // }

        // return parent::render($request, $e);
    // }
	
	
	public function render($request, Exception $e)
    {
        if($this->isHttpException($e))
        {
            switch ($e->getStatusCode()) 
                {
                // not found
                case 404:
                    $market_data = Market::with('category')->get();
					return redirect(\URL::previous())->with('market_data',$market_data);
                break;

                // internal error
                case '500':
					$market_data = Market::with('category')->get();
					return redirect(\URL::previous())->with('market_data',$market_data);
                break;

                default:
                    return $this->renderHttpException($e);
                break;
            }
        }
        else
        {
                return parent::render($request, $e);
        }
    }
}
