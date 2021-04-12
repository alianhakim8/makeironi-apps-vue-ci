# install dan koneksi database

1. buka codeigniter.com
2. masuk ke documentation
3. pilih online UG
4. pilih composer instalation
 syntax : composer create-project codeigniter4/appstarter makeironi-apps
5. langkah awal 
6. copy env to .env
 - uncomment : 
    - CI_ENVIRONMENT = development
    - app.baseURL = 'http://localhost:8080/'
    - database.default.hostname = localhost
    - database.default.- database = makeironi-db
    - database.default.username = root
    - database.default.password = 
    - database.default.DBDriver = MySQLi
7. Buat Database
8. Buat Table dengan migration
syntax : php spark migrate:create products
 - lokasi table migrate
  - app/database/migrations
9. Buat field untuk table di file yang ada di folder diatas
- link : https://codeigniter.com/user_guide/dbmgmt/migration.html?highlight=migration
10. Migrate ke database
syntax : php spark migrate
