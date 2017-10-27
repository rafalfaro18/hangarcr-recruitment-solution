- Url of the project is http://homestead.test/code/

- If you get error "OpenSSL SSL_read: SSL_ERROR_SYSCALL, errno 10054" while executing vagrant up:
Use the following command instead:
```shell
vagrant box add laravel/homestead http://atlas.hashicorp.com/laravel/boxes/homestead
```
