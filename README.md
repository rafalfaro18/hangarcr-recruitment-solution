- Url of the project is http://homestead.test/

- Must create a database called "songs", table called "songs" and add data:

```sql
CREATE SCHEMA `songs` DEFAULT CHARACTER SET utf8 ;
CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `url` varchar(36) NOT NULL,
  `songname` varchar(100) NOT NULL,
  `artistid` int(11) NOT NULL,
  `artistname` varchar(100) NOT NULL,
  `albumid` int(11) NOT NULL,
  `albumname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `songs`.`songs` (`id`, `url`, `songname`, `artistid`, `artistname`, `albumid`, `albumname`) VALUES ('25479197', 'spotify:album:3qfz9wig4gcrb4bimw9ov7', 'johnny b. goode', '45', 'chuck berry', '235469', 'roll over beethoven');
INSERT INTO `songs`.`songs` (`id`, `url`, `songname`, `artistid`, `artistname`, `albumid`, `albumname`) VALUES ('8815585', 'spotify:track:7linrtr5px7i3r96mducjw', 'moonlight sonata', '1833', 'beethoven', '5619520', 'beethoven piano sonatas');
```

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
