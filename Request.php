<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 18-11-2016 19:46
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */
declare( strict_types = 1 );
namespace HTTP;


use HTTP\File\FilesContainer;
use HTTP\Session\Session;

class Request implements RequestInterface
{
    /**
     * This holds an ParameterContainer with all the $_GET params.
     *
     * @var ParameterContainer
     */
    public $getParams;

    /**
     * This holds an ParameterContainer with all the $_POST params.
     *
     * @var ParameterContainer
     */
    public $postParams;

    /**
     * This holds an FilesContainer with all the $_FILES stored as uploaded files.
     *
     * @var FilesContainer
     */
    public $files;

    /**
     * This holds the Session.
     *
     * @var Session
     */
    public $session;

    /**
     * This holds the HeadersContainer with information about the headers send.
     *
     * @var
     */
    public $headers;

    /**
     * This holds an ParameterContainer with all the $_SERVER params.
     *
     * @var ParameterContainer
     */
    public $server;

    /**
     * This holds an ParameterContainer with all the $_COOKIE params.
     *
     * @var ParameterContainer
     */
    public $cookies;

    /**
     * The holds an string containing the full request URI.
     *
     * @var string
     */
    protected $requestUri;

    /**
     * This holds an string containing the URI without the query string.
     *
     * @var string
     */
    protected $baseRequestUri;

    /**
     * This holds an string with the query params (the $_GET params).
     * @var string
     */
    protected $queryString;

    /**
     * This holds an string containing the request method like GET, POST, PUT or DELETE.
     *
     * @var string
     */
    protected $method;

    /**
     * This contains the language that the user browser sends with the request like: NL or EN.
     *
     * @var string
     */
    protected $locale;

    /**
     * Request constructor.
     *
     * @param array  $getParams
     * @param array  $postParams
     * @param array  $cookies
     * @param array  $files
     * @param array  $server
     * @param string $content
     */
    public function __construct( array $getParams = [], array $postParams = [], array $cookies = [], array $files = [], array $server = [], string $content = '' )
    {
        $this->init( $getParams = [], $postParams = [], $cookies = [], $files = [], $server = [], $content = '' );
    }

    /**
     * Gets the request $_GET params in an HTTP\ParameterContainer.
     *
     * @return ParameterContainer
     */
    public function getGetParams() : ParameterContainer
    {
        return $this->getGetParams();
    }

    /**
     * Gets the requests $_POST params in an HTTP\ParameterContainer.
     *
     * @return ParameterContainer
     */
    public function getPostParams() : ParameterContainer
    {
        // TODO: Implement getPostParams() method.
    }

    /**
     * Gets the requests $_FILE parameters in an HTTP\File\FilesContainer.
     *
     * @return FilesContainer
     */
    public function getFiles() : FilesContainer
    {
        // TODO: Implement getFiles() method.
    }

    /**
     * Gets the $_SERVER parameters in an HTTP\ServerContainer
     *
     * @return ServerContainer
     */
    public function getServer() : ServerContainer
    {
        // TODO: Implement getServer() method.
    }

    /**
     * Gets the headers from an request in an HTTP\HeaderContainer.
     *
     * @return HeaderContainer
     */
    public function getHeaders() : HeaderContainer
    {
        // TODO: Implement getHeaders() method.
    }

    /**
     * Gets the $_COOKIE parameters in an HTTP\ParameterContainer.
     *
     * @return ParameterContainer
     */
    public function getCookies() : ParameterContainer
    {
        // TODO: Implement getCookies() method.
    }

    /**
     * Gets the Session from the current request.
     *
     * @return Session
     */
    public function getSession() : Session
    {
        if( $this->session )
        {
            return $this->session;
        }
        throw new \LogicException( 'Cannot return an session because ther is no session associated with this reques.' );
    }

    /**
     * Checks if the request has an Session.
     *
     * @return bool
     */
    public function hasSession() : bool
    {
        return isset( $this->session );
    }

    /**
     * Sets an session to the request.
     *
     * @param Session $session
     * @return mixed
     */
    public function setSession( Session $session )
    {
        $this->session = $session;
    }

    /**
     * Gets the body of the request or an empty string.
     *
     * @return string
     */
    public function getContent() : string
    {
        // TODO: Implement getContent() method.
    }

    /**
     * Gets the uniform resource identifier.
     *
     * @return string
     */
    public function getRequestUri() : string
    {
        // TODO: Implement getRequestUri() method.
    }

    /**
     * Gets the uniform resource identifier without the $_GET string (query string).
     *
     * @return string
     */
    public function getUri() : string
    {
        // TODO: Implement getUri() method.
    }

    /**
     * Gets the clients ip address.
     *
     * @return string
     */
    public function getClientIp() : string
    {
        // TODO: Implement getClientIp() method.
    }

    /**
     * Gets the servers IP address.
     *
     * @return string
     */
    public function getHttpHost() : string
    {
        // TODO: Implement getHttpHost() method.
    }

    /**
     * Gets the query string (the string from the URI containing the $_GET params).
     *
     * @return string
     */
    public function getQueryString() : string
    {
        // TODO: Implement getQueryString() method.
    }

    /**
     * Gets the hostname of the server.
     *
     * @return string
     */
    public function getHostname() : string
    {
        // TODO: Implement getHostname() method.
    }

    /**
     * Gets the default locale parsed from the header.
     *
     * @return string
     */
    public function getDefaultLocale() : string
    {
        // TODO: Implement getDefaultLocale() method.
    }

    /**
     * Gets the request method.
     *
     * @return string
     */
    public function getMethod() : string
    {
        // TODO: Implement getMethod() method.
    }

    /**
     * Initiates the request.
     *
     * @param array $getParams
     * @param array $postParams
     * @param array $headers
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @return mixed
     */
    public function init( array $getParams = [], array $postParams = [], array $cookies = [], array $files = [], array $server = [], string $content = '' )
    {
        $this->getParams = new ParameterContainer( $getParams );
        $this->postParams = new ParameterContainer( $postParams );
        $this->cookies =  new ParameterContainer( $cookies );
        $this->files = new FilesContainer( $files );
        $this->server = new ServerContainer( $server );
        $this->content = $content;
    }

    /**
     * Returnes an Request object with created from globals like $_GET, $_POST, $_COOKIE, $FILES and server.
     *
     * @return Request
     */
    public static function createFromGlobals()
    {
        // TODO: Implement createFromGlobals() method.
    }

    /**
     * Returnes an request based on the arguments passed.
     *
     * @param string $uri
     * @param string $method
     * @param array  $postParams
     * @param array  $cookies
     * @param array  $files
     * @param string $body
     * @return Request
     */
    public static function create( string $uri, string $method = 'GET', array $postParams = [], array $cookies = [], array $files = [], string $body = '' ) : Request
    {
        // TODO: Implement create() method.
    }

}
