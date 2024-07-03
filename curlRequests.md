# CRUD Operations with `curl` and a CRUD API

This tutorial will show you how to use `curl` to perform CRUD (Create, Read, Update, Delete) operations on a `products` endpoint. The entity parameters we will use are `uuid`, `name`, and `price`. We'll include a JWT token in the request headers for authentication.

## Prerequisites

- Linux terminal
- `curl` installed
- JWT token (e.g., `eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9`)

## Base URL

Let's assume the base URL for the API is `http://example.com/api`.

## JWT Token

We will use a JWT token for authentication. Replace `YOUR_JWT_TOKEN` with your actual JWT token in the examples below.

```sh
JWT_TOKEN="YOUR_JWT_TOKEN"
```

## Create a Product

To create a new product, use the `POST` method.

```sh
curl -X POST http://example.com/api/products \
     -H "Authorization: Bearer $JWT_TOKEN" \
     -H "Content-Type: application/json" \
     -d '{
           "uuid": "123e4567-e89b-12d3-a456-426614174000",
           "name": "Sample Product",
           "price": 29.99
         }'
```

## Read a Product

To read a product's details, use the `GET` method with the product's UUID.

```sh
curl -X GET http://example.com/api/products/123e4567-e89b-12d3-a456-426614174000 \
     -H "Authorization: Bearer $JWT_TOKEN"
```

## Update a Product

To update an existing product, use the `PUT` method.

```sh
curl -X PUT http://example.com/api/products/123e4567-e89b-12d3-a456-426614174000 \
     -H "Authorization: Bearer $JWT_TOKEN" \
     -H "Content-Type: application/json" \
     -d '{
           "name": "Updated Product",
           "price": 39.99
         }'
```

## Delete a Product

To delete a product, use the `DELETE` method.

```sh
curl -X DELETE http://example.com/api/products/123e4567-e89b-12d3-a456-426614174000 \
     -H "Authorization: Bearer $JWT_TOKEN"
```

## Summary

- **Create** a product: `POST` request with product details in the body.
- **Read** a product: `GET` request with the product's UUID in the URL.
- **Update** a product: `PUT` request with updated product details in the body.
- **Delete** a product: `DELETE` request with the product's UUID in the URL.

By following these examples, you can use `curl` to interact with a CRUD API, performing all necessary operations on the `products` endpoint.