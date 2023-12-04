## CodeArtistry installation guide

to get the application to function properly you need to use this installation process:

<br>

1. <ins>use git clone:</ins>
    ```bash
    git clone https://github.com/Xander172006/drawings-art-platform.git
    ```

    <br>

2. <ins>then update composer:</ins>
    ```bash
    composer update
    ```

    <br>

include an .env file and copy everything from the .env.example in the .env file.
Change the name of the Database to "codeartistry" with the correct password and username as well.

<br>

3. <ins>To update this with the .env run this command:</ins>
    ```bash
    php artisan key:generate
    ```

    <br>

    <ins>Finnaly to be able to upload and allow files in the application you need to use this command for that feature:</ins>
    ```
    php artisan link:storage
    ```

    <br>

If everything goes well then you should be able to use it now for personal usage. : )