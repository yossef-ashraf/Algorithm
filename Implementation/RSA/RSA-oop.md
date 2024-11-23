Here's how you can implement RSA encryption and decryption in PHP using an object-oriented approach.

### Step-by-Step Guide to RSA in PHP (OOP Version)

#### 1. **Creating the RSA Class**

First, let's create an `RSA` class that handles key generation, encryption, and decryption.

```php
<?php

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
```

#### 2. **Using the RSA Class**

Now, you can create an instance of the `RSA` class and use it to encrypt and decrypt data.

```php
<?php

// Instantiate the RSA class
$rsa = new RSA();

// Get the generated keys
$privateKey = $rsa->getPrivateKey();
$publicKey = $rsa->getPublicKey();

// Display the keys (for demonstration purposes)
echo "Private Key: \n$privateKey\n";
echo "Public Key: \n$publicKey\n";

// Data to encrypt
$data = "This is a secret message.";

// Encrypt the data using the public key
$encryptedData = $rsa->encrypt($data);
echo "Encrypted Data: \n" . base64_encode($encryptedData) . "\n";

// Decrypt the data using the private key
$decryptedData = $rsa->decrypt($encryptedData);
echo "Decrypted Data: \n$decryptedData\n";
```

### Explanation

1. **Key Generation**:
   - The `__construct` method in the `RSA` class automatically generates a pair of RSA keys when an object of the class is instantiated.

2. **Encryption**:
   - The `encrypt` method takes a string as input and encrypts it using the public key.

3. **Decryption**:
   - The `decrypt` method takes the encrypted string as input and decrypts it using the private key.

### Conclusion

This OOP approach encapsulates the RSA functionality within a class, making it reusable and organized. You can now easily manage RSA key pairs and perform encryption and decryption by creating an instance of the `RSA` class.