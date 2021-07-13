# Sharemage
The website allows to download, upload and to share images in general with other users.

It was build using HTML,CSS,Javascript,PHP and MySQL. Server was run via Xampp.

In the root directory there are php files that have to do with the UI. In order to retrieve data from the database they call the functions stored in the 'includes' directory.

As I mentioned above, inside the 'includes' directory the aim of the php files is to access the database. Inside the 'uploads' folder you can locate the images stored in the database at the moment of the project's upload.


Database - 2 tables:

TABLE: usr
STORES: username, password, nickname

TABLE: image
STORES: name, tag1, tag2, tag3, author
