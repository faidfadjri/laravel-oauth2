<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# OAuth2 - Laravel Passport 

Laravel Passport OAuth2 Integration: Laravel Passport simplifies OAuth2.0 authentication in Laravel applications, offering secure access control and user authentication. This package streamlines the OAuth2 authentication flow, enhancing the security and usability of your projects.

---

# Getting a Trial

<!-- For running this OAuth2 sample on your own environment, follow these steps: -->
### On The Server's Project:

1. **Composer Install:**
     ```
     composer install
     ```

2. **Migrate the database:**
     ```
     php artisan migrate
     ```

3. **Generate Passport Keys:**
     ```
     php artisan passport:install
     ```
     >This will create private & public keys in the */storage* directory on your laravel server project.

4. **Setup Private & Public Keys on the .env file:**
     >copy the private & public keys from the */storage* directory to the .env file.
     ```
     PASSPORT_PRIVATE_KEY="your_private_key"
     PASSPORT_PUBLIC_KEY="your_public_key"
     ```

5. **Configure Personal Access Token**
     ```
     php artisan make:client --personal
     ```
     >This will generate personal client's secret for your server to access its own OAuth Token.
     >Copy the client id and client_secret to the .env file
     ```
     PASSPORT_PERSONAL_ACCESS_CLIENT_ID="your_client_id"
     PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET="your_client_secret"
     ```

6. **Make a Client**
     ```
     php artisan make:client
     ```
     >This will be the client's secret that the client will use in their projects to obtain the OAuth2 token.

7. **Run The Server**
     ```
     php artisan serve --host=127.0.0.2 --port=4000
     ```
     >Make sure the server's host & port is different from the client's if you're setting up this projects on your own local environment.

---
### On The Client's Project:

1. **Composer Install:**
     ```
     composer install
     ```

2. **Migrate the database:**
     ```
     php artisan migrate
     ```

3. **Setup Client Secrets:**
     >Copy the previous client id & client secret to the client's .env file alongside with the redirect uri and server uri
   ```
   OAUTH_CLIENT_ID="your-client-id"
   OAUTH_CLIENT_SECRET="your-client-secret"
   OAUTH_CLIENT_CALLBACK="http://example-client.com:port/auth/callback"

   OAUTH_SERVER_URI="http://example-server.com:port/"
   ```
     
7. **Run The Server**
     ```
     php artisan serve --host=127.0.0.1 --port=7000
     ```
     >Make sure the host & port is different from the server's if you're setting up this projects on your own local environment.

## Sources

- [Laravel Documentation](https://laravel.com/docs/10.x/passport/)
- [YouTube Tutorial](https://www.youtube.com/watch?v=PTFPMAX_88s&t=248s)

Happy coding😗!
