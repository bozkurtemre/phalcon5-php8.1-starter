# Phalcon Application

[Phalcon][1] is a web framework delivered as a C extension providing high
performance and lower resource consumption.

This is a sample application for the Phalcon PHP Framework. We expect to
implement as many features as possible to showcase the framework and its
potential.

Please write us if you have any feedback.

Thanks.

## NOTE

The master branch will always contain the latest stable version. If you wish
to check older versions or newer ones currently under development, please
switch to the relevant branch.

## Get Started

### Requirements

* PHP >= 8.1
* [Apache][2] Web Server with [mod_rewrite][3] enabled or [Nginx][4] Web Server
* Latest stable [Phalcon Framework release][5] extension enabled
* [MySQL][6] >= 8.0
* [Redis][11] >= 6.2

### Installation

1. Copy project to local environment - `git clone git@github.com:emrebbozkurt/phalcon5-php8.1-starter.git`
2. Edit .env file with your DB connection information
3. Run DB migration commands with `php migrate`

If you do not have PHP installed on your machine or do not wish to install it, you 
can run the application in a docker container. You will need [docker][9] and [docker-compose][10].

```shell
docker-compose up -d --build 
```

will build and start your environment.

```shell
docker exec -it phalcon5 bash
```

will allow you to enter the environment.

[1]: https://phalcon.io/
[2]: https://httpd.apache.org/
[3]: https://httpd.apache.org/docs/current/mod/mod_rewrite.html
[4]: https://nginx.org/
[5]: https://github.com/phalcon/cphalcon/releases
[6]: https://www.mysql.com/
[7]: https://github.com/phalcon/invo/blob/master/CONTRIBUTING.md
[8]: https://github.com/phalcon/invo/blob/master/docs/LICENSE.md
[9]: https://docs.docker.com/engine/install/
[10]: https://docs.docker.com/compose/install/
[11]: https://redis.io/
