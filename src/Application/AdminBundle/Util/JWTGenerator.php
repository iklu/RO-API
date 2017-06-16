<?php
namespace Application\AdminBundle\Util;

class JWTGenerator implements TokenGeneratorInterface
{
    private $username;
    private $password;
    private $secretkey;

    public function __construct($username, $password, $secretkey)
    {
        $this->username = $username;
        $this->password = $password;
        $this->secretkey = $secretkey;
    }

    /**
     * {@inheritdoc}
     */
    public function generateToken()
    {
        // base64 encodes the header json
        $encoded_header = base64_encode('{"alg": "HS256","typ": "JWT"}');

        // base64 encodes the payload json
        $encoded_payload = base64_encode('{"username": "{$this->username}","password": "{$this->password}"}');

        // base64 strings are concatenated to one that looks like this
        $header_payload = $encoded_header . '.' . $encoded_payload;

        //Setting the secret key
        $secret_key = $this->secretkey;

        // Creating the signature, a hash with the s256 algorithm and the secret key. The signature is also base64 encoded.
        $signature = base64_encode(hash_hmac('sha256', $header_payload, $secret_key, true));

        // Creating the JWT token by concatenating the signature with the header and payload, that looks like this:
        $jwt_token = $header_payload . '.' . $signature;

        //listing the resulted  JWT
        return $jwt_token;
    }
}
