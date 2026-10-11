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
