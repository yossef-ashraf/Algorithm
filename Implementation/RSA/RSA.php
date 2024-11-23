<?php

namespace APP\RSA;

class RSA
{
    private $privateKey;
    private $publicKey;

    /**
     * RSA constructor.
     * Generates a new RSA key pair upon instantiation.
     */
    public function __construct($keyBits = 2048)
    {
        $config = [
            "digest_alg" => "sha256",
            "private_key_bits" => $keyBits,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];

        // Generate a new private key
        $res = openssl_pkey_new($config);

        // Extract the private key into a variable
        openssl_pkey_export($res, $this->privateKey);

        // Extract the public key into a variable
        $this->publicKey = openssl_pkey_get_details($res)['key'];
    }

    /**
     * Get the private key.
     * 
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * Get the public key.
     * 
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * Encrypt data using the public key.
     * 
     * @param string $data
     * @return string|false
     */
    public function encrypt($data)
    {
        $encrypted = null;
        openssl_public_encrypt($data, $encrypted, $this->publicKey);
        return $encrypted;
    }

    /**
     * Decrypt data using the private key.
     * 
     * @param string $data
     * @return string|false
     */
    public function decrypt($data)
    {
        $decrypted = null;
        openssl_private_decrypt($data, $decrypted, $this->privateKey);
        return $decrypted;
    }
}
