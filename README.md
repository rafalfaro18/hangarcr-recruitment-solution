- Url of the project is http://homestead.test/

- If you get error "no input file specified" make sure to map the url correctly in Homestead.yaml:
```yaml
map: homestead.test
to: /home/vagrant/code/code/public
```

- If you get error "OpenSSL SSL_read: SSL_ERROR_SYSCALL, errno 10054" while executing vagrant up:
Use the following command instead:
```shell
vagrant box add laravel/homestead http://atlas.hashicorp.com/laravel/boxes/homestead
```
