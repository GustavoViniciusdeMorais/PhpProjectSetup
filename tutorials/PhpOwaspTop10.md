# PHP Owasp Top 10

### A01 - Broken Access Control
- Users can only perform actions or access resources in their authorized scope.
- Check if the endpoints are responding to objects IDs Insecure direct object reference (IDOR).
- Use object uuid always when possible.
##### **Correct code apporach:**
```php
$sth = $dbh->prepare("SELECT * FROM orders WHERE order_id = ? AND user_id = ?");
$sth->execute([$orderId, $userId]);
```
### A02 - Cryptographic Failures
- Use strong hash functions like password_hash.
- Use strong algorithms like bcrypt, sha256 only with salt.
- All passwords and secrete tokens must be saved with strong hash.
- If nginx config, must use https with ssl.
##### **Correct code apporach:**
```php
$stored_hash = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost'=>13]);

// verify
if (password_verify($_POST['password'], $stored_hash)) {
    echo 'Password is valid!';
}
```
### A03 - Injection (SQL, Command)
- Always use sql query prepared statements, never bind input string to the sql query.
- Sanitize user input before storing.
##### **Correct code apporach:**
```php
$sth = $dbh->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$sth->execute([$email, $password]);
```
### A04 - Insecure Design
- Check for rate limiting attempts for login, should be only 5 attempts.
- Tokens should be cryptographically random and at least 128 bits longer.
- Sensitive operations like email change or payment, must require user to login again.
##### **Correct code apporach:**
```php
$token = bin2hex(random_bytes(32));
$expireDate = (new \DateTime())->format('Y-m-d');
$sth = $dbh->prepare("INSERT INTO password_resets (email, token, expirer_date) VALUES (?, ?, ?)");
$sth->execute([$emailLogged, $token, $expireDate]);
```
### A05 - Security Misconfiguration
- Verify the php configurations in the server, do not expose error messages or php version for example.
- Verify if configurations files and directories are exposed
    - For example: .env, composer.json, /config/, /logs/
##### **Correct php.ini apporach:**
```conf
display_errors = Off
display_startup_errors = Off
log_errors = On
error_log = /var/logs/php_errors.logs
expose_php = Off
error_reporting = E_ALL
```
##### **Commands:**
```bash
apt search gobuster
composer audit
composer require enlightn/security-checker -n

# where it is? usually in vendor/bin
find vendor/* -type f -regex ".*securi.*"

php vendor/bin/security-checker security:check composer.lock
```
### A06 - Vulnerable and Outdated Components
- Use composer audit command to check the packages
##### **Correct apporach:**
```bash
which composer
rm -f /usr/bin/composer
# Get composer install commands, then transfer phar file
mv composer.phar /usr/local/bin/composer
# Audit packages to see the CVE
composer audit -n
```
### A07 - Identification and Authentication Failures
- Always restart the session data.
- Always set session expiration date, httponly, same site strict
##### **Correct apporach:**
```php
session_regenerate_id(true);
$_SESSION['user_id'] = $user['id'];
$_SESSION['created_at'] = time();

session_set_cookie_params([
    'lifetime' => 300,
    'path' => '/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
```
### A08 — Software and Data Integrity Failures
- Validate all data integrity
- Do not save or read php classes from session cookies
##### **Correct apporach:**
```php
$user_prefs = [];
$prefs_json = json_encode($user_prefs);
$prefs_array = json_decode($prefs_json, true);
$obj = unserialize('', ['allowed_classes' => false]);
```
